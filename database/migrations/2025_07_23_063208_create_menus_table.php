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
    $table->string('slug')->nullable();
    $table->string('url')->nullable(); // untuk link eksternal
    $table->enum('type', ['internal', 'external'])->default('internal');
    $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade');
    $table->integer('order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
