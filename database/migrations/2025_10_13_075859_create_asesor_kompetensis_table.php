<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asesor_kompetensis', function (Blueprint $table) {
            $table->id(); // ID auto increment
            $table->string('no_registrasi')->unique(); // Nomor registrasi unik
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('hp')->nullable();
            $table->date('tgl_expired')->nullable();
            $table->string('username')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asesor_kompetensis');
    }
};
