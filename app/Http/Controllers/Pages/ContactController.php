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

    public function __construct(protected GetContactPage $getContactPage, protected SendContactMail $sendContactMail)
    {
    }

    public function index()
    {
        return Inertia::render(
            'ContactView',
            ($this->getContactPage)()
        );
    }

    public function store(ContactRequest $request)
    {
        $key = 'contact-form:'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->with(
                'error',
                __('ui.contact.rate_limit')
            );
        }

        RateLimiter::hit($key, 60);

        ($this->sendContactMail)(
            ContactDto::fromRequest($request)
        );

        return back()->with(
            'success',
            __('ui.contact.success')
        );
    }


}
