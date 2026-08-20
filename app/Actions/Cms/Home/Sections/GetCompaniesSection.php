<?php

namespace App\Actions\Cms\Home\Sections;

use App\Http\Resources\Projects\CompanyPreviewResource;
use App\Models\Company;
use App\Support\Cms;
use Illuminate\Database\Eloquent\Collection;

class GetCompaniesSection
{
    public function __invoke(): array
    {
        return [
            'content' => Cms::section('home', 'companies', [
                'title' => 'Trusted by',
                'highlight' => 'companies',
                'suffix' => 'worldwide',
            ]),

            'companies' => CompanyPreviewResource::collection($this->getCompanies()),
        ];
    }

    public function getCompanies(): Collection
    {
        return Company::query()
            ->with('media')
            ->whereNotIn('slug', ['freelance', 'personal'])
            ->take(10)
            ->get();
    }
}
