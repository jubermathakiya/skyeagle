<?php

if (!function_exists('backend_image')) {
    function backend_image($path)
    {
        return backend_storage_url($path);
    }
}

if (!function_exists('backend_storage_url')) {
    function backend_storage_url($path, ?string $baseUrl = null): ?string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return null;
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        $baseUrl = trim((string) ($baseUrl ?: config('constants.backend_url')));

        if ($baseUrl === '') {
            return null;
        }

        return rtrim($baseUrl, '/') . '/storage/' . ltrim($path, '/');
    }
}

if (!function_exists('backend_storage_path')) {
    function backend_storage_path($path, ?string $diskRoot = null): ?string
    {
        $path = trim((string) $path);

        if ($path === '' || preg_match('#^https?://#i', $path)) {
            return null;
        }

        $relativePath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, ltrim($path, '/\\'));
        $roots = array_filter(array_unique([
            $diskRoot,
            config('constants.email_media_disk_path'),
            public_path('storage'),
            storage_path('app/public'),
            base_path('../skyeagle-admin/storage/app/public'),
            base_path('../skyeagle-admin/public/storage'),
        ]));

        foreach ($roots as $root) {
            $filePath = rtrim((string) $root, '/\\') . DIRECTORY_SEPARATOR . $relativePath;

            if (is_file($filePath)) {
                return $filePath;
            }
        }

        return null;
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

if (!function_exists('reviewer_initials')) {
    function reviewer_initials(?string $name): string
    {
        $name = trim(preg_replace('/\s+/u', ' ', (string) $name));

        if ($name === '') {
            return 'U';
        }

        $parts = preg_split('/\s+/u', $name) ?: [];

        if (count($parts) >= 2) {
            $first = mb_substr($parts[0], 0, 1);
            $last = mb_substr($parts[count($parts) - 1], 0, 1);

            return mb_strtoupper($first . $last);
        }

        return mb_strtoupper(mb_substr($name, 0, min(2, mb_strlen($name))));
    }
}

if (!function_exists('reviewer_avatar_color')) {
    function reviewer_avatar_color(?string $name): string
    {
        $palette = [
            '#0A67F2',
            '#155EEF',
            '#6938EF',
            '#0E9384',
            '#DD2590',
            '#3171F3',
            '#0A58CA',
            '#E4479B',
        ];

        $name = mb_strtolower(trim((string) $name));

        if ($name === '') {
            return $palette[0];
        }

        $index = abs(crc32($name)) % count($palette);

        return $palette[$index];
    }
}
