<?php

if (!function_exists('backend_image')) {
    function backend_image($path)
    {
        return config('constants.backend_url') . '/storage/' . $path;
    }
}

if (!function_exists('company_email')) {
    function company_email(): string
    {
        return config('constants.company_email');
    }
}

if (!function_exists('company_phone')) {
    function company_phone(): string
    {
        return config('constants.company_phone');
    }
}

if (!function_exists('company_phone_tel')) {
    function company_phone_tel(): string
    {
        return config('constants.company_phone_tel');
    }
}

if (!function_exists('company_address')) {
    function company_address(): string
    {
        return config('constants.company_address');
    }
}