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
        Schema::create('login_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // optional, bisa dipakai untuk username
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable(); // tambahan dari kebutuhanmu
            $table->string('password');
            $table->enum('role', ['asesi', 'tuk'])->default('asesi'); // default asesi
            $table->rememberToken(); // untuk fitur "remember me"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_users');
    }
};
