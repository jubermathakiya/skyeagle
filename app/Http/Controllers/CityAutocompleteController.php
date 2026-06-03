<?php

namespace App\Http\Controllers;

use App\Repositories\ToureRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CityAutocompleteController extends Controller
{
    public function __construct(
        protected ToureRepository $touresRepository,
    ) {
    }

    public function searchGeoapifyCities(Request $request): JsonResponse
    {
        $request->validate([
            'term' => 'required|string|min:2|max:100',
        ]);

        $term = trim($request->get('term'));
        $cacheKey = 'geoapify_cities_' . md5(strtolower($term));

        if (Cache::has($cacheKey)) {
            return response()->json([
                'status' => true,
                'data' => Cache::get($cacheKey),
            ]);
        }

        $apiKey = config('services.geoapify.api_key');
        $data = [];

        if (!empty($apiKey)) {
            try {
                $response = $this->geoapifyHttp()->get('https://api.geoapify.com/v1/geocode/autocomplete', [
                'text' => $term,
                'apiKey' => $apiKey,
                'limit' => 8,
                'type' => 'city',
                'lang' => 'en',
            ]);

                if ($response->successful()) {
                    $data = collect($response->json('features', []))
                        ->map(function (array $feature) {
                            $props = $feature['properties'] ?? [];
                            $label = trim($this->formatGeoapifyCityLabel($props));

                            if ($label === '' || $label === 'Unknown') {
                                return null;
                            }

                            $cityName = trim((string) ($props['city'] ?? $props['name'] ?? ''));
                            $value = $cityName !== '' ? $cityName : $label;

                            return [
                                'label' => $label,
                                'value' => $value,
                            ];
                        })
                        ->filter()
                        ->values()
                        ->all();
                } else {
                    Log::warning('Geoapify autocomplete request failed', [
                        'status' => $response->status(),
                    ]);
                }
            } catch (Exception $e) {
                Log::error('Geoapify autocomplete error: ' . $e->getMessage());
            }
        }

        $data = $this->mergeDatabaseCities($data, $term);
        Cache::put($cacheKey, $data, now()->addDay());

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    private function mergeDatabaseCities(array $geoData, string $term): array
    {
        $dbData = $this->touresRepository
            ->searchTourCities($term, 8)
            ->map(static function (string $city) {
                $parts = array_map('trim', explode(',', $city));
                $cityName = $parts[0] !== '' ? $parts[0] : $city;

                return [
                    'label' => $city,
                    'value' => $cityName,
                ];
            })
            ->values()
            ->all();

        return collect($geoData)
            ->merge($dbData)
            ->unique(fn (array $row) => strtolower($row['value']))
            ->take(15)
            ->values()
            ->all();
    }

    private function geoapifyHttp()
    {
        $client = Http::connectTimeout(5)->timeout(8);

        if (!config('services.geoapify.verify_ssl', true)) {
            $client = $client->withoutVerifying();
        }

        return $client;
    }

    private function formatGeoapifyCityLabel(array $props): string
    {
        $parts = array_filter([
            $props['city'] ?? $props['name'] ?? null,
            $props['state'] ?? null,
            $props['country'] ?? null,
        ]);

        if (!empty($parts)) {
            return implode(', ', array_unique($parts));
        }

        return trim($props['formatted'] ?? '') ?: 'Unknown';
    }
}
