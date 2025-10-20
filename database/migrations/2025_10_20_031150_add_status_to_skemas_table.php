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
        $table->boolean('status')->default(1)->after('level'); // 1 = aktif
    });
}

public function down(): void
{
    Schema::table('skemas', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
