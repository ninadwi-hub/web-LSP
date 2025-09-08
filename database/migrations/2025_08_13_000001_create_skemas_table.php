<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('skemas')) {
            Schema::create('skemas', function (Blueprint $table) {
                $table->id();
                $table->string('kode')->index();
                $table->string('nama');
                $table->string('kategori')->default('Okupasi');
                $table->string('slug')->unique();
                $table->string('thumbnail')->nullable();
                $table->string('pdf_path')->nullable();
                $table->text('ringkasan')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void {
        Schema::dropIfExists('skemas');
    }
};
