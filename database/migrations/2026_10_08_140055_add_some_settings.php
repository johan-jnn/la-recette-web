<?php

use App\Enums\Settings;
use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Setting::create([
            'id' => Settings::LINKEDIN_URL,
            'label' => "URL Linkedin"
        ]);
        Setting::create([
            'id' => Settings::INSTAGRAM_URL,
            'label' => "URL Instagram"
        ]);
        Setting::create([
            'id' => Settings::SPOTIFY_URL,
            'label' => "URL Spotify"
        ]);
        Setting::create([
            'id' => Settings::DEEZER_URL,
            'label' => "URL Deezer"
        ]);
        Setting::create([
            'id' => Settings::APPLE_MUSIC_URL,
            'label' => "URL Apple Music"
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Setting::whereIn('id', [
            Settings::DEEZER_URL,
            Settings::SPOTIFY_URL,
            Settings::APPLE_MUSIC_URL,
            Settings::LINKEDIN_URL,
            Settings::INSTAGRAM_URL
        ])->delete();
    }
};
