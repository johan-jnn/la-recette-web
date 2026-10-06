<?php

use App\Enums\Platform;
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
        Schema::create('podcast_urls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('podcast_id')->constrained('podcasts', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('platform', Platform::cases());
            $table->string('url');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('podcast_urls');
    }
};
