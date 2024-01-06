<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\AdminController::class, 'getAllUsers'])->name('users');
Route::get('/orders', [App\Http\Controllers\AdminController::class, 'getAllOrders'])->name('orders');
Route::get('/recipe', [App\Http\Controllers\AdminController::class,'getAllRecipe'])->name('recipe');


Route::get('/order/{id}', [App\Http\Controllers\AdminController::class, 'getOrderById'])->name('getOrderById');
Route::get('/recipe/create', [App\Http\Controllers\AdminController::class,'addNewRecipe'])->name('recipe.create');
Route::post('/recipe/store', [App\Http\Controllers\AdminController::class,'saveRecipe'])->name('recipe.store');
Route::get('/recipe/{recipeId}', [App\Http\Controllers\AdminController::class,'editRecipe'])->name('recipeEdit');
Route::post('/recipe/{recipeId}', [App\Http\Controllers\AdminController::class,'updateRecipe'])->name('updateRecipe');

Route::post('/update-order',[App\Http\Controllers\AdminController::class, 'updateOrderStatus']);

Route::get('/restaurants/{restaurant}/menus/create', [App\Http\Controllers\AdminController::class,'getMenuView'])->name('menus.create');
Route::post('/restaurants/{restaurant_id}/menus',[App\Http\Controllers\AdminController::class, 'storeMenu'])->name('restaurant.menus.store');

