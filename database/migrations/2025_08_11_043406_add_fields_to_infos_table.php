<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('infos', function (Blueprint $table) {
            if (!Schema::hasColumn('infos', 'page_id')) {
                $table->unsignedBigInteger('page_id')->nullable()->after('id');
            }
            if (!Schema::hasColumn('infos', 'status')) {
                $table->enum('status', ['draft', 'published'])->default('draft')->after('content');
            }
        });
    }

    public function down()
    {
        Schema::table('infos', function (Blueprint $table) {
            if (Schema::hasColumn('infos', 'page_id')) {
                $table->dropColumn('page_id');
            }
            if (Schema::hasColumn('infos', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
