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
            $table->string('recipe_name');
            $table->text('recipe_description')->nullable();
            $table->text('cooking_steps')->nullable();
            $table->string('video_url')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamp('upload_date')->useCurrent();
            $table->foreignId('user_id')->constrained('users')->onDelete('set null')->nullable();
            $table->timestamps();
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
