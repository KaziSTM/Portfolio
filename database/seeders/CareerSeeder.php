<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CareerSeeder extends Seeder
{

    /**
     * @throws \Throwable
     */
    public function run(): void
    {
        DB::transaction(function (): void {
            $careers = [
                [
                    'company' => 'Zimou Group',
                    'duration' => [
                        'en' => 'March 2025 – Present',
                        'fr' => 'Mars 2025 – Présent',
                        'ar' => 'مارس 2025 – الآن',
                    ],
                    'description' => [
                        'en' => 'Senior Backend / Full-Stack Developer working on MyEcom, a multi-tenant e-commerce ERP covering orders, inventory, logistics, and billing.

Focused on backend architecture, scalable API design, and system performance. Core contributor to MyEcom Cockpit, developing automated provisioning and deployment workflows for tenant onboarding and infrastructure management.',

                        'fr' => 'Développeur Backend / Full-Stack Senior travaillant sur MyEcom, un ERP e-commerce multi-tenant couvrant les commandes, le stock, la logistique et la facturation.

Responsable de l’architecture backend, de la conception d’API scalables et des performances système. Contribution clé au MyEcom Cockpit, avec développement des systèmes de provisioning et de déploiement automatisés.',

                        'ar' => 'مطور Backend وFull-Stack أول يعمل على MyEcom، وهو نظام ERP للتجارة الإلكترونية متعدد المستأجرين يشمل الطلبات والمخزون واللوجستيك والفوترة.

التركيز على تصميم البنية الخلفية وواجهات API القابلة للتوسع وتحسين الأداء. مساهم رئيسي في نظام MyEcom Cockpit مع تطوير عمليات التهيئة والنشر التلقائي.',
                    ],
                ],

                [
                    'company' => 'Techfly',
                    'duration' => [
                        'en' => 'December 2022 – February 2025',
                        'fr' => 'Décembre 2022 – Février 2025',
                        'ar' => 'ديسمبر 2022 – فبراير 2025',
                    ],
                    'description' => [
                        'en' => 'Full-Stack Developer working across multiple platforms including Kheops (AI platform), DZIGNERD (multi-store e-commerce), PASSMEMO (data processing), and GCCO (reservation system).

Specialized in backend architecture, API design, and complex business logic. Built scalable systems integrating web and mobile applications, with a strong focus on data modeling, performance, and system reliability.',

                        'fr' => 'Développeur Full-Stack intervenant sur plusieurs plateformes : Kheops (IA), DZIGNERD (e-commerce multi-boutiques), PASSMEMO (traitement de données) et GCCO (réservation).

Spécialisé en architecture backend, conception d’API et logique métier complexe. Développement de systèmes scalables intégrant web et mobile avec un focus sur la performance et la fiabilité.',

                        'ar' => 'مطور Full-Stack عمل على عدة منصات مثل Kheops (الذكاء الاصطناعي)، DZIGNERD (تجارة إلكترونية متعددة المتاجر)، PASSMEMO (معالجة البيانات)، وGCCO (نظام الحجز).

متخصص في تصميم البنية الخلفية وواجهات API والمنطق المعقد. بناء أنظمة قابلة للتوسع تربط بين الويب والموبايل مع التركيز على الأداء والموثوقية.',
                    ],
                ],

                [
                    'company' => 'Freelance',
                    'duration' => [
                        'en' => 'June 2021 – December 2022',
                        'fr' => 'Juin 2021 – Décembre 2022',
                        'ar' => 'يونيو 2021 – ديسمبر 2022',
                    ],
                    'description' => [
                        'en' => 'Full-Stack Developer building applications from scratch, covering backend systems, frontend interfaces, and database design.

Delivered customized and scalable solutions for various clients, while building strong foundations in system architecture, API development, and real-world problem solving.',

                        'fr' => 'Développeur Full-Stack réalisant des applications from scratch, incluant backend, frontend et conception de base de données.

Développement de solutions sur mesure et scalables pour différents clients, avec une forte montée en compétence en architecture et conception d’API.',

                        'ar' => 'مطور Full-Stack قام ببناء تطبيقات من الصفر تشمل الواجهة والخلفية وتصميم قواعد البيانات.

تقديم حلول مخصصة وقابلة للتوسع للعملاء مع بناء أساس قوي في تصميم الأنظمة وواجهات API.',
                    ],
                ],
            ];

            foreach ($careers as $index => $career) {
                $company = Company::query()
                    ->where('slug', Str::slug($career['company']))
                    ->firstOrFail();

                Career::query()->updateOrCreate(
                    [
                        'company_id' => $company->id,
                        'position' => $index + 1,
                    ],
                    [
                        'duration' => $career['duration'],
                        'description' => $career['description'],
                    ],
                );
            }
        });
    }
}
