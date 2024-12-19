<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::create([
            'name' => 'Nasi Goreng',
            'description' => 'Nasi goreng yang lezat dan mudah dibuat.',
            'video_path' => 'nasi-goreng.mp4',
            'gambar' => 'nasigoreng.png',
            'kategori_id' => 1, // Pastikan kategori_id sesuai dengan kategori yang ada
            'bahan' => 'Nasi, Bawang Merah, Bawang Putih, Kecap, Garam, Telur',
            'langkah' => 'Tumis bawang merah dan bawang putih, Masukkan nasi, Tambahkan kecap dan garam, Aduk rata, Sajikan dengan telur',
            'langkah_image' => json_encode(['step1.png', 'step2.png', 'step3.png']),
        ]);

        Recipe::create([
            'name' => 'Bubur Kacang Hijau',
            'description' => 'Bubur kacang hijau yang manis dan lembut.',
            'video_path' => 'bubur-kacang-hijau.mp4',
            'gambar' => 'buburkacanghijau.png',
            'kategori_id' => 2, // Pastikan kategori_id sesuai dengan kategori yang ada
            'bahan' => 'Kacang Hijau, Gula Merah, Santan, Garam',
            'langkah' => 'Rendam kacang hijau, Rebus kacang hijau, Tambahkan gula merah dan santan, Masak hingga matang, Sajikan',
            'langkah_image' => json_encode(['step1.png', 'step2.png', 'step3.png']),
        ]);

        Recipe::create([
            'name' => 'Kue Lapis',
            'description' => 'Kue lapis yang manis dan berlapis-lapis.',
            'video_path' => 'kue-lapis.mp4',
            'gambar' => 'kuelapis.png',
            'kategori_id' => 3, // Pastikan kategori_id sesuai dengan kategori yang ada
            'bahan' => 'Tepung Beras, Santan, Gula, Pewarna Makanan',
            'langkah' => 'Campur tepung beras dan santan, Tambahkan gula, Bagi adonan dan beri pewarna, Tuang adonan berlapis-lapis, Kukus hingga matang',
            'langkah_image' => json_encode(['step1.png', 'step2.png', 'step3.png']),
        ]);

        Recipe::create([
            'name' => 'Cendol',
            'description' => 'Minuman cendol yang segar dan manis.',
            'video_path' => 'cendol.mp4',
            'gambar' => 'cendol.png',
            'kategori_id' => 3, // Pastikan kategori_id sesuai dengan kategori yang ada
            'bahan' => 'Tepung Hunkwe, Air, Gula Merah, Santan, Daun Pandan',
            'langkah' => 'Campur tepung hunkwe dan air, Masak hingga mengental, Cetak cendol, Rebus gula merah dan santan, Sajikan dengan cendol',
            'langkah_image' => json_encode(['step1.png', 'step2.png', 'step3.png']),
        ]);
    }
}
