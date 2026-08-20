<?php

namespace App\Http\Middleware;

use App\Actions\Cms\GetFooterSection;
use App\Actions\Cms\GetHeaderSection;
use App\Actions\Cms\GetSocialLinks;
use App\Actions\Navigation\GetFooterNavigation;
use App\Actions\Navigation\GetLocales;
use App\Actions\Navigation\GetMainNavigation;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return [
            ...parent::share($request),

            'locale' => app()->getLocale(),

            'languageTag' => str_replace('_', '-', app()->getLocale()),

            'direction' => app()->isLocale('ar')
                ? 'rtl'
                : 'ltr',

            'locales' => app(GetLocales::class)(),

            'header' => app(GetHeaderSection::class)(),

            'footer' => app(GetFooterSection::class)(),

            'socials' => app(GetSocialLinks::class)(),

            'footerNavigation' => app(GetFooterNavigation::class)(),

            'navigation' => app(GetMainNavigation::class)(),

            'pages' => [
                'home' => __('ui.pages.home'),
                'about' => __('ui.pages.about'),
                'contact' => __('ui.pages.contact'),
                'work' => __('ui.pages.work'),
                'project' => __('ui.pages.project'),
            ],

            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error'),
            ],
        ];
    }
}
