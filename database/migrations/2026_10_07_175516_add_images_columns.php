<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->string('cover_url')->default('');
        });
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('thumbnail_url')->default('');
            $table->json('slider_images_url')->default('[]');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('podcasts', 'cover_url');
        Schema::dropColumns('experiences', ['thumbnail_url', 'slider_images_url']);
    }
};
