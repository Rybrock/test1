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
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('developer_name');
            $table->string('email')->unique();
            $table->string('developer_address');
            $table->string('developer_location');
            $table->string('lead_developer');
            $table->string('genre');
            $table->boolean('is_active');
            $table->date('first_published_game');
            $table->date('last_published_game');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
