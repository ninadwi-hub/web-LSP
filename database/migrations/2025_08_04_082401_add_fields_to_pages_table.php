<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dateTime('published_at')->nullable()->after('status');
            $table->text('meta_description')->nullable()->after('featured_image');
            $table->string('meta_keywords')->nullable()->after('meta_description');
            $table->boolean('is_homepage')->default(false)->after('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'published_at',
                'meta_description',
                'meta_keywords',
                'is_homepage'
            ]);
        });
    }
};
