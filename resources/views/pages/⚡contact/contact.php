<?php

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

new
#[Title('Home')]
class extends Component {

    #[Validate('required|min:3')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('nullable|string:min:3')]
    public string $phone = '';

    #[Validate('required|min:10')]
    public string $message = '';

    public array $services = [];
    public array $contacts = [];

    public bool $isSubmitting = false;


    public function mount(): void
    {
        $this->services = [
            'Web development' => false,
            'Web design' => false,
            'Consulting' => false,
            'Other' => false,
        ];

        $this->contacts = [
            [
                'title' => 'Call me',
                'description' => 'Available weekdays 9AM–5PM',
                'value' => '+213 (658) 760-391',
                'icon' => 'heroicon-o-phone'
            ],
            [
                'title' => 'Email me',
                'description' => "I'll usually reply within an hour",
                'value' => 'ynezrek@gmail.com',
                'icon' => 'heroicon-o-at-symbol'
            ],
        ];
    }


    public function submit()
    {
        $this->validate();

        $key = 'contact-form:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            session()->flash('error', 'Too many attempts. Try again later.');
            return;
        }

        RateLimiter::hit($key, 60);


        if ($this->isSubmitting) {
            return;
        }

        $this->isSubmitting = true;


        // Filter selected services
        $selectedServices = collect($this->services)
            ->filter(fn($checked) => $checked)
            ->keys()
            ->values()
            ->toArray();

        // Send email
        Mail::to('your@email.com')->send(
            new ContactFormMail(
                name: $this->name,
                email: $this->email,
                phone: $this->phone,
                content: $this->message,
                services: $selectedServices
            )
        );

        // Reset form
        $this->reset(['name', 'email', 'phone', 'message']);
        $this->services = array_map(fn() => false, $this->services);

        session()->flash('success', 'Message sent successfully!');

        $this->isSubmitting = false;
    }

    public function render()
    {
        return $this->view()
            ->layout('layouts::app');
    }
};
