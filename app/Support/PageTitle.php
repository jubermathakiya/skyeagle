<?php

namespace App\Support;

use Illuminate\Support\Str;

class PageTitle
{
    public static function resolve(?string $title = null, ?string $page = null, ?string $routeName = null): string
    {
        $siteName = config('app.name', 'Sky Eagle Trip');

        if (filled($title)) {
            $pageTitle = $title;
        } elseif (filled($page) && ! preg_match('/^index(-\d+)?$/i', $page)) {
            $pageTitle = Str::headline($page);
        } elseif (filled($routeName)) {
            $pageTitle = Str::headline($routeName);
        } else {
            return $siteName;
        }

        if (Str::lower($pageTitle) === Str::lower($siteName)) {
            return $siteName;
        }

        if (Str::contains(Str::lower($pageTitle), Str::lower($siteName))) {
            return $pageTitle;
        }

        return "{$pageTitle} | {$siteName}";
    }
}
