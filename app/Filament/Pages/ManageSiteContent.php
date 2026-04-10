<?php

namespace App\Filament\Pages;

use App\Models\CmsPage;
use App\Models\CmsSection;
use App\Support\Cms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\DB;

class ManageSiteContent extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $title = 'Site Content';
    public ?array $data = [];
    protected string $view = 'filament.pages.manage-site-content';

    public function mount(): void
    {
        $this->form->fill($this->loadContent());
    }

    protected function loadContent(): array
    {
        $content = [];

        foreach ($this->pageDefinitions() as $pageKey => $pageDefinition) {
            foreach ($pageDefinition['sections'] as $sectionDefinition) {
                foreach ($this->locales() as $locale) {
                    $sectionData = Cms::page($pageKey)?->section($sectionDefinition['key'])?->dataFor($locale)
                        ?? $sectionDefinition['default'];

                    if ($pageKey === 'about' && $sectionDefinition['key'] === 'intro') {
                        $sectionData['paragraphs_text'] = implode("\n\n", $sectionData['paragraphs'] ?? []);
                    }

                    $content[$pageKey][$sectionDefinition['key']][$locale] = $sectionData;
                }
            }
        }

        return $content;
    }

    protected function pageDefinitions(): array
    {
        return [
            'global' => [
                'name' => 'Global Content',
                'sections' => [
                    ['key' => 'header', 'label' => 'Header CTA', 'default' => ['cta_label' => 'Book a call']],
                    ['key' => 'footer', 'label' => 'Footer CTA', 'default' => ['title' => 'Lets make something great together', 'description' => 'I’m always excited to collaborate on innovative projects or discuss potential opportunities. Feel free to reach out!', 'button_label' => 'Book a call', 'copyright' => '© 2024, All Rights Reserved']],
                    ['key' => 'socials', 'label' => 'Social Links', 'default' => ['items' => [['name' => 'Github', 'link' => 'https://github.com/KaziSTM', 'icon' => 'github-logo'], ['name' => 'Linkedin', 'link' => 'https://linkedin.com/in/youcef-nezrek-7685a61a6', 'icon' => 'linkedin-logo'], ['name' => 'Instagram', 'link' => 'https://www.instagram.com/that_mofo_kaz/', 'icon' => 'instagram-logo']]]],
                ],
            ],
            'home' => [
                'name' => 'Home Page',
                'sections' => [
                    ['key' => 'hero', 'label' => 'Hero', 'default' => ['kicker' => 'Helping businesses', 'title' => 'build scalable digital products', 'description' => 'Full-stack web developer focused on building scalable platforms and complex digital products. I specialize in backend architecture, APIs, and designing systems that handle real-world business logic efficiently.', 'cta_label' => 'Book a call with me']],
                    ['key' => 'features', 'label' => 'Features', 'default' => ['title' => 'How I build reliable systems', 'description' => 'I focus on delivering reliable, scalable solutions with a strong emphasis on backend architecture, performance, and clean implementation of complex business logic.', 'items' => [['title' => 'Scalable Architecture', 'description' => 'Systems designed to handle growth, complexity, and real-world usage without breaking down.', 'icon' => 'heroicon-o-rectangle-stack'], ['title' => 'Clean & Maintainable Code', 'description' => 'Well-structured, readable codebases that are easy to extend, debug, and maintain over time.', 'icon' => 'heroicon-o-code-bracket'], ['title' => 'Reliable Delivery', 'description' => 'Consistent execution with attention to performance, edge cases, and production readiness.', 'icon' => 'heroicon-o-check-circle']]]],
                    ['key' => 'work', 'label' => 'Featured Work', 'default' => ['title' => 'Check out my latest work', 'description' => 'Discover how I craft scalable and impactful digital systems.']],
                    ['key' => 'companies', 'label' => 'Companies', 'default' => ['title' => 'These are some', 'highlight' => 'companies', 'suffix' => 'I have worked with']],
                ],
            ],
            'about' => [
                'name' => 'About Page',
                'sections' => [
                    ['key' => 'intro', 'label' => 'Intro', 'default' => ['title' => 'Hi,', 'highlight' => " I'm Youcef", 'subtitle' => " and i'm a software engineer", 'paragraphs' => ['Based in Oran, Algeria, I focus on building scalable web platforms with a strong emphasis on backend architecture and real-world business logic. I work on complex systems such as e-commerce platforms, ERP solutions, and multi-tenant applications, designing APIs and infrastructures that are reliable, maintainable, and built to handle growth.', 'My approach is centered around clean architecture, performance, and long-term maintainability. I prioritize building systems that are not only functional, but structured to evolve with business needs, ensuring clarity in code, efficiency in execution, and stability in production environments.'], 'signature' => 'Youcef Nezrek']],
                    ['key' => 'career', 'label' => 'Career', 'default' => ['title' => 'My career journey so far', 'description' => 'My journey in web development started with a strong interest in building meaningful digital products and has evolved into designing and developing complex, scalable systems. I’ve worked on a wide range of applications, including e-commerce platforms, ERP solutions, and multi-tenant architectures, focusing on backend systems, APIs, and business-critical workflows. Each experience has strengthened my ability to deliver reliable, maintainable solutions that align with real-world operational needs.', 'cv_label' => 'Download CV']],
                    ['key' => 'stack', 'label' => 'Stack', 'default' => ['title' => 'A stack built for reliability and scale', 'description' => 'I focus on a carefully chosen set of technologies that allow me to build fast, maintainable, and scalable systems. Instead of chasing trends, I prioritize tools that integrate well together and support clean architecture, efficient workflows, and long-term stability. This stack enables me to deliver robust applications, from complex backends to responsive user interfaces.']],
                ],
            ],
            'contact' => [
                'name' => 'Contact Page',
                'sections' => [
                    ['key' => 'hero', 'label' => 'Hero', 'default' => ['title' => 'How can I help you?', 'subtitle' => "Let's get in touch", 'reach_label' => 'You can reach me at the following']],
                    ['key' => 'contacts', 'label' => 'Contact Methods', 'default' => ['items' => [['title' => 'Call me', 'description' => 'Available weekdays 9AM–5PM', 'value' => '+213 (658) 760-391', 'icon' => 'heroicon-o-phone'], ['title' => 'Email me', 'description' => "I'll usually reply within an hour", 'value' => 'ynezrek@gmail.com', 'icon' => 'heroicon-o-at-symbol']]]],
                    ['key' => 'form', 'label' => 'Form Content', 'default' => ['title' => 'Fill out the form below to get started', 'description' => 'Tell me a little about your project.', 'services' => ['Web development', 'Web design', 'Consulting', 'Other'], 'submit_label' => 'Get started', 'submitting_label' => 'Sending...', 'success_message' => 'Message sent successfully!', 'rate_limit_message' => 'Too many attempts. Try again later.']],
                ],
            ],
        ];
    }

    protected function locales(): array
    {
        return config('app.supported_locales', ['en']);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Tabs::make('Pages')
                    ->tabs([
                        Tab::make('Global')->schema([
                            Section::make('Header CTA')->schema([
                                $this->localeTabs('global.header', fn(string $locale): array => [
                                    TextInput::make("global.header.{$locale}.cta_label")->required(),
                                ]),
                            ]),
                            Section::make('Footer')->schema([
                                $this->localeTabs('global.footer', fn(string $locale): array => [
                                    TextInput::make("global.footer.{$locale}.title")->required(),
                                    Textarea::make("global.footer.{$locale}.description")->rows(4)->required(),
                                    TextInput::make("global.footer.{$locale}.button_label")->required(),
                                    TextInput::make("global.footer.{$locale}.copyright")->required(),
                                ]),
                            ]),
                            Section::make('Social Links')->schema([
                                $this->localeTabs('global.socials', fn(string $locale): array => [
                                    Repeater::make("global.socials.{$locale}.items")
                                        ->schema([
                                            TextInput::make('name')->required(),
                                            TextInput::make('link')->url()->required(),
                                            TextInput::make('icon')->required(),
                                        ])
                                        ->defaultItems(0)
                                        ->columns(3),
                                ]),
                            ]),
                        ]),
                        Tab::make('Home')->schema([
                            Section::make('Hero')->schema([
                                $this->localeTabs('home.hero', fn(string $locale): array => [
                                    TextInput::make("home.hero.{$locale}.intro")->required(),
                                    TextInput::make("home.hero.{$locale}.kicker")->required(),
                                    TextInput::make("home.hero.{$locale}.title")->required(),
                                    Textarea::make("home.hero.{$locale}.description")->rows(4)->required(),
                                    TextInput::make("home.hero.{$locale}.cta_label")->required(),
                                ]),
                            ]),
                            Section::make('Features')->schema([
                                $this->localeTabs('home.features', fn(string $locale): array => [
                                    TextInput::make("home.features.{$locale}.title")->required(),
                                    Textarea::make("home.features.{$locale}.description")->rows(4)->required(),
                                    Repeater::make("home.features.{$locale}.items")
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            Textarea::make('description')->rows(3)->required(),
                                            TextInput::make('icon')->required(),
                                        ])
                                        ->defaultItems(0)
                                        ->columns(3),
                                ]),
                            ]),
                            Section::make('Featured Work')->schema([
                                $this->localeTabs('home.work', fn(string $locale): array => [
                                    TextInput::make("home.work.{$locale}.title")->required(),
                                    Textarea::make("home.work.{$locale}.description")->rows(3)->required(),
                                ]),
                            ]),
                            Section::make('Companies')->schema([
                                $this->localeTabs('home.companies', fn(string $locale): array => [
                                    TextInput::make("home.companies.{$locale}.title")->required(),
                                    TextInput::make("home.companies.{$locale}.highlight")->required(),
                                    TextInput::make("home.companies.{$locale}.suffix")->required(),
                                ]),
                            ]),
                        ]),
                        Tab::make('About')->schema([
                            Section::make('Intro')->schema([
                                $this->localeTabs('about.intro', fn(string $locale): array => [
                                    TextInput::make("about.intro.{$locale}.title")->required(),
                                    TextInput::make("about.intro.{$locale}.highlight")->required(),
                                    TextInput::make("about.intro.{$locale}.subtitle")->required(),
                                    Textarea::make("about.intro.{$locale}.paragraphs_text")->rows(8)->required(),
                                    TextInput::make("about.intro.{$locale}.signature")->required(),
                                ]),
                            ]),
                            Section::make('Career')->schema([
                                $this->localeTabs('about.career', fn(string $locale): array => [
                                    TextInput::make("about.career.{$locale}.title")->required(),
                                    Textarea::make("about.career.{$locale}.description")->rows(6)->required(),
                                    TextInput::make("about.career.{$locale}.cv_label")->required(),
                                ]),
                            ]),
                            Section::make('Stack')->schema([
                                $this->localeTabs('about.stack', fn(string $locale): array => [
                                    TextInput::make("about.stack.{$locale}.title")->required(),
                                    Textarea::make("about.stack.{$locale}.description")->rows(5)->required(),
                                ]),
                            ]),
                        ]),
                        Tab::make('Contact')->schema([
                            Section::make('Hero')->schema([
                                $this->localeTabs('contact.hero', fn(string $locale): array => [
                                    TextInput::make("contact.hero.{$locale}.title")->required(),
                                    TextInput::make("contact.hero.{$locale}.subtitle")->required(),
                                    TextInput::make("contact.hero.{$locale}.reach_label")->required(),
                                ]),
                            ]),
                            Section::make('Contacts')->schema([
                                $this->localeTabs('contact.contacts', fn(string $locale): array => [
                                    Repeater::make("contact.contacts.{$locale}.items")
                                        ->schema([
                                            TextInput::make('title')->required(),
                                            TextInput::make('description')->required(),
                                            TextInput::make('value')->required(),
                                            TextInput::make('icon')->required(),
                                        ])
                                        ->defaultItems(0)
                                        ->columns(4),
                                ]),
                            ]),
                            Section::make('Form Content')->schema([
                                $this->localeTabs('contact.form', fn(string $locale): array => [
                                    TextInput::make("contact.form.{$locale}.title")->required(),
                                    Textarea::make("contact.form.{$locale}.description")->rows(3)->required(),
                                    TagsInput::make("contact.form.{$locale}.services"),
                                    TextInput::make("contact.form.{$locale}.submit_label")->required(),
                                    TextInput::make("contact.form.{$locale}.submitting_label")->required(),
                                    TextInput::make("contact.form.{$locale}.success_message")->required(),
                                    TextInput::make("contact.form.{$locale}.rate_limit_message")->required(),
                                ]),
                            ]),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    protected function localeTabs(string $key, callable $schemaFactory): Tabs
    {
        return Tabs::make($key)
            ->tabs(
                collect($this->locales())
                    ->map(fn(string $locale): Tab => Tab::make(strtoupper($locale))
                        ->schema($schemaFactory($locale)))
                    ->all(),
            )
            ->contained(false);
    }

    public function save(): void
    {
        DB::transaction(function (): void {
            foreach ($this->pageDefinitions() as $pageKey => $pageDefinition) {
                $page = CmsPage::query()->firstOrCreate(
                    ['key' => $pageKey],
                    [
                        'name' => $this->blankTranslations($pageDefinition['name']),
                        'meta_title' => $this->blankTranslations($pageDefinition['name']),
                        'meta_description' => $this->blankTranslations(''),
                    ],
                );

                foreach ($pageDefinition['sections'] as $position => $sectionDefinition) {
                    $translations = [];

                    foreach ($this->locales() as $locale) {
                        $payload = data_get($this->data, "{$pageKey}.{$sectionDefinition['key']}.{$locale}", []);
                        $translations[$locale] = $this->normalizeSectionData($pageKey, $sectionDefinition['key'], $payload);
                    }

                    CmsSection::query()->updateOrCreate(
                        [
                            'cms_page_id' => $page->id,
                            'key' => $sectionDefinition['key'],
                        ],
                        [
                            'label' => $sectionDefinition['label'],
                            'position' => $position + 1,
                            'data' => $translations,
                        ],
                    );
                }
            }
        });

        Notification::make()
            ->title('Site content saved')
            ->success()
            ->send();
    }

    protected function blankTranslations(string $value): array
    {
        return collect($this->locales())
            ->mapWithKeys(fn(string $locale): array => [$locale => $value])
            ->all();
    }

    protected function normalizeSectionData(string $pageKey, string $sectionKey, array $payload): array
    {
        if ($pageKey === 'about' && $sectionKey === 'intro') {
            $payload['paragraphs'] = $this->splitParagraphs($payload['paragraphs_text'] ?? '');
            unset($payload['paragraphs_text']);
        }

        return $payload;
    }

    protected function splitParagraphs(string $text): array
    {
        return collect(preg_split("/\n{2,}/", trim($text)) ?: [])
            ->map(fn(string $paragraph): string => trim($paragraph))
            ->filter()
            ->values()
            ->all();
    }
}
