<?php

namespace App\Http\Middleware;

use App\Actions\Cms\GetCompaniesSection;
use App\Actions\Cms\GetFeaturesSection;
use App\Actions\Cms\GetFooterSection;
use App\Actions\Cms\GetHeaderSection;
use App\Actions\Cms\GetHeroSection;
use App\Actions\Cms\GetSocialLinks;
use App\Actions\Cms\GetWorkSection;
use App\Actions\Navigation\GetFooterNavigation;
use App\Actions\Navigation\GetLocales;
use App\Actions\Navigation\GetMainNavigation;
use App\Actions\Translations\GetFrontendTranslations;
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

            'cms' => [
                'header' => app(GetHeaderSection::class)(),

                'hero' => app(GetHeroSection::class)(),

                'features_section' => app(GetFeaturesSection::class)(),

                'companies_section' => app(GetCompaniesSection::class)(),

                'work_section' => app(GetWorkSection::class)(),

                'footer' => app(GetFooterSection::class)(),

                'socials' => app(GetSocialLinks::class)(),
            ],

            'translations' => app(GetFrontendTranslations::class)(),

            'navigation' => app(GetMainNavigation::class)(),

            'footerNavigation' => app(GetFooterNavigation::class)(),
        ];
    }
}
