<?php

namespace App\Http\Resources\Projects;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author_name' => $this->author_name,
            'author_role' => $this->author_role,
            'content' => $this->content,
            'rating' => $this->rating,
            'avatar' => $this->avatar,
        ];
    }
}
