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
        Schema::create('jadwal_asesor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jadwal_id')->index('jadwal_asesor_jadwal_id_foreign');
            $table->unsignedBigInteger('asesor_id')->index('jadwal_asesor_asesor_id_foreign');
            $table->enum('role', ['uji', 'validator']);
            $table->boolean('is_lead')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_asesor');
    }
};
