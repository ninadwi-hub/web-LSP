<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
       Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->foreignId('category_id')->nullable()->constrained('gallery_categories')->nullOnDelete();
            $table->foreignId('album_id')->nullable()->constrained('albums')->nullOnDelete();
            $table->string('uploader', 100)->nullable();
            $table->enum('status', ['draft', 'published', 'archived']);
            $table->date('taken_at')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('galeri');
    }
};

