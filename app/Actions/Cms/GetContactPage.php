<?php

namespace App\Actions\Cms;

use App\Actions\Translations\GetContactPageTranslations;
use App\Support\Cms;

class GetContactPage
{
    public function __invoke(): array
    {
        $formContent = $this->getFormContent();

        return [
            'heroSection' => $this->getHeroContent(),
            'formContent' => $formContent,
            'contacts' => $this->getContacts(),
            'services' => collect($formContent['services'])
                ->mapWithKeys(fn ($service) => [$service => false])
                ->all(),
            'translations' => app(GetContactPageTranslations::class)(),

        ];
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

    private function getHeroContent(): array
    {
        return Cms::section('contact', 'hero', [
            'title' => 'How can I help you?',
            'subtitle' => "Let's get in touch",
            'reach_label' => 'You can reach me at the following',
        ]);
    }

    private function getContacts(): array
    {
        return Cms::section('contact', 'contacts', [
            'items' => [],
        ])['items'];
    }
}
