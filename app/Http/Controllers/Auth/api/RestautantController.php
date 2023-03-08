<?php

namespace App\Http\Controllers\auth\api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestautantController extends Controller
{

        public function index(){

            $restaurants = Restaurant::all();

            $restaurants->load("user", "category", "tags");
            return response()->json([
                "restaurants" => $restaurants,
            ]);
        }




  

}
