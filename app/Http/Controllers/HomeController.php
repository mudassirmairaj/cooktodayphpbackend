<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Recipe;
;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $totalOrderAmount = Order::sum('total_price');
        $orderCount = Order::count();
        $recipeCount = Recipe::count();
        $userCount = User::count();


        return view('home')
        ->with('orderCount', $orderCount)
        ->with('userCount', $userCount)
        ->with('recipeCount', $recipeCount)
        ->with('totalOrderAmount', $totalOrderAmount);
      }
}
