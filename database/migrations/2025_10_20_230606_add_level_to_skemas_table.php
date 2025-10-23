<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skemas', function (Blueprint $table) {
            $table->string('level')->nullable()->after('kategori');
        });
    }

    public function down(): void
    {
        Schema::table('skemas', function (Blueprint $table) {
            $table->dropColumn('level');
        });
    }
};
