<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;

use function Pest\Laravel\get;

class RestaurantController extends  Controller
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

    public function CategorySerch($categoryArray)
{
    $restaurants = Restaurant::whereHas('categories', function($query) use ($categoryArray) {
        $query->whereIn('categories.id', $categoryArray);
    }, '=', count($categoryArray))->get();

    $restaurants->load('categories');

    return response()->json([
        "restaurants" => $restaurants,
    ]);
}

    /* public function CategorySerch($category)
    {

      


        $restaurants = Restaurant::whereHas('categories', function($query) use ($category) {
            $query->where('categories.id', $category);
        })->get();
        $restaurants->load('categories');
        
        
       

        return response()->json([
            "restaurants" => $restaurants,

        ]);
         */
}
}