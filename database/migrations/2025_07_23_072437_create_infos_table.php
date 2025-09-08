<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('infos')) {
            Schema::create('infos', function (Blueprint $table) {
                $table->id();
                $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
                $table->foreignId('page_id')->nullable()->constrained('pages')->onDelete('set null');
                $table->string('title');
                $table->text('content')->nullable();
                $table->enum('status', ['published', 'draft'])->default('draft');
                $table->string('slug')->unique();
                $table->string('thumbnail')->nullable();
                $table->boolean('is_active')->default(1);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('infos')) {
            Schema::dropIfExists('infos');
        }
    }
};
