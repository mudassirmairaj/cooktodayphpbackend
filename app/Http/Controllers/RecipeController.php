<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    


    public function getRecipes(Request $req){
        // $recipe = Recipe::with(['recipeIngredients','recipeIngredients.ingredients', 'category'])->get();
        $recipes = Recipe::with(['recipeIngredients', 'recipeIngredients.ingredient', 'category'])->get();

        return response()->json([
            'status' => true,
            'message' => 'fetch successfully',
            'recipe' => $recipes
        ], 200);
    }

}
// php artisan serve --host 192.168.100.3  --port 8000