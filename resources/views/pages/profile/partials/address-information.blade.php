@php($addr = $user->userAddress)
<h6 class="fs-16 mb-3">Address Information</h6>
<div class="row g-2">
    <div class="col-md-12">
        <div>
            <h6 class="fs-14">Address</h6>
            <p>
                @if ($addr)
                    {{ $addr->address_line1 }}
                    @if ($addr->address_line2)
                        , {{ $addr->address_line2 }}
                    @endif
                @else
                    —
                @endif
            </p>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h6 class="fs-14">Country</h6>
            <p>{{ $addr?->country?->display_name ?? '—' }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h6 class="fs-14">State</h6>
            <p>{{ $addr?->state?->display_name ?? '—' }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h6 class="fs-14">City</h6>
            <p>{{ $addr?->city?->display_name ?? '—' }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <h6 class="fs-14">Postal Code</h6>
            <p>{{ $addr?->postal_code ?: '—' }}</p>
        </div>
    </div>
</div>
