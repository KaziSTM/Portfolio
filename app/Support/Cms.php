<?php

namespace App\Support;

use App\Models\CmsPage;
use Illuminate\Support\Collection;

class Cms
{
    protected static array $pages = [];

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

    public static function section(string $pageKey, string $sectionKey, array $fallback = []): array
    {
        $page = static::page($pageKey);

        if (! $page) {
            return $fallback;
        }

        return $page->section($sectionKey)?->dataFor(app()->getLocale()) ?: $fallback;
    }

    public static function sectionCollection(string $pageKey, string $sectionKey, string $itemsKey = 'items'): Collection
    {
        return collect(static::section($pageKey, $sectionKey)[$itemsKey] ?? []);
    }
}
