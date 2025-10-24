<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumen_portofolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skema_id')->constrained('skemas')->onDelete('cascade');
            $table->foreignId('unit_kompetensi_id')->constrained('unit_kompetensis')->onDelete('cascade');
            $table->text('dokumen_portofolio');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen_portofolios');
    }
};
