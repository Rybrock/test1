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
            $table->integer('developer_experience');
            $table->boolean('is_active');
            $table->decimal('hourly_rate', 8, 2);
            $table->date('joined_date');
            $table->decimal('rating', 3, 1);
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
