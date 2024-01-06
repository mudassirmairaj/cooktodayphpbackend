<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\RecipeIngredient;
use App\Models\OrderRecipe;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'steps',
        'price',
        'category_id',
        'image',
        'quantity',
        'serving'
    ];


    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderRecipes()
    {
        return $this->hasOne(Order::class);
    }

    public function recipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }
}
