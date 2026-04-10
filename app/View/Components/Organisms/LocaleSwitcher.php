<?php

namespace App\View\Components\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LocaleSwitcher extends Component
{
    public array $locales = [];

    public function __construct()
    {
        $route = request()->route();
        $routeName = $route?->getName();
        $parameters = $route?->parameters() ?? [];

        unset($parameters['locale']);

        $this->locales = collect(config('app.supported_locales', ['en']))
            ->map(function (string $locale) use ($routeName, $parameters): array {
                $url = $routeName
                    ? route($routeName, ['locale' => $locale, ...$parameters])
                    : url($locale);

                return [
                    'key' => $locale,
                    'label' => strtoupper($locale),
                    'url' => $url,
                    'active' => app()->getLocale() === $locale,
                ];
            })
            ->all();
    }

    public function render(): View|Closure|string
    {
        return view('components.organisms.locale-switcher');
    }
}
