<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('developer_id')->nullable()->constrained()->onDelete('cascade');
            $table->date('release_date')->nullable();
            $table->string('developer_team')->nullable();
            $table->decimal('rating', 5, 2)->nullable();
            $table->unsignedInteger('times_listed')->nullable();
            $table->integer('number_of_reviews')->nullable();
            $table->json('genres')->nullable();
            $table->text('summary')->nullable();
            $table->text('reviews')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
