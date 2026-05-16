<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function searchCountries(Request $request): JsonResponse
    {
        $term = $request->string('q')->trim()->value();
        $nameCol = config('geo.country_name_column', 'name');

        $query = Country::query()->orderBy($nameCol);

        if ($term !== '') {
            $like = '%'.addcslashes($term, '%_\\').'%';
            $query->where($nameCol, 'like', $like);
        }

        $rows = $query->limit(40)->get();

        return response()->json([
            'data' => $rows->map(fn (Country $c) => [
                'id' => $c->id,
                'name' => $c->display_name,
            ]),
        ]);
    }

    public function states(Request $request): JsonResponse
    {
        $countryId = $request->integer('country_id');
        if ($countryId < 1) {
            return response()->json(['data' => []]);
        }

        $term = $request->string('q')->trim()->value();
        $fk = config('geo.state_country_id_column', 'country_id');
        $nameCol = config('geo.state_name_column', 'name');

        $query = State::query()
            ->where($fk, $countryId)
            ->orderBy($nameCol);

        if ($term !== '') {
            $like = '%'.addcslashes($term, '%_\\').'%';
            $query->where($nameCol, 'like', $like);
        }

        $limit = $term === '' ? 500 : 40;
        $rows = $query->limit($limit)->get();

        return response()->json([
            'data' => $rows->map(fn (State $s) => [
                'id' => $s->id,
                'name' => $s->display_name,
            ]),
        ]);
    }

    public function cities(Request $request): JsonResponse
    {
        $stateId = $request->integer('state_id');
        if ($stateId < 1) {
            return response()->json(['data' => []]);
        }

        $term = $request->string('q')->trim()->value();
        $fk = config('geo.city_state_id_column', 'state_id');
        $nameCol = config('geo.city_name_column', 'name');

        $query = City::query()
            ->where($fk, $stateId)
            ->orderBy($nameCol);

        if ($term !== '') {
            $like = '%'.addcslashes($term, '%_\\').'%';
            $query->where($nameCol, 'like', $like);
        }

        $limit = $term === '' ? 500 : 40;
        $rows = $query->limit($limit)->get();

        return response()->json([
            'data' => $rows->map(fn (City $c) => [
                'id' => $c->id,
                'name' => $c->display_name,
            ]),
        ]);
    }
}
