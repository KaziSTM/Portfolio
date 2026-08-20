<?php

namespace App\Support;

use App\Models\CmsPage;

class Cms
{
    protected static array $pages = [];

    public static function section(
        string $pageKey,
        string $sectionKey,
        array $fallback = [],
    ): array {
        $page = static::page($pageKey);

        if (! $page) {
            return $fallback;
        }

        return $page->sections
            ->firstWhere('key', $sectionKey)
            ?->dataFor(app()->getLocale())
            ?: $fallback;
    }

    public static function page(string $key): ?CmsPage
    {
        if (! array_key_exists($key, static::$pages)) {
            static::$pages[$key] = CmsPage::query()
                ->with('sections')
                ->where('key', $key)
                ->first();
        }

        return static::$pages[$key];
    }
}
