<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biodata_asesi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // relasi ke users

            // Data Pribadi
            $table->string('no_hp')->nullable();
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan'])->nullable();
            $table->string('kewarganegaraan', 50)->nullable();
            $table->string('no_identitas', 50)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('organisasi',150)->nullable();
            $table->text('alamat')->nullable();
            $table->string('provinsi',100)->nullable();
            $table->string('kabupaten',100)->nullable();

            // Data Pendidikan & Pekerjaan
            $table->string('pendidikan')->nullable();
            $table->string('nama_perguruan_tinggi')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->text('alamat_perusahaan')->nullable();
            $table->string('no_telp_perusahaan',20)->nullable();
            $table->string('email_perusahaan')->nullable();
            $table->string('jabatan_perusahaan')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biodata_asesi');
    }
};
