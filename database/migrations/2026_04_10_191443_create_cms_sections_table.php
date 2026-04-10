<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cms_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cms_page_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('key');
            $table->json('label');
            $table->unsignedSmallInteger('position')->default(0);
            $table->json('data')->nullable();
            $table->timestamps();

            $table->unique(['cms_page_id', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_sections');
    }
};
