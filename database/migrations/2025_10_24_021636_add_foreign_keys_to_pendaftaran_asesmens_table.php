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
        Schema::table('pendaftaran_asesmens', function (Blueprint $table) {
            $table->foreign(['biodata_asesi_id'])->references(['id'])->on('biodata_asesi')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['dokumen_asesi_id'])->references(['id'])->on('dokumen_asesi')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['jadwal_id'])->references(['id'])->on('jadwal_asesmens')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran_asesmens', function (Blueprint $table) {
            $table->dropForeign('pendaftaran_asesmens_biodata_asesi_id_foreign');
            $table->dropForeign('pendaftaran_asesmens_dokumen_asesi_id_foreign');
            $table->dropForeign('pendaftaran_asesmens_jadwal_id_foreign');
        });
    }
};
