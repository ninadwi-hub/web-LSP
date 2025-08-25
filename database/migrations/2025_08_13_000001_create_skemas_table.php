<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('skemas', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->index();              // SKM-LSPTKI-05-2022
            $table->string('nama');                       // Instruktur Master
            $table->string('kategori')->default('Okupasi');
            $table->string('slug')->unique();             // instruktur-master
            $table->string('thumbnail')->nullable();      // path storage
            $table->string('pdf_path')->nullable();       // path PDF
            $table->text('ringkasan')->nullable();        // deskripsi singkat
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('skemas');
    }
};
