<?php

namespace App\Http\Resources\About;

use App\Http\Resources\Projects\CompanyPreviewResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Company */
class CareerPreviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $locale = app()->getLocale();

        return [
            'id' => $this->id,
            'company' => $this->whenLoaded('company', CompanyPreviewResource::make($this->company)),
            'description' => $this->getTranslation('description', $locale),
            'duration' => $this->duration,
        ];
    }
}
