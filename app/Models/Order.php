<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderRecipe;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'user_id',
        'total_price',
        'status',
        'instructions',
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id' );
    }

    public function orderRecipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
