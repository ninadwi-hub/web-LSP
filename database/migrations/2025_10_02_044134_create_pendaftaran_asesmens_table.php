<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_asesmens', function (Blueprint $table) {
            $table->id();

            // Step 1-2 -> relasi biodata_asesi
            $table->unsignedBigInteger('biodata_asesi_id');
            $table->foreign('biodata_asesi_id')->references('id')->on('biodata_asesi')->onDelete('cascade');

            // Step 3 -> relasi dokumen_asesi
            $table->unsignedBigInteger('dokumen_asesi_id')->nullable();
            $table->foreign('dokumen_asesi_id')->references('id')->on('dokumen_asesi')->onDelete('set null');

             // Step 4 - Tujuan Asesmen
            $table->string('tujuan_asesmen')->nullable(); // misal: Sertifikasi, RPL, PKT, dll
            
            // Step 5 - Persyaratan Teknis
            $table->string('tuk')->nullable();            // tempat uji kompetensi
            $table->date('jadwal_uji')->nullable();       // tanggal uji
            $table->string('metode_uji')->nullable();     // metode: online/offline
            $table->text('keterangan_teknis')->nullable();// tambahan

            // Step 6 -> relasi unit_kompetensis (banyak unit bisa dipilih → buat pivot table)
            // di tabel ini cukup flag bahwa dia sudah mendaftar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_asesmens');
    }
};
