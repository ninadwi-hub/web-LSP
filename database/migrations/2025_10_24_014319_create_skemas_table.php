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
        Schema::create('skemas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->index();
            $table->string('nama');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('jenis')->nullable();
            $table->string('kategori')->default('Okupasi');
            $table->string('level')->nullable();
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->string('pdf_path')->nullable();
            $table->text('ringkasan')->nullable();
            $table->string('file_skema')->nullable();
            $table->timestamps();
            $table->integer('kuota')->default(0);
            $table->string('status')->default('aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skemas');
    }
};
