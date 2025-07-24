<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('galeris', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
