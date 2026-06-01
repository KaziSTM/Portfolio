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
                    'company' => 'Freelance',
                    'duration' => [
                        'en' => 'June 2021 – Present',
                        'fr' => 'Juin 2021 – Présent',
                        'ar' => 'يونيو 2021 – حتى الآن',
                    ],
                    'description' => [
                        'en' => 'Independent Full-Stack Developer and Software Consultant delivering custom web platforms, SaaS products, ERP solutions, and business automation systems for clients across multiple industries.

Specialized in backend architecture, scalable API development, multi-tenant applications, AI integrations, and complex business workflows. Responsible for the full project lifecycle, from technical planning and system design to implementation, deployment, and long-term maintenance.',

                        'fr' => 'Développeur Full-Stack indépendant et consultant logiciel, réalisant des plateformes web sur mesure, des solutions SaaS, des ERP et des systèmes d’automatisation pour des clients issus de différents secteurs.

Spécialisé en architecture backend, conception d’API scalables, applications multi-tenant, intégrations IA et logique métier complexe. Responsable de l’ensemble du cycle de vie des projets, de la conception technique au déploiement et à la maintenance.',


                        'ar' => 'مطور Full-Stack مستقل ومستشار برمجيات، أقوم بتطوير منصات ويب مخصصة وحلول SaaS وأنظمة ERP وأدوات أتمتة الأعمال لعملاء من مختلف القطاعات.

متخصص في تصميم البنية الخلفية، وتطوير واجهات API القابلة للتوسع، والتطبيقات متعددة المستأجرين، وتكاملات الذكاء الاصطناعي، والمنطق التجاري المعقد. أتولى دورة حياة المشروع بالكامل بدءاً من التخطيط والتصميم التقني وصولاً إلى التطوير والنشر والصيانة طويلة المدى.',

                    ],
                ],
                [
                    'company' => 'Zimou Group',
                    'duration' => [
                        'en' => 'March 2025 – April 2026',
                        'fr' => 'Mars 2025 – Avril 2026',
                        'ar' => 'مارس 2025 – أبريل 2026',
                    ],
                    'description' => [
                        'en' => 'Senior Backend / Full-Stack Developer working on MyEcom, a multi-tenant commerce platform and ERP ecosystem covering orders, inventory, logistics, billing, and business operations.

Focused on backend architecture, scalable APIs, automation, and platform reliability. Core contributor to MyEcom Cockpit, designing provisioning, deployment, and infrastructure management workflows that streamline tenant onboarding and operational processes.',

                        'fr' => 'Développeur Backend / Full-Stack Senior travaillant sur MyEcom, une plateforme e-commerce multi-tenant et un écosystème ERP couvrant les commandes, le stock, la logistique, la facturation et les opérations métier.

Responsable de l’architecture backend, des API scalables, de l’automatisation et de la fiabilité de la plateforme. Contributeur clé à MyEcom Cockpit avec la conception de workflows de provisioning, de déploiement et de gestion d’infrastructure.',

                        'ar' => 'مطور Backend وFull-Stack أول يعمل على MyEcom، وهي منصة تجارة إلكترونية متعددة المستأجرين ونظام ERP متكامل يغطي الطلبات والمخزون واللوجستيك والفوترة والعمليات التشغيلية.

التركيز على تصميم البنية الخلفية، وتطوير واجهات API القابلة للتوسع، والأتمتة، وموثوقية المنصة. مساهم رئيسي في MyEcom Cockpit من خلال تصميم عمليات التهيئة والنشر وإدارة البنية التحتية لتسهيل انضمام العملاء وإدارة المنصة.',
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
