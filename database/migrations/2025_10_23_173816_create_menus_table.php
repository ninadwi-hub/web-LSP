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
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->enum('type', ['internal', 'external', 'route'])->default('internal');
            $table->unsignedBigInteger('page_id')->nullable()->index('menus_page_id_foreign');
            $table->string('url')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable()->index('menus_parent_id_foreign');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('route')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
