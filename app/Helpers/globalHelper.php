<?php

if (!function_exists('backend_image')) {
    function backend_image($path)
    {
        return config('constants.backend_url') . '/storage/' . $path;
    }
}