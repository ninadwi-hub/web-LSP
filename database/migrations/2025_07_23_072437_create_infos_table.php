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


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
