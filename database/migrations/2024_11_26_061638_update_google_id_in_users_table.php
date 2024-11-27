<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('google_id')->nullable()->change(); // Ubah google_id menjadi nullable
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('google_id')->nullable(false)->change(); // Kembalikan ke tidak nullable
        });
    }
};
