<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'phone' => [
                'nullable',
                'string',
                'regex:/^\+?[1-9]\d{7,14}$/',
            ],
            'message' => ['required', 'string', 'min:10'],
            'services' => ['array'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('contact.validation.name.required'),
            'name.min' => __('contact.validation.name.min'),

            'email.required' => __('contact.validation.email.required'),
            'email.email' => __('contact.validation.email.email'),

            'phone.regex' => __('contact.validation.phone.regex'),

            'message.required' => __('contact.validation.message.required'),
            'message.min' => __('contact.validation.message.min'),
        ];
    }
}
