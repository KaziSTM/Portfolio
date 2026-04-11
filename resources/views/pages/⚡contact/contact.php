<?php

use App\Mail\ContactFormMail;
use App\Support\Cms;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Validate;
use Livewire\Component;

new
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

    public array $hero = [];
    public array $formContent = [];


    public function mount(): void
    {
        $this->hero = Cms::section('contact', 'hero', [
            'title' => 'How can I help you?',
            'subtitle' => "Let's get in touch",
            'reach_label' => 'You can reach me at the following',
        ]);

        $this->formContent = Cms::section('contact', 'form', [
            'title' => 'Fill out the form below to get started',
            'description' => 'Tell me a little about your project.',
            'services' => ['Web development', 'Web design', 'Consulting', 'Other'],
            'submit_label' => __('ui.actions.get_started'),
            'submitting_label' => __('ui.actions.sending'),
            'success_message' => __('ui.contact.success'),
            'rate_limit_message' => __('ui.contact.rate_limit'),
        ]);

        $this->services = collect($this->formContent['services'])
            ->mapWithKeys(fn($service) => [$service => false])
            ->all();

        $this->contacts = Cms::section('contact', 'contacts', [
            'items' => [],
        ])['items'];
    }


    public function submit()
    {
        $this->validate();

        $key = 'contact-form:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            session()->flash('error', $this->formContent['rate_limit_message']);
            return;
        }

        RateLimiter::hit($key, 60);


        if ($this->isSubmitting) {
            return;
        }

        $this->isSubmitting = true;


        $selectedServices = collect($this->services)
            ->filter(fn($checked) => $checked)
            ->keys()
            ->values()
            ->toArray();

        Mail::to('contact@itsyoucef.com')->send(
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

        session()->flash('success', $this->formContent['success_message']);

        $this->isSubmitting = false;
    }

    public function render()
    {
        return $this->view()
            ->title(__('ui.pages.contact'))
            ->layout('layouts::app');
    }
};
