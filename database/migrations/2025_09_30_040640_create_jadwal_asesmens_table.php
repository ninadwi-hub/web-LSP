<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_asesmens', function (Blueprint $table) {
            $table->id();
            $table->string('no_sk');
            $table->date('tgl_terbit_sk');
            $table->date('tanggal_asesmen');
            $table->foreignId('skema_id')->constrained('skemas')->onDelete('cascade');
            $table->enum('tipe', ['Nirkertas', 'SJJ'])->default('Nirkertas');
            $table->decimal('harga', 12, 0)->default(0);
            $table->integer('kuota')->default(0);
            $table->timestamps();
        });

        Schema::create('jadwal_asesor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwal_asesmens')->onDelete('cascade');
            $table->foreignId('asesor_id')->constrained('users')->onDelete('cascade');
            $table->enum('role', ['uji', 'validator']);
            $table->boolean('is_lead')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_asesor');
        Schema::dropIfExists('jadwal_asesmens');
    }
};