<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table): void {
            $table->dropUnique('companies_name_unique');
            $table->string('slug')->nullable()->after('id');
            $table->text('name')->nullable()->change();
            $table->text('headquarter')->nullable()->change();
            $table->text('industry')->nullable()->change();
        });

        Schema::table('projects', function (Blueprint $table): void {
            $table->dropUnique('projects_name_unique');
            $table->text('name')->nullable()->change();
            $table->text('header')->nullable()->change();
        });

        Schema::table('careers', function (Blueprint $table): void {
            $table->text('duration')->nullable()->change();
            $table->unsignedSmallInteger('position')->default(0)->after('company_id');
        });

        Schema::table('testimonials', function (Blueprint $table): void {
            $table->text('author_role')->nullable()->change();
        });

        $this->migrateCompanies();
        $this->migrateProjects();
        $this->migrateCareers();
        $this->migrateTestimonials();

        Schema::table('companies', function (Blueprint $table): void {
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        $this->restoreCompanies();
        $this->restoreProjects();
        $this->restoreCareers();
        $this->restoreTestimonials();

        Schema::table('companies', function (Blueprint $table): void {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
            $table->string('name')->change();
            $table->string('headquarter')->nullable()->change();
            $table->string('industry')->nullable()->change();
            $table->unique('name');
        });

        Schema::table('projects', function (Blueprint $table): void {
            $table->string('name')->change();
            $table->string('header')->change();
            $table->unique('name');
        });

        Schema::table('careers', function (Blueprint $table): void {
            $table->string('duration')->change();
            $table->dropColumn('position');
        });

        Schema::table('testimonials', function (Blueprint $table): void {
            $table->string('author_role')->nullable()->change();
        });
    }

    protected function migrateCompanies(): void
    {
        foreach (DB::table('companies')->orderBy('id')->get() as $company) {
            $name = $this->decodeValue($company->name);

            DB::table('companies')
                ->where('id', $company->id)
                ->update([
                    'slug' => $company->slug ?: Str::slug($name ?: 'company-' . $company->id),
                    'name' => $this->encodeTranslations($name),
                    'headquarter' => $this->encodeTranslations($this->decodeValue($company->headquarter)),
                    'industry' => $this->encodeTranslations($this->decodeValue($company->industry)),
                ]);
        }
    }

    protected function migrateProjects(): void
    {
        foreach (DB::table('projects')->orderBy('id')->get() as $project) {
            DB::table('projects')
                ->where('id', $project->id)
                ->update([
                    'name' => $this->encodeTranslations($this->decodeValue($project->name)),
                    'header' => $this->encodeTranslations($this->decodeValue($project->header)),
                    'description' => $this->encodeTranslations($this->decodeValue($project->description)),
                    'details' => $this->encodeTranslations($this->decodeValue($project->details)),
                ]);
        }
    }

    protected function migrateCareers(): void
    {
        foreach (DB::table('careers')->orderBy('id')->get() as $index => $career) {
            DB::table('careers')
                ->where('id', $career->id)
                ->update([
                    'duration' => $this->encodeTranslations($this->decodeValue($career->duration)),
                    'description' => $this->encodeTranslations($this->decodeValue($career->description)),
                    'position' => $index + 1,
                ]);
        }
    }

    protected function migrateTestimonials(): void
    {
        foreach (DB::table('testimonials')->orderBy('id')->get() as $testimonial) {
            DB::table('testimonials')
                ->where('id', $testimonial->id)
                ->update([
                    'author_role' => $this->encodeTranslations($this->decodeValue($testimonial->author_role)),
                    'content' => $this->encodeTranslations($this->decodeValue($testimonial->content)),
                ]);
        }
    }

    protected function restoreCompanies(): void
    {
        foreach (DB::table('companies')->orderBy('id')->get() as $company) {
            DB::table('companies')
                ->where('id', $company->id)
                ->update([
                    'name' => $this->decodeValue($company->name),
                    'headquarter' => $this->decodeValue($company->headquarter),
                    'industry' => $this->decodeValue($company->industry),
                ]);
        }
    }

    protected function restoreProjects(): void
    {
        foreach (DB::table('projects')->orderBy('id')->get() as $project) {
            DB::table('projects')
                ->where('id', $project->id)
                ->update([
                    'name' => $this->decodeValue($project->name),
                    'header' => $this->decodeValue($project->header),
                    'description' => $this->decodeValue($project->description),
                    'details' => $this->decodeValue($project->details),
                ]);
        }
    }

    protected function restoreCareers(): void
    {
        foreach (DB::table('careers')->orderBy('id')->get() as $career) {
            DB::table('careers')
                ->where('id', $career->id)
                ->update([
                    'duration' => $this->decodeValue($career->duration),
                    'description' => $this->decodeValue($career->description),
                ]);
        }
    }

    protected function restoreTestimonials(): void
    {
        foreach (DB::table('testimonials')->orderBy('id')->get() as $testimonial) {
            DB::table('testimonials')
                ->where('id', $testimonial->id)
                ->update([
                    'author_role' => $this->decodeValue($testimonial->author_role),
                    'content' => $this->decodeValue($testimonial->content),
                ]);
        }
    }

    protected function encodeTranslations(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $translations = collect(config('app.supported_locales', ['en']))
            ->mapWithKeys(fn (string $locale): array => [$locale => $value])
            ->all();

        return json_encode($translations, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    protected function decodeValue(mixed $value): mixed
    {
        if ($value === null || $value === '') {
            return $value;
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $decoded['en']
                    ?? $decoded[config('app.fallback_locale', 'en')]
                    ?? reset($decoded)
                    ?? null;
            }
        }

        return $value;
    }
};
