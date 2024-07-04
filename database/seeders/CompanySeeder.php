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

            $company = Company::create([
                'name' => 'Techfly',
                'headquarter' => 'Oran, Oran',
                'industry' => 'IT',
                'size' => '11-50',
                'website' => 'https://techfly.dz'
            ]);

            $company->addMedia(public_path('storage/companies/techfly-logo.png'))
                ->toMediaCollection('logo');
            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            throw $e;
        }
    }
}
