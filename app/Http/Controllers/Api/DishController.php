<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index($id){
        $dish = Dish::where('id_restaurant', $id)->get();

        return response()->json([
            "dish" => $dish,
        ]);
    }
}
