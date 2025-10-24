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
        Schema::create('asesor_kompetensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_registrasi')->unique();
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('hp')->nullable();
            $table->date('tgl_expired')->nullable();
            $table->string('username')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesor_kompetensis');
    }
};
