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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('oldteam_id');
            $table->unsignedBigInteger('newteam_id');
            $table->date('date_transfer');
            $table->decimal('fee', 16, 2)->nullable();

            $table->foreign('newteam_id')->on('teams')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('oldteam_id')->on('teams')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('player_id')->on('players')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
