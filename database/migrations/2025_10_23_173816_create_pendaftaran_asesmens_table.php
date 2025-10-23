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
        Schema::create('pendaftaran_asesmens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('biodata_asesi_id')->index('pendaftaran_asesmens_biodata_asesi_id_foreign');
            $table->unsignedBigInteger('dokumen_asesi_id')->nullable()->index('pendaftaran_asesmens_dokumen_asesi_id_foreign');
            $table->string('tujuan_asesmen')->nullable();
            $table->string('tuk')->nullable();
            $table->date('jadwal_uji')->nullable();
            $table->string('metode_uji')->nullable();
            $table->text('keterangan_teknis')->nullable();
            $table->enum('status_administrasi', ['Belum', 'Proses', 'Selesai'])->default('Belum');
            $table->timestamps();
            $table->decimal('jumlah_pembayaran', 12)->nullable();
            $table->string('sumber_pendanaan')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('rekomendasi')->nullable();
            $table->text('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_asesmens');
    }
};
