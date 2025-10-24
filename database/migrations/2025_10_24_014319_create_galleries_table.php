<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->index();
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('album_id')->nullable();
            $table->string('uploader', 100)->nullable();
            $table->enum('status', ['draft', 'published', 'archived']);
            $table->enum('tipe_tampilan', ['slider', 'gallery', 'both'])->default('gallery');
            $table->date('taken_at')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
