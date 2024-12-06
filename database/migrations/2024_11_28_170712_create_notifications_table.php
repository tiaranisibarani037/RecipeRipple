<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User yang menerima notifikasi
            $table->unsignedBigInteger('recipe_id'); // Resep yang dikomentari atau diberi rating
            $table->string('type'); // Jenis notifikasi (comment atau rating)
            $table->text('message'); // Pesan notifikasi
            $table->boolean('is_read')->default(false); // Status notifikasi
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};