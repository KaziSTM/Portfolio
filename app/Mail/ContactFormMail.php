<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactFormMail extends Mailable
{
    public function __construct(
        public string  $name,
        public string  $email,
        public ?string $phone,
        public string  $content,
        public array   $services
    )
    {
    }

    public function build()
    {
        return $this->subject('New Contact Form Submission')
            ->view('emails.contact-form');
    }
}
