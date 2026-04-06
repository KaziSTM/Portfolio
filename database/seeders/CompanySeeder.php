<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function (): void {
            $companies = [
                [
                    'name' => 'Zimou Group',
                    'headquarter' => "local n° 980 Centre commercial et d'affaires, Mohammadia 16000, Algeria",
                    'industry' => 'IT',
                    'size' => '11-50',
                    'website' => 'https://zimou.group/',
                ],
                [
                    'name' => 'Techfly',
                    'headquarter' => 'Oran, Oran',
                    'industry' => 'IT',
                    'size' => '11-50',
                    'website' => 'https://techfly.dz',
                ],
                [
                    'name' => 'Creative touch',
                    'headquarter' => 'Oran, Oran',
                    'industry' => 'Marketing',
                    'size' => '11-50',
                    'website' => 'https://creative-touch.dz/',
                ],
                [
                    'name' => 'OUTPUT',
                    'headquarter' => 'SARL OUTPUT ALGERIE, 17 Avenue Larbi Alik Hydra paradou ',
                    'industry' => 'Music Education & Services',
                    'size' => '11-50',
                    'website' => 'https://www.musicspacedz.com/en',
                ],
                [
                    'name' => 'Freelance',
                ],
            ];

            foreach ($companies as $company) {
                $model = Company::query()->updateOrCreate(
                    ['name' => $company['name']],
                    $company,
                );

                $logoPath = public_path('assets/images/companies/' . Str::slug($model->name) . '-logo.png');

                if (!is_file($logoPath)) {
                    continue;
                }

                if ($model->getFirstMedia('logo')?->file_name === basename($logoPath)) {
                    continue;
                }

                $model->clearMediaCollection('logo');
                $model->addMedia($logoPath)->preservingOriginal()->toMediaCollection('logo');
            }
        });
    }
}
