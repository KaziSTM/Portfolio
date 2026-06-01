<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::updateOrCreate(
            [
                'author_name' => ' Zerarka Akram',
            ],
            [
                'author_role' => [
                    'en' => 'Co-Founder of TechFly & CTO of Kheops',
                    'fr' => 'Co-fondateur de TechFly & CTO de Kheops',
                    'ar' => 'الشريك المؤسس لـ TechFly والمدير التقني لـ Kheops',
                ],

                'content' => [
                    'fr' => "Youcef, c'est le genre de développeur qui ne code pas juste pour que ça marche — il code pour que ça tienne. Full stack dans l'âme, il navigue entre les couches techniques avec une aisance déconcertante et une réflexion qui va toujours un coup d'avance. Collaborer avec lui, c'est avoir l'esprit tranquille.",

                    'en' => "Youcef is the kind of developer who doesn't code just to make things work—he codes to make them last. A full-stack developer at heart, he moves across technical layers with remarkable ease and a mindset that's always one step ahead. Working with him gives you complete peace of mind.",

                    'ar' => 'يوسف من ذلك النوع من المطورين الذين لا يبرمجون فقط لكي يعمل الشيء، بل يبرمجون ليصمد ويستمر. مطور Full Stack بالفطرة، يتنقل بين مختلف الطبقات التقنية بسهولة لافتة، ويتمتع بعقلية تسبق الآخرين بخطوة دائمًا. العمل معه يمنحك راحة بال حقيقية.',
                ],

                'rating' => 5,

                'avatar' => null,

                'project_id' => null,
            ]
        );
    }
}
