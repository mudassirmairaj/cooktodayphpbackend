<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderCart;
use Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function placeOrder(Request $request){

        $validator = Validator::make($request->all(), [
            'total_amount' => 'required',
            'recipe_id' => 'required'     
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' =>  $validator->errors()->first(),
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $customer = Auth::user();

        if(!$customer){
                return response([
                    'status' => 422,
                    'message' => 'No customer found',
                ], 422);
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'recipe_id' => $request->recipe_id,
            'total_price' => $request->total_amount,
            'instructions'=>  $request->instruction,
            'quantity'=> $request->quantity,
            'status'=>'pending'
        ]);

        return response([
            'status' => true,
            'message' => 'Order Created Successfully',
            'order' => $order,
        ]);

    }  

    public function getUserOrder(){

        $user = Auth::user();

        if(!$user){
                return response([
                    'status' => 422,
                    'message' => 'No customer found',
                ], 422);
        }

        $orders = Order::with('orderRecipe','user')
        ->where('user_id', $user->id)
        ->get();

        return response([
            'status' => true,
            'message' => 'Order Fetch Successfully',
            'orders' => $orders,
        ]);

    } 

}
