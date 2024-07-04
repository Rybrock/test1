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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('developer_id');
            $table->foreignIdFor(App\Models\Developer::class);
            $table->string('game_name');
            $table->string('email')->unique();
            $table->string('game_address');
            $table->string('game_location');
            $table->integer('game_meta_score');
            $table->boolean('is_active');
            $table->date('first_published');
            $table->decimal('rating', 3, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
