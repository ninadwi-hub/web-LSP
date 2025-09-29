<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('galleries')) {
            Schema::create('galleries', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->index();
                $table->text('description')->nullable();
                $table->string('image_path');
                $table->unsignedBigInteger('category_id')->nullable();
                $table->unsignedBigInteger('album_id')->nullable();
                $table->string('uploader', 100)->nullable();
                $table->enum('status', ['draft', 'published', 'archived']);
                $table->date('taken_at')->nullable();
                $table->boolean('is_featured')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('galeris')) {
            Schema::dropIfExists('galeris');
        }
    }
};
