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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team1_id')->references('id')->on('teams');
            $table->foreignId('team2_id')->references('id')->on('teams');
            $table->integer('team1_score')->nullable();
            $table->integer('team2_score')->nullable();
            $table->text('field');
            $table->foreignId('referee_id')->references('id')->on('users');
            $table->text('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
