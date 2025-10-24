<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran_unit', function (Blueprint $table) {
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

    public function down(): void
    {
        Schema::table('pendaftaran_unit', function (Blueprint $table) {
            $table->dropColumn([
                'observasi',
                'portofolio',
                'wawancara',
                'pertanyaan_lisan',
                'pertanyaan_tertulis',
                'tes_praktik',
                'projek_kerja',
                'lainnya',
            ]);
        });
    }
};
