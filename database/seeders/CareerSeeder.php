<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {

            DB::beginTransaction();

            $careers = [

                [
                    'duration' => 'June 2021 – Present',
                    'description' => 'Developed full-stack web applications from scratch, handling back-end services, front-end interfaces, and database management. Delivered tailored solutions that met clients\' specific needs and ensured robust, scalable, and user-friendly applications.',
                    'company_id' => 3
                ],
                [
                    'duration' => 'December 2022 – Present',
                    'description' => 'As a Full-Stack Web Developer at Techfly, I have played a crucial role in developing and enhancing various platforms and applications. My responsibilities included leading web development efforts, integrating APIs, and ensuring seamless functionality across web and mobile platforms. I focused on creating user-friendly dashboards, enhancing existing features, and developing new functionalities to optimize performance. My work consistently aimed to deliver high-quality, scalable solutions tailored to meet the specific needs of our clients.',
                    'company_id' => 1
                ],
            ];
            foreach ($careers as $career) {
                $career = Career::create($career);
            }
            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            throw $e;
        }
    }
}
