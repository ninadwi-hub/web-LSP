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
        Schema::table('jadwal_asesmens', function (Blueprint $table) {
            $table->foreign(['skema_id'])->references(['id'])->on('skemas')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_asesmens', function (Blueprint $table) {
            $table->dropForeign('jadwal_asesmens_skema_id_foreign');
        });
    }
};
