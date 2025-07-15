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
        $table->unsignedBigInteger('kategori_id')->after('id');

        // Jika ingin menambahkan foreign key (opsional)
       $table->foreignId('category_id')->nullable()->constrained('kategoris')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('infos', function (Blueprint $table) {
        $table->dropForeign(['kategori_id']);
        $table->dropColumn('kategori_id');
    });
}

};
