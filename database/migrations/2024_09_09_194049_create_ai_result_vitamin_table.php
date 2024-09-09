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
        Schema::create('ai_result_vitamin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ai_result_id')->constrained('ai_results')->onDelete('cascade');
            $table->foreignId('vitamin_id')->constrained('vitamins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_result_vitamin');
    }
};
