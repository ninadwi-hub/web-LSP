<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('pages')) {
            Schema::create('pages', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->text('content');
                $table->enum('status', ['draft', 'published'])->default('draft');
                $table->string('category')->nullable(); // profil, sertifikasi, media, informasi
                $table->boolean('is_featured')->default(false);
                $table->string('featured_image')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('pages')) {
            Schema::dropIfExists('pages');
        }
    }
};
