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
        Schema::create('pendaftaran_unit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pendaftaran_id')->index('pendaftaran_unit_pendaftaran_id_foreign');
            $table->unsignedBigInteger('unit_id')->index('pendaftaran_unit_unit_id_foreign');
            $table->boolean('dipilih')->default(false);
            $table->timestamps();
            $table->boolean('observasi')->default(false);
            $table->boolean('portofolio')->default(false);
            $table->boolean('wawancara')->default(false);
            $table->boolean('pertanyaan_lisan')->default(false);
            $table->boolean('pertanyaan_tertulis')->default(false);
            $table->boolean('tes_praktik')->default(false);
            $table->boolean('projek_kerja')->default(false);
            $table->boolean('lainnya')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_unit');
    }
};
