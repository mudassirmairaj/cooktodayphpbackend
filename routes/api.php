<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('loginUser', [AuthController::class, 'loginUser']);
Route::post('registerUser', [AuthController::class, 'registerUser']);


// new added routes
Route::middleware('auth:sanctum')->group(function () {
    // Route::post('addToCart', [RecipeController::class, 'addToCart']);
    Route::post('confirmOrder', [RecipeController::class, 'confirmOrder']);
    Route::post('getRecipes', [RecipeController::class, 'getRecipes']);
    Route::post('placeOrder', [OrderController::class, "placeOrder"]);
    Route::get('getUserOrder', [OrderController::class, "getUserOrder"]);
});
