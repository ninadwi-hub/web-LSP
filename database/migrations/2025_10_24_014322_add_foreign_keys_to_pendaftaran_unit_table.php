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
        Schema::table('pendaftaran_unit', function (Blueprint $table) {
            $table->foreign(['pendaftaran_id'])->references(['id'])->on('pendaftaran_asesmens')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_kompetensis')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran_unit', function (Blueprint $table) {
            $table->dropForeign('pendaftaran_unit_pendaftaran_id_foreign');
            $table->dropForeign('pendaftaran_unit_unit_id_foreign');
        });
    }
};
