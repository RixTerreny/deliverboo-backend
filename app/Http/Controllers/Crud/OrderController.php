<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $user_id = Auth::id();
    $restaurant = Restaurant::where("user_id", $user_id)->first();
    $dishes = Dish::where("id_restaurant", $restaurant->id)->get();
    $orders = collect();
    foreach ($dishes as $dish) {
        $orders = $orders->merge($dish->orders);
        // $orders = $orders->merge($dish->orders->with('dishes'));
            }
            /* tolgo i duplicati */
    $orders = $orders->unique('id')->sortBy('date');
    return view('order.index',compact("orders"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => ['required', 'string', 'max:255'],
            'total' => ['required', 'string', 'max:255'],
            'customer_delivery_address' => ['required', 'string', 'max:255'],             
            'customer_phone' => ['required', 'Numeric'],      
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_lastname' => ['required', 'string', 'max:255'],
            'id_dish' => ["array","nullable","exists:dish,id"],
            'quantity' => ["nullable","Numeric"],
            
        ]);
        $order = Order::create([
            'date' => $request->date,
            'total' => $request->total,
            'customer_delivery_address' => $request->customer_delivery_address,
            'customer_phone' => $request->customer_phone,
            'customer_name' => $request->customer_name,
            'customer_lastname' => $request->customer_lastname,
            'quantity' => $request->quantity,
        ]);
        $order->dish()->attach($request->id_dish);
        return redirect()->route('dish.index' ,compact("dish"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $dish)
    {
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}