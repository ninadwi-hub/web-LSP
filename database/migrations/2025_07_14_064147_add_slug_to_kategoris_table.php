<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('kategoris', 'slug')) {
            Schema::table('kategoris', function (Blueprint $table) {
                $table->string('slug')->unique()->after('nama');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('kategoris', 'slug')) {
            Schema::table('kategoris', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }
};
