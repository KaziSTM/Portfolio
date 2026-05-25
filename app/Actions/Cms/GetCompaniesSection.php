<?php

namespace App\Actions\Cms;

use App\Models\Company;
use App\Support\Cms;

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

            'companies' => Company::query()
                ->whereNotIn('slug', ['freelance', 'personal'])
                ->take(10)
                ->get()
                ->map(fn(Company $company) => [
                    'id' => $company->id,

                    'name' => $company->name,

                    'website' => $company->website,

                    'logo_url' => $company->getFirstMediaUrl('logo'),
                ])
                ->take(10)
                ->values()
                ->all(),
        ];
    }
}
