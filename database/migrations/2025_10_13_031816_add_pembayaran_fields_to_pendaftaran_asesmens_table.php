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
        Schema::table('pendaftaran_asesmens', function (Blueprint $table) {
            // Cek dan tambahkan kolom hanya jika belum ada
            if (!Schema::hasColumn('pendaftaran_asesmens', 'jumlah_pembayaran')) {
                $table->decimal('jumlah_pembayaran', 12, 2)->nullable();
            }

            if (!Schema::hasColumn('pendaftaran_asesmens', 'sumber_pendanaan')) {
                $table->string('sumber_pendanaan')->nullable();
            }

            if (!Schema::hasColumn('pendaftaran_asesmens', 'metode_pembayaran')) {
                $table->string('metode_pembayaran')->nullable();
            }

            if (!Schema::hasColumn('pendaftaran_asesmens', 'no_rekening')) {
                $table->string('no_rekening')->nullable();
            }

            if (!Schema::hasColumn('pendaftaran_asesmens', 'nama_rekening')) {
                $table->string('nama_rekening')->nullable();
            }

            if (!Schema::hasColumn('pendaftaran_asesmens', 'tanggal_pembayaran')) {
                $table->date('tanggal_pembayaran')->nullable();
            }

            if (!Schema::hasColumn('pendaftaran_asesmens', 'bukti_pembayaran')) {
                $table->string('bukti_pembayaran')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran_asesmens', function (Blueprint $table) {
            $columns = [
                'jumlah_pembayaran',
                'sumber_pendanaan',
                'metode_pembayaran',
                'no_rekening',
                'nama_rekening',
                'tanggal_pembayaran',
                'bukti_pembayaran'
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('pendaftaran_asesmens', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
