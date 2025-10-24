<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran_asesmens', function (Blueprint $table) {
            // Tambahkan kolom jadwal_id
            $table->unsignedBigInteger('jadwal_id')->nullable()->after('dokumen_asesi_id');

            // Kalau ingin pakai relasi foreign key
            $table->foreign('jadwal_id')->references('id')->on('jadwal_asesmens')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_asesmens', function (Blueprint $table) {
            $table->dropForeign(['jadwal_id']);
            $table->dropColumn('jadwal_id');
        });
    }
};
