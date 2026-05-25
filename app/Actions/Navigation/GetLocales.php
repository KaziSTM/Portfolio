<?php

namespace App\Actions\Navigation;

class GetLocales
{
    public function __invoke(): array
    {
        $route = request()->route();
        $routeName = $route?->getName();
        $parameters = $route?->parameters() ?? [];

        unset($parameters['locale']);

        return collect(config('app.supported_locales', ['en']))
            ->map(fn(string $locale) => [
                'key' => $locale,
                'label' => strtoupper($locale),

                'url' => $routeName
                    ? route($routeName, [
                        'locale' => $locale,
                        ...$parameters,
                    ])
                    : url($locale),
            ])
            ->values()
            ->all();
    }
}
