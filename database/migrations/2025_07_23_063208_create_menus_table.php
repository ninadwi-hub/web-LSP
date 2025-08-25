<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
           $table->enum('type', ['internal','external','route'])->default('internal');
            $table->foreignId('page_id')->nullable()->constrained('pages')->onDelete('cascade'); 
            $table->string('url')->nullable(); // untuk link external
            $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::table('menus', function (Blueprint $table) {
         $table->string('route')->nullable(); // untuk menu khusus route laravel
});

    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
