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
        Schema::create('sponsorables', function (Blueprint $table) {
            $table->id();
            $table->morphs('sponsorable');
            $table->unsignedBigInteger('sponsor_id');
            $table->decimal('amount', 16, 2);
            $table->date('start_date');
            $table->date('end_date')->nullable();


            $table->foreign('sponsor_id')->on('sponsors')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorables');
    }
};
