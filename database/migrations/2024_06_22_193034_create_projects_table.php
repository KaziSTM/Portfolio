<?php

use App\Enums\ProjectType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->id();

            $table->string('name')->unique();
            $table->string('slug')->unique();

            $table->json('header');
            $table->json('description');
            $table->json('details')->nullable();

            $table->string('link')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Dates
            |--------------------------------------------------------------------------
            */

            $table->date('start')->nullable();
            $table->date('end')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Flags
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_in_progress')->default(false);

            /*
            |--------------------------------------------------------------------------
            | Type (Enum-backed)
            |--------------------------------------------------------------------------
            */

            $table->string('type')
                ->default(ProjectType::PROJECT->value)
                ->index();

            /*
            |--------------------------------------------------------------------------
            | Relations
            |--------------------------------------------------------------------------
            */

            $table->foreignId('company_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Indexes
            |--------------------------------------------------------------------------
            */

            $table->index(['type', 'is_featured']);
            $table->index(['start', 'end']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
