<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unit_kompetensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skema_id')->constrained('skemas')->onDelete('cascade');
            $table->string('kode_unit')->nullable(); // Sesuai seeder
            $table->string('judul_unit'); // Sesuai seeder
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unit_kompetensis');
    }
};
    