<?php

namespace App\Actions\Contact;

use App\Dto\ContactDto;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class SendContactMail
{
    public function __invoke(ContactDto $dto): void
    {
        Mail::to('contact@itsyoucef.com')->send(
            new ContactFormMail(
                name: $dto->name,
                email: $dto->email,
                phone: $dto->phone ?? '',
                content: $dto->message,
                services: $dto->services ?? [],
            )
        );
    }
}
