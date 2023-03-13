<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;

use function Pest\Laravel\get;

class RestaurantController extends Controller
{
    public function index()
    {

        $restaurants = Restaurant::all();
        $restaurants->load('categories');
        $categories = Category::all();


        return response()->json([
            "restaurants" => $restaurants,
            "categories" => $categories,
        ]);
    }



    public function CategorySerch($id)
    {

        $restaurants = Restaurant::where('category_id', $id);
        $restaurants->load('categories');
        $categories = Category::all();


        return response()->json([
            "restaurants" => $restaurants,
            "categories" => $categories,
        ]);
}
}