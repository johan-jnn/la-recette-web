<?php

use App\Enums\ContactType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_entries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->tinyText('first_name');
            $table->tinyText('last_name');

            $table->string('email');
            $table->string('phone');

            $table->string('object');
            $table->mediumText('message');

            $table->enum('type', ContactType::cases());
            $table->string('company_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_entries');
    }
};
