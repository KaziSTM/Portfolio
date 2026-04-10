<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use App\Models\CmsSection;
use Database\Seeders\Concerns\BuildsTranslations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsPageSeeder extends Seeder
{
    use BuildsTranslations;

    public function run(): void
    {
        DB::transaction(function (): void {
            foreach ($this->pages() as $pageData) {
                $page = CmsPage::query()->updateOrCreate(
                    ['key' => $pageData['key']],
                    [
                        'name' => $this->translations($pageData['name']),
                        'meta_title' => $pageData['meta_title'] ?? $pageData['name'],
                        'meta_description' => $pageData['meta_description'] ?? '',
                    ],
                );

                foreach ($pageData['sections'] as $position => $section) {
                    CmsSection::query()->updateOrCreate(
                        [
                            'cms_page_id' => $page->id,
                            'key' => $section['key'],
                        ],
                        [
                            'label' => $section['label'],
                            'position' => $position + 1,
                            'data' => $section['data'],
                        ],
                    );
                }
            }
        });
    }

    protected function pages(): array
    {
        return [
            [
                'key' => 'global',
                'name' => [
                    'en' => 'Global Content',
                    'fr' => 'Contenu global',
                    'ar' => 'المحتوى العام',
                ],
                'sections' => [
                    [
                        'key' => 'header',
                        'label' => [
                            'en' => 'Header CTA',
                            'fr' => 'CTA En-tête',
                            'ar' => 'زر الدعوة في الأعلى',
                        ],
                        'data' => [
                            'en' => [
                                'cta_label' => 'Book a call',
                            ],
                            'fr' => [
                                'cta_label' => 'Réserver un appel',
                            ],
                            'ar' => [
                                'cta_label' => 'احجز مكالمة',
                            ],
                        ],
                    ],

                    [
                        'key' => 'socials',
                        'label' => [
                            'en' => 'Social Links',
                            'fr' => 'Liens sociaux',
                            'ar' => 'روابط التواصل',
                        ],
                        'data' => [
                            'en' => [
                                'items' => [
                                    ['name' => 'Github', 'link' => 'https://github.com/KaziSTM', 'icon' => 'github-logo'],
                                    ['name' => 'Linkedin', 'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6', 'icon' => 'linkedin-logo'],
                                    ['name' => 'Instagram', 'link' => 'https://www.instagram.com/that_mofo_kaz/', 'icon' => 'instagram-logo'],
                                ],
                            ],
                            'fr' => [
                                'items' => [
                                    ['name' => 'Github', 'link' => 'https://github.com/KaziSTM', 'icon' => 'github-logo'],
                                    ['name' => 'Linkedin', 'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6', 'icon' => 'linkedin-logo'],
                                    ['name' => 'Instagram', 'link' => 'https://www.instagram.com/that_mofo_kaz/', 'icon' => 'instagram-logo'],
                                ],
                            ],
                            'ar' => [
                                'items' => [
                                    ['name' => 'Github', 'link' => 'https://github.com/KaziSTM', 'icon' => 'github-logo'],
                                    ['name' => 'Linkedin', 'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6', 'icon' => 'linkedin-logo'],
                                    ['name' => 'Instagram', 'link' => 'https://www.instagram.com/that_mofo_kaz/', 'icon' => 'instagram-logo'],
                                ],
                            ],
                        ],
                    ],

                    [
                        'key' => 'footer',
                        'label' => [
                            'en' => 'Footer CTA',
                            'fr' => 'CTA Pied de page',
                            'ar' => 'الدعوة في الأسفل',
                        ],
                        'data' => [
                            'en' => [
                                'title' => 'Lets make something great together',
                                'description' => 'I’m always excited to collaborate on innovative projects or discuss potential opportunities. Feel free to reach out!',
                                'button_label' => 'Book a call',
                                'copyright' => '© 2024, All Rights Reserved',
                            ],
                            'fr' => [
                                'title' => 'Créons quelque chose de remarquable ensemble',
                                'description' => 'Je suis toujours enthousiaste à l’idée de collaborer sur des projets innovants ou de discuter de nouvelles opportunités. N’hésitez pas à me contacter !',
                                'button_label' => 'Réserver un appel',
                                'copyright' => '© 2024, Tous droits réservés',
                            ],
                            'ar' => [
                                'title' => 'لنصنع شيئًا رائعًا معًا',
                                'description' => 'أنا دائمًا متحمس للتعاون في مشاريع مبتكرة أو مناقشة فرص جديدة. لا تتردد في التواصل معي!',
                                'button_label' => 'احجز مكالمة',
                                'copyright' => '© 2024، جميع الحقوق محفوظة',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'key' => 'home',
                'name' => [
                    'en' => 'Home Page',
                    'fr' => 'Page d’accueil',
                    'ar' => 'الصفحة الرئيسية',
                ],
                'sections' => [
                    [
                        'key' => 'hero',
                        'label' => [
                            'en' => 'Hero',
                            'fr' => 'Bannière',
                            'ar' => 'الواجهة الرئيسية',
                        ],
                        'data' => [
                            'en' => [
                                'intro' => "Hi, I'm Youcef!",
                                'kicker' => 'Helping businesses',
                                'title' => 'build scalable digital products',
                                'description' => 'Full-stack web developer focused on building scalable platforms and complex digital products. I specialize in backend architecture, APIs, and designing systems that handle real-world business logic efficiently.',
                                'cta_label' => 'Book a call with me',
                            ],
                            'fr' => [
                                'intro' => "Bonjour, je suis Youcef !",
                                'kicker' => 'Aider les ',
                                'title' => 'entreprises à créer des produits numériques évolutifs',
                                'description' => 'Développeur full-stack spécialisé dans la création de plateformes scalables et de produits digitaux complexes. Je me concentre sur l’architecture backend, les APIs et la conception de systèmes capables de gérer efficacement des logiques métier réelles.',
                                'cta_label' => 'Réserver un appel avec moi',
                            ],

                            'ar' => [
                                'intro' => 'مرحبًا، أنا يوسف!',
                                'kicker' => 'مساعدة الشركات على',
                                'title' => 'بناء منتجات رقمية قابلة للتوسع',
                                'description' => 'مطور ويب Full-stack متخصص في بناء منصات قابلة للتوسع وأنظمة رقمية معقدة. أركز على هندسة الخلفية وواجهات API وتصميم أنظمة قادرة على التعامل مع منطق الأعمال الواقعي بكفاءة.',
                                'cta_label' => 'احجز مكالمة معي',
                            ],
                        ],
                    ],

                    [
                        'key' => 'features',
                        'label' => [
                            'en' => 'Features',
                            'fr' => 'Fonctionnalités',
                            'ar' => 'المميزات',
                        ],
                        'data' => [
                            'en' => [
                                'title' => 'How I build reliable systems',
                                'description' => 'I focus on delivering reliable, scalable solutions with a strong emphasis on backend architecture, performance, and clean implementation of complex business logic.',
                                'items' => [
                                    [
                                        'title' => 'Scalable Architecture',
                                        'description' => 'Systems designed to handle growth, complexity, and real-world usage without breaking down.',
                                        'icon' => 'heroicon-o-rectangle-stack'
                                    ],
                                    [
                                        'title' => 'Clean & Maintainable Code',
                                        'description' => 'Well-structured, readable codebases that are easy to extend, debug, and maintain over time.',
                                        'icon' => 'heroicon-o-code-bracket'
                                    ],
                                    [
                                        'title' => 'Reliable Delivery',
                                        'description' => 'Consistent execution with attention to performance, edge cases, and production readiness.',
                                        'icon' => 'heroicon-o-check-circle'
                                    ],
                                ],
                            ],
                            'fr' => [
                                'title' => 'Comment je construis des systèmes fiables',
                                'description' => 'Je me concentre sur des solutions fiables et scalables avec un fort accent sur l’architecture backend, la performance et l’implémentation propre de logiques métier complexes.',
                                'items' => [
                                    [
                                        'title' => 'Architecture scalable',
                                        'description' => 'Des systèmes conçus pour gérer la croissance, la complexité et des cas d’usage réels sans se dégrader.',
                                        'icon' => 'heroicon-o-rectangle-stack'
                                    ],
                                    [
                                        'title' => 'Code propre et maintenable',
                                        'description' => 'Des bases de code bien structurées, lisibles et faciles à faire évoluer et maintenir.',
                                        'icon' => 'heroicon-o-code-bracket'
                                    ],
                                    [
                                        'title' => 'Livraison fiable',
                                        'description' => 'Une exécution constante avec attention à la performance, aux cas limites et à la production.',
                                        'icon' => 'heroicon-o-check-circle'
                                    ],
                                ],
                            ],
                            'ar' => [
                                'title' => 'كيف أبني أنظمة موثوقة',
                                'description' => 'أركز على تقديم حلول موثوقة وقابلة للتوسع مع اهتمام كبير بالبنية الخلفية والأداء وتنفيذ منطق الأعمال المعقد بشكل نظيف.',
                                'items' => [
                                    [
                                        'title' => 'بنية قابلة للتوسع',
                                        'description' => 'أنظمة مصممة للتعامل مع النمو والتعقيد والاستخدام الواقعي دون مشاكل.',
                                        'icon' => 'heroicon-o-rectangle-stack'
                                    ],
                                    [
                                        'title' => 'كود نظيف وقابل للصيانة',
                                        'description' => 'كود منظم وسهل القراءة والتطوير والصيانة على المدى الطويل.',
                                        'icon' => 'heroicon-o-code-bracket'
                                    ],
                                    [
                                        'title' => 'تنفيذ موثوق',
                                        'description' => 'تنفيذ مستقر مع اهتمام بالأداء والحالات الخاصة وجاهزية الإنتاج.',
                                        'icon' => 'heroicon-o-check-circle'
                                    ],
                                ],
                            ],
                        ],
                    ],

                    [
                        'key' => 'work',
                        'label' => [
                            'en' => 'Featured Work',
                            'fr' => 'Projets en vedette',
                            'ar' => 'أبرز الأعمال',
                        ],
                        'data' => [
                            'en' => [
                                'title' => 'Check out my latest work',
                                'description' => 'Discover how I craft scalable and impactful digital systems.',
                            ],
                            'fr' => [
                                'title' => 'Découvrez mes derniers projets',
                                'description' => 'Découvrez comment je conçois des systèmes digitaux scalables et impactants.',
                            ],
                            'ar' => [
                                'title' => 'اطلع على أحدث أعمالي',
                                'description' => 'اكتشف كيف أبني أنظمة رقمية قوية وقابلة للتوسع.',
                            ],
                        ],
                    ],

                    [
                        'key' => 'companies',
                        'label' => [
                            'en' => 'Companies',
                            'fr' => 'Entreprises',
                            'ar' => 'الشركات',
                        ],
                        'data' => [
                            'en' => [
                                'title' => 'These are some',
                                'highlight' => 'companies',
                                'suffix' => 'I have worked with',
                            ],
                            'fr' => [
                                'title' => 'Voici quelques',
                                'highlight' => 'entreprises',
                                'suffix' => 'avec lesquelles j’ai travaillé',
                            ],
                            'ar' => [
                                'title' => 'هذه بعض',
                                'highlight' => 'الشركات',
                                'suffix' => 'التي عملت معها',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'key' => 'about',
                'name' => [
                    'en' => 'About Page',
                    'fr' => 'À propos',
                    'ar' => 'من أنا',
                ],
                'sections' => [
                    [
                        'key' => 'intro',
                        'label' => [
                            'en' => 'Intro',
                            'fr' => 'Introduction',
                            'ar' => 'مقدمة',
                        ],
                        'data' => [
                            'en' => [
                                'title' => 'Hi,',
                                'highlight' => " I'm Youcef",
                                'subtitle' => " and i'm a software engineer",
                                'paragraphs' => [
                                    'Based in Oran, Algeria, I focus on building scalable web platforms with a strong emphasis on backend architecture and real-world business logic. I work on complex systems such as e-commerce platforms, ERP solutions, and multi-tenant applications, designing APIs and infrastructures that are reliable, maintainable, and built to handle growth.',
                                    'My approach is centered around clean architecture, performance, and long-term maintainability. I prioritize building systems that are not only functional, but structured to evolve with business needs, ensuring clarity in code, efficiency in execution, and stability in production environments.',
                                ],
                                'signature' => 'Youcef Nezrek',
                            ],
                            'fr' => [
                                'title' => 'Bonjour,',
                                'highlight' => " je suis Youcef",
                                'subtitle' => " et je suis ingénieur logiciel",
                                'paragraphs' => [
                                    'Basé à Oran, en Algérie, je me spécialise dans la création de plateformes web évolutives avec un fort accent sur l’architecture backend et la logique métier réelle. Je travaille sur des systèmes complexes tels que des plateformes e-commerce, des solutions ERP et des applications multi-tenant, en concevant des APIs et des infrastructures fiables, maintenables et capables de supporter la croissance.',
                                    'Mon approche repose sur une architecture propre, la performance et la maintenabilité à long terme. Je privilégie la conception de systèmes non seulement fonctionnels, mais également structurés pour évoluer avec les besoins métier, garantissant clarté du code, efficacité d’exécution et stabilité en production.',
                                ],
                                'signature' => 'Youcef Nezrek',
                            ],
                            'ar' => [
                                'title' => 'مرحبًا،',
                                'highlight' => ' أنا يوسف',
                                'subtitle' => ' وأنا مهندس برمجيات',
                                'paragraphs' => [
                                    'أقيم في وهران، الجزائر، وأركز على بناء منصات ويب قابلة للتوسع مع اهتمام كبير بهندسة الأنظمة الخلفية ومنطق الأعمال الواقعي. أعمل على أنظمة معقدة مثل منصات التجارة الإلكترونية وحلول ERP والتطبيقات متعددة المستأجرين، حيث أقوم بتصميم واجهات API وبنى تحتية موثوقة وقابلة للصيانة ومصممة لدعم النمو.',
                                    'يعتمد أسلوبي على بنية نظيفة وأداء عالٍ وقابلية صيانة طويلة المدى. أحرص على بناء أنظمة ليست فقط وظيفية، بل مصممة لتتطور مع احتياجات العمل، مع ضمان وضوح الكود وكفاءة التنفيذ والاستقرار في بيئات الإنتاج.',
                                ],
                                'signature' => 'يوسف نزرق',
                            ],
                        ],
                    ],

                    [
                        'key' => 'career',
                        'label' => [
                            'en' => 'Career',
                            'fr' => 'Parcours',
                            'ar' => 'المسار المهني',
                        ],
                        'data' => [
                            'en' => [
                                'title' => 'My career journey so far',
                                'description' => 'My journey in web development started with a strong interest in building meaningful digital products and has evolved into designing and developing complex, scalable systems. I’ve worked on a wide range of applications, including e-commerce platforms, ERP solutions, and multi-tenant architectures, focusing on backend systems, APIs, and business-critical workflows. Each experience has strengthened my ability to deliver reliable, maintainable solutions that align with real-world operational needs.',
                                'cv_label' => 'Download CV',
                            ],
                            'fr' => [
                                'title' => 'Mon parcours jusqu’à aujourd’hui',
                                'description' => 'Mon parcours dans le développement web a commencé avec un fort intérêt pour la création de produits digitaux utiles, et a évolué vers la conception et le développement de systèmes complexes et scalables. J’ai travaillé sur une large gamme d’applications, notamment des plateformes e-commerce, des solutions ERP et des architectures multi-tenant, avec un focus sur les systèmes backend, les APIs et les workflows critiques. Chaque expérience a renforcé ma capacité à livrer des solutions fiables et maintenables, adaptées aux besoins opérationnels réels.',
                                'cv_label' => 'Télécharger le CV',
                            ],
                            'ar' => [
                                'title' => 'مسيرتي المهنية حتى الآن',
                                'description' => 'بدأت رحلتي في تطوير الويب بشغف قوي لبناء منتجات رقمية ذات قيمة، وتطورت لاحقًا إلى تصميم وتطوير أنظمة معقدة وقابلة للتوسع. عملت على مجموعة واسعة من التطبيقات، بما في ذلك منصات التجارة الإلكترونية وحلول ERP وهندسات متعددة المستأجرين، مع تركيز على الأنظمة الخلفية وواجهات API وسير العمل الحيوي للأعمال. كل تجربة ساهمت في تعزيز قدرتي على تقديم حلول موثوقة وقابلة للصيانة تتماشى مع احتياجات التشغيل الواقعية.',
                                'cv_label' => 'تحميل السيرة الذاتية',
                            ],
                        ],
                    ],

                    [
                        'key' => 'stack',
                        'label' => [
                            'en' => 'Stack',
                            'fr' => 'Stack',
                            'ar' => 'التقنيات',
                        ],
                        'data' => [
                            'en' => [
                                'title' => 'A stack built for reliability and scale',
                                'description' => 'I focus on a carefully chosen set of technologies that allow me to build fast, maintainable, and scalable systems. Instead of chasing trends, I prioritize tools that integrate well together and support clean architecture, efficient workflows, and long-term stability. This stack enables me to deliver robust applications, from complex backends to responsive user interfaces.',
                            ],
                            'fr' => [
                                'title' => 'Un stack conçu pour la fiabilité et la scalabilité',
                                'description' => 'Je me concentre sur un ensemble de technologies soigneusement sélectionnées qui me permettent de construire des systèmes rapides, maintenables et évolutifs. Plutôt que de suivre les tendances, je privilégie des outils qui s’intègrent efficacement entre eux et soutiennent une architecture propre, des workflows efficaces et une stabilité à long terme.',
                            ],
                            'ar' => [
                                'title' => 'تقنيات مبنية للموثوقية والتوسع',
                                'description' => 'أعتمد على مجموعة مختارة بعناية من التقنيات التي تمكنني من بناء أنظمة سريعة وقابلة للصيانة والتوسع. بدلًا من اتباع الاتجاهات، أركز على أدوات تتكامل بشكل جيد وتدعم بنية نظيفة وسير عمل فعال واستقرار طويل المدى.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'key' => 'contact',
                'name' => [
                    'en' => 'Contact Page',
                    'fr' => 'Contact',
                    'ar' => 'اتصل بي',
                ],
                'sections' => [
                    [
                        'key' => 'hero',
                        'label' => [
                            'en' => 'Hero',
                            'fr' => 'Bannière',
                            'ar' => 'الواجهة',
                        ],
                        'data' => [
                            'en' => [
                                'title' => 'How can I help you?',
                                'subtitle' => "Let's get in touch",
                                'reach_label' => 'You can reach me at the following',
                            ],
                            'fr' => [
                                'title' => 'Comment puis-je vous aider ?',
                                'subtitle' => 'Entrons en contact',
                                'reach_label' => 'Vous pouvez me contacter via',
                            ],
                            'ar' => [
                                'title' => 'كيف يمكنني مساعدتك؟',
                                'subtitle' => 'دعنا نتواصل',
                                'reach_label' => 'يمكنك التواصل معي عبر',
                            ],
                        ],
                    ],

                    [
                        'key' => 'contacts',
                        'label' => [
                            'en' => 'Contact Methods',
                            'fr' => 'Moyens de contact',
                            'ar' => 'طرق التواصل',
                        ],
                        'data' => [
                            'en' => [
                                'items' => [
                                    [
                                        'title' => 'Call me',
                                        'description' => 'Available weekdays 9AM–5PM',
                                        'value' => '+213 (658) 760-391',
                                        'icon' => 'heroicon-o-phone'
                                    ],
                                    [
                                        'title' => 'Email me',
                                        'description' => "I'll usually reply within an hour",
                                        'value' => 'ynezrek@gmail.com',
                                        'icon' => 'heroicon-o-at-symbol'
                                    ],
                                ],
                            ],
                            'fr' => [
                                'items' => [
                                    [
                                        'title' => 'Appelez-moi',
                                        'description' => 'Disponible en semaine de 9h à 17h',
                                        'value' => '+213 (658) 760-391',
                                        'icon' => 'heroicon-o-phone'
                                    ],
                                    [
                                        'title' => 'Envoyez-moi un email',
                                        'description' => "Je réponds généralement en moins d'une heure",
                                        'value' => 'ynezrek@gmail.com',
                                        'icon' => 'heroicon-o-at-symbol'
                                    ],
                                ],
                            ],
                            'ar' => [
                                'items' => [
                                    [
                                        'title' => 'اتصل بي',
                                        'description' => 'متوفر خلال أيام الأسبوع من 9 صباحًا إلى 5 مساءً',
                                        'value' => '+213 (658) 760-391',
                                        'icon' => 'heroicon-o-phone'
                                    ],
                                    [
                                        'title' => 'أرسل لي بريدًا إلكترونيًا',
                                        'description' => 'عادةً أرد خلال ساعة واحدة',
                                        'value' => 'ynezrek@gmail.com',
                                        'icon' => 'heroicon-o-at-symbol'
                                    ],
                                ],
                            ],
                        ],
                    ],

                    [
                        'key' => 'form',
                        'label' => [
                            'en' => 'Form Content',
                            'fr' => 'Formulaire',
                            'ar' => 'النموذج',
                        ],
                        'data' => [
                            'en' => [
                                'title' => 'Fill out the form below to get started',
                                'description' => 'Tell me a little about your project.',
                                'services' => ['Web development', 'Web design', 'Consulting', 'Other'],
                                'submit_label' => 'Get started',
                                'submitting_label' => 'Sending...',
                                'success_message' => 'Message sent successfully!',
                                'rate_limit_message' => 'Too many attempts. Try again later.',
                            ],
                            'fr' => [
                                'title' => 'Remplissez le formulaire ci-dessous pour commencer',
                                'description' => 'Parlez-moi un peu de votre projet.',
                                'services' => ['Développement web', 'Web design', 'Conseil', 'Autre'],
                                'submit_label' => 'Commencer',
                                'submitting_label' => 'Envoi en cours...',
                                'success_message' => 'Message envoyé avec succès !',
                                'rate_limit_message' => 'Trop de tentatives. Réessayez plus tard.',
                            ],
                            'ar' => [
                                'title' => 'املأ النموذج أدناه للبدء',
                                'description' => 'أخبرني المزيد عن مشروعك.',
                                'services' => ['تطوير ويب', 'تصميم ويب', 'استشارة', 'أخرى'],
                                'submit_label' => 'ابدأ الآن',
                                'submitting_label' => 'جاري الإرسال...',
                                'success_message' => 'تم إرسال الرسالة بنجاح!',
                                'rate_limit_message' => 'عدد محاولات كبير. حاول مرة أخرى لاحقًا.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
