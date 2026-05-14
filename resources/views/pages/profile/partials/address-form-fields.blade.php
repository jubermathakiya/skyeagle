@php($addr = $user->userAddress)
<div class="settings-content">
    <h6 class="fs-16 mb-3">Address Information</h6>
    <div class="row gy-2">
        <div class="col-lg-12">
            <div>
                <label class="form-label">Address</label>
                <input type="text" name="address_line1" value="{{ old('address_line1', $addr?->address_line1 ?? '') }}"
                    class="form-control" autocomplete="street-address">
            </div>
        </div>
        <div class="col-lg-12">
            <div>
                <label class="form-label">Address line 2 <span class="text-gray-6 fw-normal">(optional)</span></label>
                <input type="text" name="address_line2" value="{{ old('address_line2', $addr?->address_line2 ?? '') }}"
                    class="form-control" autocomplete="address-line2">
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <label class="form-label">Country</label>
                <select name="country_id" id="profile_country_id" class="form-control">
                    <option value="">Select</option>
                    @if ($addr?->country_id)
                        <option value="{{ $addr->country_id }}" selected>{{ $addr->country?->display_name }}</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <label class="form-label">State</label>
                <select name="state_id" id="profile_state_id" class="select">
                    <option value="">Select</option>
                    @if ($addr?->state_id)
                        <option value="{{ $addr->state_id }}" selected>{{ $addr->state?->display_name }}</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <label class="form-label">City</label>
                <select name="city_id" id="profile_city_id" class="select">
                    <option value="">Select</option>
                    @if ($addr?->city_id)
                        <option value="{{ $addr->city_id }}" selected>{{ $addr->city?->display_name }}</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <label class="form-label">Postal Code</label>
                <input type="text" name="postal_code" value="{{ old('postal_code', $addr?->postal_code ?? '') }}"
                    maxlength="32" class="form-control" autocomplete="postal-code">
            </div>
        </div>
    </div>
</div>
