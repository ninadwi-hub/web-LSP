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
    Schema::table('infos', function (Blueprint $table) {
        $table->unsignedBigInteger('page_id')->nullable()->after('id');
        $table->enum('status', ['draft', 'published'])->default('draft')->after('content');
    });
}

public function down()
{
    Schema::table('infos', function (Blueprint $table) {
        $table->dropColumn(['page_id', 'status']);
    });
}

};
