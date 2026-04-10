<?php

namespace Database\Seeders\Concerns;

trait BuildsTranslations
{
    protected function translations(mixed $value): array
    {
        return collect(config('app.supported_locales', ['en']))
            ->mapWithKeys(fn (string $locale): array => [$locale => $value])
            ->all();
    }
}
