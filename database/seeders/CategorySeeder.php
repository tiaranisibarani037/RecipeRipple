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
        $categories = [
            ['category_name' => 'Appetizer'],
            ['category_name' => 'Main Course'],
            ['category_name' => 'Dessert'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}