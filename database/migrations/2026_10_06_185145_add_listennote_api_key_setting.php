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
            'id' => Settings::LISTEN_NOTES_API_KEY,
            'label' => "Clé d'API Listen Notes (recherche de podcast)"
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Setting::where('id', Settings::LISTEN_NOTES_API_KEY)->delete();
    }
};
