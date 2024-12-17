<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Pastikan tidak ada nilai NULL di kolom google_id sebelum mengubahnya menjadi nullable
            DB::table('users')->whereNull('google_id')->update(['google_id' => '']);

            $table->string('google_id')->nullable()->change(); // Ubah google_id menjadi nullable

            // Tambahkan nilai default untuk kolom password
            $table->string('password')->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Pastikan tidak ada nilai NULL di kolom google_id sebelum mengubahnya menjadi tidak nullable
            DB::table('users')->whereNull('google_id')->update(['google_id' => '']);

            $table->string('google_id')->nullable(false)->change(); // Kembalikan ke tidak nullable

            // Hapus nilai default untuk kolom password
            $table->string('password')->default(null)->change();
        });
    }
};