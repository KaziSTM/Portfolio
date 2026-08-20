<?php

namespace App\Http\Resources\Projects;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyPreviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'name' => $this->name,
            'logo' => $this->getFirstMediaUrl('logo'),
            'industry' => $this->industry,
            'size' => $this->size,
            'headquarter' => $this->headquarter,
            'website' => $this->website,
        ];
    }
}
