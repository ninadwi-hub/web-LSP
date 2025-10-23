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
        Schema::create('unit_kompetensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('skema_id')->index('unit_kompetensis_skema_id_foreign');
            $table->string('kode_unit')->nullable();
            $table->string('judul_unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_kompetensis');
    }
};
