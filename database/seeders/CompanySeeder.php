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
                    'headquarter' => [
                        'en' => "Local n° 980, Centre commercial et d'affaires, Mohammadia 16000, Algeria",
                        'fr' => "Local n° 980, Centre commercial et d'affaires, Mohammadia 16000, Algérie",
                        'ar' => "المحل رقم 980، المركز التجاري ومركز الأعمال، المحمدية 16000، الجزائر",
                    ],
                    'industry' => [
                        'en' => 'Information Technology',
                        'fr' => 'Technologies de l’information',
                        'ar' => 'تكنولوجيا المعلومات',
                    ],
                    'size' => '11-50',
                    'website' => 'https://zimou.group/',
                ],
                [
                    'name' => 'Techfly',
                    'headquarter' => [
                        'en' => 'Oran, Algeria',
                        'fr' => 'Oran, Algérie',
                        'ar' => 'وهران، الجزائر',
                    ],
                    'industry' => [
                        'en' => 'Information Technology',
                        'fr' => 'Technologies de l’information',
                        'ar' => 'تكنولوجيا المعلومات',
                    ],
                    'size' => '11-50',
                    'website' => 'https://techfly.dz',
                ],
                [
                    'name' => 'Creative touch',
                    'headquarter' => [
                        'en' => 'Oran, Algeria',
                        'fr' => 'Oran, Algérie',
                        'ar' => 'وهران، الجزائر',
                    ],
                    'industry' => [
                        'en' => 'Marketing',
                        'fr' => 'Marketing',
                        'ar' => 'التسويق',
                    ],
                    'size' => '11-50',
                    'website' => 'https://creative-touch.dz/',
                ],
                [
                    'name' => 'OUTPUT',
                    'headquarter' => [
                        'en' => 'SARL OUTPUT ALGÉRIE, 17 Avenue Larbi Alik, Hydra, Algiers',
                        'fr' => 'SARL OUTPUT ALGÉRIE, 17 Avenue Larbi Alik, Hydra, Alger',
                        'ar' => 'شركة OUTPUT الجزائر، 17 شارع العربي عليق، حيدرة، الجزائر العاصمة',
                    ],
                    'industry' => [
                        'en' => 'Music Education & Services',
                        'fr' => 'Éducation musicale et services',
                        'ar' => 'التعليم الموسيقي والخدمات',
                    ],
                    'size' => '11-50',
                    'website' => 'https://www.musicspacedz.com/en',
                ],
                [
                    'name' => 'Freelance',
                    'headquarter' => [
                        'en' => 'Remote',
                        'fr' => 'À distance',
                        'ar' => 'عن بعد',
                    ],
                    'industry' => [
                        'en' => 'Software Development',
                        'fr' => 'Développement logiciel',
                        'ar' => 'تطوير البرمجيات',
                    ],
                ],
            ];

            foreach ($companies as $company) {
                $name = $company['name'];

                $model = Company::query()->updateOrCreate(
                    ['slug' => Str::slug($name)],
                    [
                        'slug' => Str::slug($name),
                        'name' => $name,
                        'headquarter' => $company['headquarter'] ?? null,
                        'industry' => $company['industry'] ?? null,
                        'size' => $company['size'] ?? null,
                        'website' => $company['website'] ?? null,
                    ],
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
