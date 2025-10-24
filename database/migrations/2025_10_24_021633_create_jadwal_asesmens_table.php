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
        Schema::create('jadwal_asesmens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_sk');
            $table->date('tgl_terbit_sk');
            $table->date('tanggal_asesmen');
            $table->unsignedBigInteger('skema_id')->index('jadwal_asesmens_skema_id_foreign');
            $table->enum('tipe', ['Nirkertas', 'SJJ'])->default('Nirkertas');
            $table->decimal('harga', 12, 0)->default(0);
            $table->integer('kuota')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_asesmens');
    }
};
