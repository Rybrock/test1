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
            $table->foreignIdFor(App\Models\Developer::class)->constrained()->onDelete('cascade');
            $table->string('game_name');
            $table->string('genre');
            $table->string('platforms');
            $table->string('game_origin');
            $table->integer('meta_critic_score');
            $table->boolean('out_now');
            $table->date('release_date');
            $table->boolean('collectors_edition');
            $table->string('online_stores');
            $table->string('audience');
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
