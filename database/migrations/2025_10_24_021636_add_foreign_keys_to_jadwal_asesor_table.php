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
        Schema::table('jadwal_asesor', function (Blueprint $table) {
            $table->foreign(['asesor_id'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['jadwal_id'])->references(['id'])->on('jadwal_asesmens')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_asesor', function (Blueprint $table) {
            $table->dropForeign('jadwal_asesor_asesor_id_foreign');
            $table->dropForeign('jadwal_asesor_jadwal_id_foreign');
        });
    }
};
