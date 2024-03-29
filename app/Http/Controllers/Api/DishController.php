<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index($id){
        $dishes = Dish::where('id_restaurant', $id)->get();
        $restaurant = Restaurant::where('id', $id)->get();
        $jojo =Dish::all();
        return response()->json([
            "dishes" => $dishes,
            "restaurant" => $restaurant,
            DishResource::collection($jojo),
        ]);
    }

}
