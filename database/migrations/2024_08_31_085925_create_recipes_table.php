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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('area')->nullable();
            $table->string('tags')->nullable();
            $table->longText('instructions')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('youtube')->nullable();
            $table->string('source')->nullable();
            $table->json("ingredients");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
