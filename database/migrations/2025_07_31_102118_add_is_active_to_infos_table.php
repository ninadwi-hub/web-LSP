<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            if (!Schema::hasColumn('infos', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('content');
            }
            if (!Schema::hasColumn('infos', 'views')) {
                $table->unsignedBigInteger('views')->default(0)->after('thumbnail');
            }
            if (!Schema::hasColumn('infos', 'page_id')) {
                $table->unsignedBigInteger('page_id')->nullable()->after('id');
            }
            if (!Schema::hasColumn('infos', 'status')) {
                $table->enum('status', ['draft', 'published'])->default('draft')->after('content');
            }
        });
    }

    public function down(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $dropCols = ['is_active', 'views', 'page_id', 'status'];
            foreach ($dropCols as $col) {
                if (Schema::hasColumn('infos', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
