<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('login_users')) {
            Schema::create('login_users', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable(); // optional username
                $table->string('email')->unique();
                $table->string('phone')->unique()->nullable(); 
                $table->string('password');
                $table->enum('role', ['asesi', 'tuk'])->default('asesi'); 
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    public function down(): void {
        Schema::dropIfExists('login_users');
    }
};
