<?php

namespace App\Http\Controllers\Pages;

use App\Actions\Cms\GetContactPage;
use App\Actions\Contact\SendContactMail;
use App\Dto\ContactDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\RateLimiter;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index(GetContactPage $getContactPage)
    {
        return Inertia::render(
            'ContactView',
            $getContactPage()
        );
    }

    public function store(ContactRequest $request, SendContactMail $sendContactMail)
    {
        $key = 'contact-form:'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->with(
                'error',
                __('ui.contact.rate_limit')
            );
        }

        RateLimiter::hit($key, 60);

        $sendContactMail(
            ContactDto::fromRequest($request)
        );

        return back()->with(
            'success',
            __('ui.contact.success')
        );
    }
}
