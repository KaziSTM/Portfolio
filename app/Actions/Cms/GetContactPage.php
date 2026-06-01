<?php

namespace App\Actions\Cms;


use App\Support\Cms;

class GetContactPage
{

    public function __invoke(): array
    {
        return [
            'hero' => $this->getHeroContent(),
            'form_content' => $this->getFormContent(),
            'contacts' => $this->getContacts(),
            'services' => $this->getServices()
        ];
    }

    private function getHeroContent(): array
    {
        return Cms::section('contact', 'hero', [
            'title' => 'How can I help you?',
            'subtitle' => "Let's get in touch",
            'reach_label' => 'You can reach me at the following',
        ]);
    }

    private function getFormContent(): array
    {

        return Cms::section('contact', 'form', [
            'title' => 'Fill out the form below to get started',
            'description' => 'Tell me a little about your project.',
            'services' => ['Web development', 'Web design', 'Consulting', 'Other'],
            'submit_label' => __('ui.actions.get_started'),
            'submitting_label' => __('ui.actions.sending'),
            'success_message' => __('ui.contact.success'),
            'rate_limit_message' => __('ui.contact.rate_limit'),
        ]);
    }

    private function getContacts(): array
    {
        return Cms::section('contact', 'contacts', [
            'items' => [],
        ])['items'];
    }

    private function getServices(): array
    {

        return collect($this->getFormContent()['services'])
            ->mapWithKeys(fn($service) => [$service => false])
            ->all();
    }
}
