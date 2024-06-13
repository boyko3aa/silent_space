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
        Schema::create('match_games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id')->nullable();
            $table->unsignedBigInteger('team1_id');
            $table->unsignedBigInteger('team2_id');
            $table->string('result');
            $table->dateTime('match_date');
            $table->timestamps();

            $table->foreign('team1_id')->on('teams')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('team2_id')->on('teams')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('tournament_id')->on('tournaments')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_games');
    }
};
