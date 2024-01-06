<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Category;
use App\Models\RecipeIngredient;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //

    public function getAllUsers(){

        $users = User::all();
        return view('users', compact('users'));
    }

    public function getAllOrders(){

        $orders = Order::with(['orderRecipe', 'user'])
            ->orderBy('created_at', 'DESC')
            ->get();
            
       
        return view('orders', compact('orders'));
    }

    public function getOrderById($orderId){

        $order = Order::with(['restaurant', 'user', 'deliveryLocation', 'orderCarts' , 'orderCarts.menu'])
        ->where('id', $orderId)
        ->first();
            
        return view('order_detail', compact('order'));
    }

    public function getAllRecipe(){

        $recipe = Recipe::all();
        return view('recipe', compact('recipe'));
    }

    public function addNewRecipe()
    {
        $ingredients = Ingredient::all();
        $category = Category::all();
        return view('add_new_recipe', compact('category','ingredients'));
    }

    public function editRecipe($recipeId)
    {
        
        $recipe = Recipe::where('id', $recipeId)->first();
       
        return view('edit_recipe', compact('recipe'));
    }


    public function saveRecipe(Request $request){


      
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingredients' => 'array',
        ]);

        $reccipe = new Recipe([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'steps'=>$request->input('description'),
            'serving'=>$request->input('serving'),
            'category_id' => $request->category,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $reccipe->image = Storage::url($imagePath);
        }
        $reccipe->save();
        $ingredientsList =  $request->input('ingredients');
        foreach ($ingredientsList as $ingredients) {
            
            $recipeIngredient = new RecipeIngredient();
            $recipeIngredient->ingredient_id = $ingredients;
            $recipeIngredient->recipe_id = $reccipe->id;
            $recipeIngredient->save();
        }
    
        return redirect()->route('home')->with('success', 'Menu item added successfully.');

    }


    public function updateRecipe(Request $request, $id){
      
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ]);

        $recipe = Recipe::findOrFail($id);

        // Update the recipe attributes
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->price = $request->input('price');
        $recipe->steps = $request->input('steps'); // Update steps if necessary
        $recipe->serving = $request->input('serving');

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $reccipe->image = Storage::url($imagePath);
        }

        // Save the updated recipe
        $recipe->save();
    
        return redirect()->route('home')->with('success', 'Menu item added successfully.');

    }
}
