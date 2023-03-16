<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Dish;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token,
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway  $gateway)
    {
        // $dish = Dish::find($request->dish);
        $totalAmount = 0;
        $dishes = [];
        dd($request->dish);
        foreach ($request->dishes as $dishId) {
            $dish = Dish::find($dishId);
            $totalAmount += $dish->price;
            $dishes[] = $dish;
        }

        $result = $gateway->transaction()->sale([
            'amount' => $dish->price,
            'paymentMethodNonce'=>$request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);


        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'Transaction done'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transaction denied'
            ];
            return response()->json($data, 401);
        }
    }
    /* public function index($id){
        $orders = Dish::where('id_restaurant', $id)->get();
        $restaurant = Restaurant::where('id', $id)->get();
        $jojo =Dish::all();
        return response()->json([
            "dishes" => $dishes,
            "restaurant" => $restaurant,
            DishResource::collection($jojo),
        ]);
    } */
}
