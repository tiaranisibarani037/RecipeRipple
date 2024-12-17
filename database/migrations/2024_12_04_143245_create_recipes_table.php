<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('recipes')) {
            Schema::create('recipes', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('gambar');
                $table->text('description');
                $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
                $table->string('video_path')->nullable();
                $table->json('bahan'); // Stores ingredients as a JSON array
                $table->json('langkah'); // Stores steps as a JSON array
                $table->json('langkah_image'); // Stores ingredients as a JSON array
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
