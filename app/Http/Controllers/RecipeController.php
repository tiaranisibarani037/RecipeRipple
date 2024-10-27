<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function store(Request $request)
    {
        // Validation and saving logic here

        // Example:
        $recipe = Recipe::create($request->all());
        
        return redirect()->route('recipe.index')->with('success', 'Recipe added successfully!');
    }
}
