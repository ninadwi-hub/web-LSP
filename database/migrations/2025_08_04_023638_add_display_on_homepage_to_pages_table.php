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
   Schema::table('pages', function (Blueprint $table) {
    if (!Schema::hasColumn('pages', 'display_on_homepage')) {
        $table->boolean('display_on_homepage')->default(false)->after('status');
    }
});

}

public function down()
{
    Schema::table('pages', function (Blueprint $table) {
        $table->dropColumn('display_on_homepage');
    });
}
};
