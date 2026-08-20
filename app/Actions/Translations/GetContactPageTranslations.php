<?php

namespace App\Actions\Translations;

class GetContactPageTranslations
{
    public function __invoke(): array
    {
        return [

            'contact' => [
                'fields' => [
                    'name' => __('ui.contact.fields.name'),
                    'email' => __('ui.contact.fields.email'),
                    'phone' => __('ui.contact.fields.phone'),
                    'message' => __('ui.contact.fields.message'),
                    'services' => __('ui.contact.fields.services'),
                ],

                'placeholders' => [
                    'name' => __('ui.contact.placeholders.name'),
                    'email' => __('ui.contact.placeholders.email'),
                    'phone' => __('ui.contact.placeholders.phone'),
                    'message' => __('ui.contact.placeholders.message'),
                ],
            ],

        ];
    }
}
