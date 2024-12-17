<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            ['nama' => 'Appetizer'],
            ['nama' => 'Main Course'],
            ['nama' => 'Dessert'],
        ];

        foreach ($kategori as $category) {
            Category::create($category);
        }
    }
}