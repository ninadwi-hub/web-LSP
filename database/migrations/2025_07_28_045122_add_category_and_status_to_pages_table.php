<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'category')) {
                $table->string('category')->default('informasi')->after('content');
            }
            if (!Schema::hasColumn('pages', 'status')) {
                $table->enum('status', ['published', 'draft'])->default('draft')->after('category');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $dropCols = [
                'category',
                'status',
            ];
            foreach ($dropCols as $col) {
                if (Schema::hasColumn('pages', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
