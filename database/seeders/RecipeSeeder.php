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
            'description' => 'Nasi goreng adalah makanan khas Indonesia yang sangat populer.',
            'kategori_id' => 2, // Main Course
            'video_path' => 'https://www.youtube.com/embed/WWq7En1CZu4',
            'bahan' => ['Nasi', 'Kecap', 'Telur', 'Bawang'], 
            'langkah' => ['Panaskan minyak', 'Masukkan bawang', 'Masukkan telur', 'Masukkan nasi', 'Tambahkan kecap'], 
            'langkah_image' => ['step1.jpg', 'step2.jpg', 'step3.jpg', 'step4.jpg', 'step5.jpg'], 
        ]);

        Recipe::create([
            'name' => 'Kue Lapis',
            'description' => 'Kue lapis adalah kue tradisional Indonesia yang berlapis-lapis.',
            'kategori_id' => 1, // Appetizer
            'video_path' => 'https://www.youtube.com/embed/example1',
            'bahan' => ['Tepung beras', 'Santan', 'Gula', 'Pewarna makanan'],
            'langkah' => ['Campur bahan', 'Tuang adonan', 'Kukus lapisan', 'Ulangi sampai habis'], 
            'langkah_image' => ['step1.jpg', 'step2.jpg', 'step3.jpg', 'step4.jpg'], 
        ]);

        Recipe::create([
            'name' => 'Kue Tart',
            'description' => 'Kue tart adalah kue yang sering disajikan pada acara ulang tahun.',
            'kategori_id' => 3, // Dessert
            'video_path' => 'https://www.youtube.com/embed/example2',
            'bahan' => ['Tepung terigu', 'Telur', 'Gula', 'Mentega', 'Cokelat'], 
            'langkah' => ['Kocok telur dan gula', 'Tambahkan tepung', 'Panggang adonan', 'Hias dengan cokelat'], 
            'langkah_image' => ['step1.jpg', 'step2.jpg', 'step3.jpg', 'step4.jpg'],
        ]);
    }
}