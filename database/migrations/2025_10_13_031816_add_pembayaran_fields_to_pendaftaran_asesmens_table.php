<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pendaftaran_asesmens', function (Blueprint $table) {
            $table->decimal('jumlah_pembayaran', 12, 2)->nullable();
            $table->string('sumber_pendanaan')->nullable(); // mandiri, subsidi, dll
            $table->string('metode_pembayaran')->nullable(); // transfer/tunai
            $table->string('no_rekening')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable(); // path file upload
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_asesmens', function (Blueprint $table) {
            $table->dropColumn([
                'jumlah_pembayaran',
                'sumber_pendanaan',
                'metode_pembayaran',
                'no_rekening',
                'nama_rekening',
                'tanggal_pembayaran',
                'bukti_pembayaran',
            ]);
        });
    }
};
