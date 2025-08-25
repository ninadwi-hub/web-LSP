<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('skema', function (Blueprint $table) {
        $table->string('file_skema')->nullable()->after('deskripsi');
    });
}

public function down()
{
    Schema::table('skema', function (Blueprint $table) {
        $table->dropColumn('file_skema');
    });
}

};
