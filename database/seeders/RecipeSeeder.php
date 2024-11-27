<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        Recipe::create([
            'name' => 'Spaghetti Bolognese',
            'description' => 'Classic Italian pasta dish.',
            'bahan' => ['Spaghetti', 'Minced beef', 'Tomato sauce'],
            'langkah' => ['Boil spaghetti', 'Cook beef', 'Mix with sauce'],
            'video_path' => null,
        ]);

        Recipe::create([
            'name' => 'Pancakes',
            'description' => 'Fluffy pancakes for breakfast.',
            'bahan' => ['Flour', 'Eggs', 'Milk', 'Sugar'],
            'langkah' => ['Mix ingredients', 'Cook on skillet', 'Serve with syrup'],
            'video_path' => null,
        ]);

        Recipe::create([
            'name' => 'Nasi Goreng',
            'description' => 'Indonesian fried rice.',
            'bahan' => ['Rice', 'Eggs', 'Chicken', 'Vegetables', 'Soy sauce'],
            'langkah' => ['Cook rice', 'Fry eggs', 'Add chicken and vegetables', 'Mix with soy sauce'],
            'video_path' => null,
        ]);
    }
}
