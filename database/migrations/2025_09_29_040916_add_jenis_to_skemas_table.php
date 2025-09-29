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
    Schema::table('skemas', function (Blueprint $table) {
        $table->string('jenis')->nullable()->after('nama');
    });
}

public function down(): void
{
    Schema::table('skemas', function (Blueprint $table) {
        $table->dropColumn('jenis');
    });
}

};
