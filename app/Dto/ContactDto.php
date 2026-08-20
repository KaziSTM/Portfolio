<?php

namespace App\Dto;

use App\Http\Requests\ContactRequest;

final readonly class ContactDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $message,
        public ?string $phone = null,
        public array $services = [],
    ) {}

    public static function fromRequest(ContactRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'],
            email: $validated['email'],
            message: $validated['message'],
            phone: $validated['phone'] ?? null,
            services: collect(
                $request->input('services', [])
            )
                ->filter()
                ->keys()
                ->values()
                ->toArray(),
        );
    }
}
