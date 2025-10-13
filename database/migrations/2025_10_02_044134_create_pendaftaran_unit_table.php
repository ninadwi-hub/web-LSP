<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pendaftaran_unit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran_asesmens')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('unit_kompetensis')->onDelete('cascade');
            $table->boolean('dipilih')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pendaftaran_unit');
    }
};
