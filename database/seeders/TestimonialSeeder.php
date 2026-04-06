<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            $kheops = Project::query()
                ->where('slug', 'kheops')
                ->firstOrFail();
            $testimonials = [

                [
                    'author_name' => 'Sarah Benali',
                    'author_role' => 'Head of Product, Kheops',
                    'content' => 'Working on Kheops was a game-changer for our platform. The backend architecture brought clarity and scalability to complex AI workflows, allowing us to move faster while maintaining stability.',
                    'rating' => 5,
                ],

                [
                    'author_name' => 'Yacine Touati',
                    'author_role' => 'CTO, Techfly',
                    'content' => 'The level of precision in API design and data pipeline implementation significantly improved how we handle AI-driven features. The system is both robust and easy to extend.',
                    'rating' => 5,
                ],

                [
                    'author_name' => 'Amine Khelifi',
                    'author_role' => 'AI Engineer',
                    'content' => 'The integration of RAG pipelines and data processing layers was done with great attention to detail. It made experimentation and iteration much more efficient for our team.',
                    'rating' => 5,
                ],

            ];

            foreach ($testimonials as $data) {
                Testimonial::updateOrCreate(
                    [
                        'project_id' => $kheops->id,
                        'author_name' => $data['author_name'],
                    ],
                    $data
                );
            }
        });
    }
}
