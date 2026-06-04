# Youcef Nezrek Portfolio

A multilingual portfolio and digital presence platform built with Laravel, Vue.js, Inertia.js, Filament, and Tailwind
CSS.

This project serves as both a personal portfolio and a content-managed website, showcasing professional experience,
selected projects, testimonials, services, and contact information through a modern and maintainable architecture.

## Features

* 🌍 Multilingual support (English, French, Arabic)
* ↔️ RTL support for Arabic
* 📝 CMS-driven content management
* 🎨 Responsive UI built with Vue.js and Tailwind CSS
* ⚡ Inertia.js powered SPA experience
* 🖼️ Media management with Spatie Media Library
* 🌐 Dynamic frontend translations
* 💬 Testimonial management
* 📬 Contact form with validation and rate limiting
* 🔒 Modern Laravel architecture with Actions and DTOs
* 🛠️ Filament-powered administration panel

## Tech Stack

### Backend

* PHP 8.4
* Laravel 13
* Filament 5
* Inertia Laravel
* Spatie Media Library
* Spatie Translatable
* Laravel Phone

### Frontend

* Vue 3
* Inertia.js
* Tailwind CSS
* Ziggy

### Development Tools

* Laravel Pint
* Pest
* Laradumps
* Laravel Sail

## Architecture

The application follows a Laravel-first architecture:

* Controllers remain thin and focus on orchestration.
* Business logic is encapsulated inside Actions.
* Data transfer between layers is handled using DTOs.
* Content is managed through CMS sections.
* Vue components are organized into reusable UI building blocks.
* Frontend translations are centralized and shared through Inertia.

## Content Management

Most website sections are fully CMS-driven, including:

* Homepage Hero
* Features Section
* Companies Section
* Work Showcase
* About Introduction
* Career Timeline
* Technology Stack
* Testimonials
* Contact Page
* Footer Content

This allows content updates without modifying application code.

## Installation

Clone the repository:

```bash
git clone https://github.com/kazistm/portfolio.git
cd portfolio
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your database and mail settings.

Run migrations and seeders:

```bash
php artisan migrate --seed
```

Start the development server:

```bash
php artisan serve
```

Start Vite:

```bash
npm run dev
```

## Testing

Run the test suite:

```bash
php artisan test
```

## Code Style

Format code using Laravel Pint:

```bash
vendor/bin/pint
```

## Deployment

Build frontend assets:

```bash
npm run build
```

Optimize Laravel:

```bash
php artisan optimize
```

Create storage symlink:

```bash
php artisan storage:link
```

## Author

**Youcef Nezrek**

Full-Stack Software Engineer specializing in Laravel, Vue.js, Inertia.js, Filament, and scalable web applications.

* Website: https://itsyoucef.com
* GitHub: https://github.com/kazistm

## License

This project is licensed under the MIT License.
