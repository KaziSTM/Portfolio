<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {

            DB::beginTransaction();

            $companies = [
                // [
                //     'name' => 'Techfly',
                //     'headquarter' => 'Oran, Oran',
                //     'industry' => 'IT',
                //     'size' => '11-50',
                //     'website' => 'https://techfly.dz'
                // ],
                [
                    'name' => 'Creative touch',
                    'headquarter' => 'Oran, Oran',
                    'industry' => 'Marketing',
                    'size' => '11-50',
                    'website' => 'https://creative-touch.dz/'
                ],
            ];
            foreach ($companies as $company) {
                $company = Company::create($company);
                $company->addMedia(public_path('storage/companies/' . str()->slug($company->name) . '-logo.png'))
                    ->toMediaCollection('logo');
            }

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            throw $e;
        }
    }
}
