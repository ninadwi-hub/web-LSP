<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('file_path'); // Lokasi file di storage
            $table->string('file_type', 50)->nullable(); // Contoh: pdf, jpg
            $table->unsignedBigInteger('file_size')->nullable(); // Ukuran file dalam byte
            $table->string('uploader')->default('Admin'); // Nama pengunggah
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->unsignedBigInteger('download_count')->default(0); // Jumlah unduhan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
}
