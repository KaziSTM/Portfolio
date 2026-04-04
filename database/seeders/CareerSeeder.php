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
                    'description' => 'Senior Backend / Full-Stack Developer on MyEcom, a multi-tenant e-commerce ERP covering orders, stock, logistics, and billing.

Focused on backend architecture, scalable APIs, and performance. Core contributor to MyEcom Cockpit, handling automated provisioning and deployment workflows.',
                ],

                [
                    'company' => 'Techfly',
                    'duration' => 'December 2022 – February 2025',
                    'description' => 'Full-Stack Developer across multiple platforms including Kheops (AI), DZIGNERD (multi-store e-commerce), PASSMEMO (data processing), and GCCO (reservation system).

Specialized in backend architecture, API design, and complex business logic with strong integration between web and mobile systems.',
                ],

                [
                    'company' => 'Freelance',
                    'duration' => 'June 2021 – December 2022',
                    'description' => 'Built full-stack applications from scratch, covering backend systems, frontend interfaces, and database design.

Delivered scalable and customized solutions while establishing strong foundations in system architecture and API development.',
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
