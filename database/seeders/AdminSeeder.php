<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'ynezrek@gmail.com'],
            [
                'name' => 'Youcef Nezrek',
                'password' => 'You@01400',
                'email_verified_at' => now(),
            ],
        );
    }
}
