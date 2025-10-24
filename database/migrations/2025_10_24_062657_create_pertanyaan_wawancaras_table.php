<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanWawancarasTable extends Migration
{
    public function up()
    {
        Schema::create('pertanyaan_wawancaras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skema_id'); // relasi ke tabel skemas
            $table->unsignedBigInteger('unit_kompetensi_id'); // relasi ke unit_kompetensis
            $table->text('pertanyaan'); // isi pertanyaan wawancara
            $table->timestamps();

            // relasi (foreign key)
            $table->foreign('skema_id')->references('id')->on('skemas')->onDelete('cascade');
            $table->foreign('unit_kompetensi_id')->references('id')->on('unit_kompetensis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pertanyaan_wawancaras');
    }
}

