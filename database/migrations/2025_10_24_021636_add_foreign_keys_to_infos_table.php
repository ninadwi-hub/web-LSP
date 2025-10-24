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
        Schema::table('infos', function (Blueprint $table) {
            $table->foreign(['kategori_id'])->references(['id'])->on('kategoris')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['page_id'])->references(['id'])->on('pages')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropForeign('infos_kategori_id_foreign');
            $table->dropForeign('infos_page_id_foreign');
        });
    }
};
