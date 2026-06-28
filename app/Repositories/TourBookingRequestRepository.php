<?php

namespace App\Repositories;

use App\Models\TourBookingRequest;
use App\Models\Toures;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourBookingRequestRepository extends BaseRepository
{
    public function __construct(TourBookingRequest $model)
    {
        parent::__construct($model);
    }

    public function storeFromRequest(Request $request): TourBookingRequest
    {
        $package = Toures::query()->findOrFail((int) $request->input('package_id'));
        $user = Auth::user();

        return $this->model->create([
            'package_id' => $package->id,
            'user_id' => $user?->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'travel_from_date' => $request->input('travel_from_date'),
            'travel_to_date' => $request->input('travel_to_date'),
            'adults' => (int) $request->input('adults', 1),
            'children' => (int) $request->input('children', 0),
            'infants' => (int) $request->input('infants', 0),
            'special_request' => $request->input('special_request'),
            'estimated_price' => $package->price,
            'currency' => config('constants.currency_symbol', '$'),
            'package_name_snapshot' => $package->package_name,
            'package_code_snapshot' => $package->package_code,
            'package_price_snapshot' => $package->price,
            'status' => TourBookingRequest::STATUS_PENDING,
            'source' => 'tour-details',
            'ip_address' => $request->ip(),
        ]);
    }

    public function getForCustomer(User $user, int $perPage = 10)
    {
        return $this->queryForCustomer($user)
            ->latest()
            ->paginate($perPage);
    }

    public function getRecentForCustomer(User $user, int $limit = 5)
    {
        return $this->queryForCustomer($user)
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function getCustomerStats(User $user): array
    {
        $baseQuery = $this->model->newQuery()
            ->where(function ($query) use ($user) {
                $query->where('user_id', $user->id);

                if (filled($user->email)) {
                    $query->orWhere('email', $user->email);
                }
            });

        return [
            'total' => (clone $baseQuery)->count(),
            'pending' => (clone $baseQuery)->where('status', TourBookingRequest::STATUS_PENDING)->count(),
            'confirmed' => (clone $baseQuery)->where('status', TourBookingRequest::STATUS_CONFIRMED)->count(),
            'cancelled' => (clone $baseQuery)->where('status', TourBookingRequest::STATUS_CANCELLED)->count(),
        ];
    }

    public function findForCustomer(User $user, int $id): TourBookingRequest
    {
        return $this->queryForCustomer($user)
            ->whereKey($id)
            ->firstOrFail();
    }

    protected function queryForCustomer(User $user): Builder
    {
        return $this->model
            ->newQuery()
            ->with([
                'package.images' => function ($query) {
                    $query->orderBy('id');
                },
                'package.category',
            ])
            ->where(function ($query) use ($user) {
                $query->where('user_id', $user->id);

                if (filled($user->email)) {
                    $query->orWhere('email', $user->email);
                }
            });
    }
}
