<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = config('app.supported_locales', ['en']);
        $sessionLocale = $request->hasSession() ? $request->session()->get('locale') : null;

        $locale = $request->route('locale')
            ?? $sessionLocale
            ?? config('app.locale');

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = config('app.locale');
        }

        app()->setLocale($locale);
        Carbon::setLocale($locale);

        if ($request->hasSession()) {
            $request->session()->put('locale', $locale);
        }

        if ($request->route()?->parameter('locale')) {
            URL::defaults(['locale' => $locale]);
        }

        return $next($request);
    }
}
