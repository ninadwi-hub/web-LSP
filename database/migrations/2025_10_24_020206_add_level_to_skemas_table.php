<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom level ke tabel skemas
     */
    public function up(): void
    {
        Schema::table('skemas', function (Blueprint $table) {
            if (!Schema::hasColumn('skemas', 'level')) {
                $table->string('level')->nullable()->after('kategori');
            }
        });
    }

    /**
     * Hapus kolom level jika di-rollback
     */
    public function down(): void
    {
        Schema::table('skemas', function (Blueprint $table) {
            if (Schema::hasColumn('skemas', 'level')) {
                $table->dropColumn('level');
            }
        });
    }
};
