<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                    'duration' => 'March 2025 – Present',
                    'description' => 'Senior Backend / Full-Stack Developer working on MyEcom, a comprehensive e-commerce ERP system covering products, orders, stock, logistics, billing, and external integrations. Core contributor to MyEcom Cockpit, focusing on instance provisioning, deployment automation, backend architecture, performance optimization, and scalable API design.',
                ],
                [
                    'company' => 'Techfly',
                    'duration' => 'December 2022 – February 2025',
                    'description' => 'Full-Stack Developer contributing to multiple large-scale platforms: Kheops (AI-driven B2B personalization), DZIGNERD (multi-store e-commerce), PASSMEMO (AI-powered elderly care platform), CCO (event reservation system), Klassty (CRM), and Carloue (car reservation platform). Focused on backend architecture, API development, dashboard systems, and seamless integration with mobile applications.',
                ],
                [
                    'company' => 'Freelancer',
                    'duration' => 'June 2021 – present',
                    'description' => 'Developed full-stack web applications from scratch, including backend services, frontend interfaces, and database design. Delivered scalable and customized solutions tailored to client requirements.',
                ],
            ];

            foreach ($careers as $career) {
                $company = Company::query()
                    ->where('name', $career['company'])
                    ->firstOrFail();

                Career::query()->updateOrCreate(
                    [
                        'company_id' => $company->id,
                        'duration' => $career['duration'],
                    ],
                    [
                        'description' => $career['description'],
                    ],
                );
            }
        });
    }
}
