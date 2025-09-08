<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('skemas', function (Blueprint $table) {
            if (!Schema::hasColumn('skemas', 'file_skema')) {
                $table->string('file_skema')->nullable()->after('ringkasan');
            }
        });
    }

    public function down()
    {
        Schema::table('skemas', function (Blueprint $table) {
            if (Schema::hasColumn('skemas', 'file_skema')) {
                $table->dropColumn('file_skema');
            }
        });
    }
};
