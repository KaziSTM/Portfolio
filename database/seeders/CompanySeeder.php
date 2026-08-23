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
                        'ar' => 'المحل رقم 980، المركز التجاري ومركز الأعمال، المحمدية 16000، الجزائر',
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
                    'name' => 'CCO',
                    'headquarter' => [
                        'en' => 'Les Genets, Chemin de Wilaya, Route 75, Oran, Algérie',
                        'fr' => 'Les Genets, Chemin de Wilaya, Route 75, Oran, Algérie',
                        'ar' => 'شركةلي زينيت، طريق الولاية، الطريق رقم 75، وهران 31000، الجزائر',
                    ],
                    'industry' => [
                        'en' => 'Convention Center & Event Services',
                        'fr' => 'Centre de conventions et services événementiels',
                        'ar' => 'مركز المؤتمرات والخدمات الخاصة بالفعاليات',
                    ],
                    'size' => '50-200',
                    'website' => 'https://www.gcco.dz/',
                ],
                [
                    'name' => 'PassMemo',
                    'headquarter' => [
                        'en' => '1047 Route des Dolines, Allée Pierre Ziller, Business Pôle 1, 06560 Valbonne, France',
                        'fr' => '1047 Route des Dolines, Allée Pierre Ziller, Business Pôle 1, 06560 Valbonne, France',
                        'ar' => '1047 طريق دولين، زقاق بيير زيلر، مركز الأعمال 1، 06560 فالْبون، فرنسا',
                    ],
                    'industry' => [
                        'en' => 'HealthTech & Elderly Care',
                        'fr' => 'HealthTech et accompagnement des personnes âgées',
                        'ar' => 'التكنولوجيا الصحية ورعاية كبار السن',
                    ],
                    'size' => '1-50',
                    'website' => 'https://passmemo.fr/',
                ],

                [
                    'name' => 'Kheops',
                    'headquarter' => [
                        'en' => 'France',
                        'fr' => 'France',
                        'ar' => 'فرنسا',
                    ],
                    'industry' => [
                        'en' => 'Artificial Intelligence & Business Automation',
                        'fr' => 'Intelligence artificielle et automatisation des processus métier',
                        'ar' => 'الذكاء الاصطناعي وأتمتة العمليات التجارية',
                    ],
                    'size' => '1-50',
                    'website' => 'https://kheops.ai',
                ],

                [
                    'name' => 'Klassty',
                    'headquarter' => [
                        'en' => 'La Zone d’Activités, Lot 21 au 30, Dar El Beida 16100, Algeria',
                        'fr' => 'La Zone d’Activités, Lot 21 au 30, Dar El Beida 16100, Algérie',
                        'ar' => 'منطقة النشاطات، القطعة 21 إلى 30، الدار البيضاء 16100، الجزائر',
                    ],
                    'industry' => [
                        'en' => 'E-Learning & Education',
                        'fr' => 'E-learning et éducation',
                        'ar' => 'التعليم الإلكتروني والتعليم',
                    ],
                    'size' => '11-50',
                    'website' => 'https://klassty.com/',
                ],

                [
                    'name' => 'DZignerd',
                    'headquarter' => [
                        'en' => 'Algeria',
                        'fr' => 'Algérie',
                        'ar' => 'الجزائر',
                    ],
                    'industry' => [
                        'en' => 'E-Commerce & Artisan Products',
                        'fr' => 'E-commerce et produits artisanaux',
                        'ar' => 'التجارة الإلكترونية والمنتجات الحرفية',
                    ],
                    'size' => '1-50',
                    'website' => 'https://dzignerd.com/',
                ],

                [
                    'name' => 'Mobius Solutions',
                    'headquarter' => [
                        'en' => 'N°O-6 Cité Patrimoine, Hussein Dey 16040, Algeria',
                        'fr' => 'N°O-6 Cité Patrimoine, Hussein Dey 16040, Algérie',
                        'ar' => 'رقم O-6، حي باتريموان، حسين داي 16040، الجزائر',
                    ],
                    'industry' => [
                        'en' => 'Construction & Building Services',
                        'fr' => 'Construction et services du bâtiment',
                        'ar' => 'البناء وخدمات التشييد',
                    ],
                    'size' => '1-50',
                    'website' => 'http://www.mobiusdz.com/',
                ],

                [
                    'name' => 'Carloue',
                    'headquarter' => [
                        'en' => 'Algeria',
                        'fr' => 'Algérie',
                        'ar' => 'الجزائر',
                    ],
                    'industry' => [
                        'en' => 'Car Rental & Mobility',
                        'fr' => 'Location de voitures et mobilité',
                        'ar' => 'تأجير السيارات والتنقل',
                    ],
                    'size' => '1-50',
                    'website' => null,
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

                if ($name === 'Freelance') {
                    $logoPath = public_path('assets/images/logo/logo.svg');
                } else {

                    $logoPath = public_path('assets/images/companies/'.Str::slug($model->name).'-logo.webp');
                }

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
