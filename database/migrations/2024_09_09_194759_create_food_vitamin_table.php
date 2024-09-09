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
        Schema::create('food_vitamin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id')->constrained('food')->onDelete('cascade');
            $table->foreignId('vitamin_id')->constrained('vitamins')->onDelete('cascade');
            $table->float('calories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_vitamin');
    }
};
