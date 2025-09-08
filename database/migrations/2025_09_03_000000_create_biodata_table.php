<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // relasi ke user login
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('no_identitas')->nullable();
            $table->string('organisasi')->nullable();
            $table->string('no_hp')->nullable();

            // pendidikan & pekerjaan
            $table->string('pendidikan')->nullable();
            $table->string('nama_pt')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('telp_perusahaan')->nullable();
            $table->string('email_perusahaan')->nullable();
            $table->string('jabatan')->nullable();

            // file upload
            $table->string('foto')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('cv')->nullable();
            $table->string('tanda_tangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('biodata');
    }
};
