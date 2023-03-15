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



    public function CategorySerch($category)
    {

       /*  $restaurants = Restaurant::where('category_id', $category);
        $restaurants->load('categories');
        $categories = Category::all(); */
        /* $restaurants = Restaurant::where("category_id",$category)->get(); /
        /  $restaurants->load('categories', 'categories.pivot');

 */

        $restaurants = Restaurant::whereHas('categories', function($query) use ($category) {
            $query->where('categories.id', $category);
        })->get();
        $restaurants->load('categories');
        
        
        /* with("category.restaurant")->where("category_id",$category)->get(); */

        return response()->json([
            "restaurants" => $restaurants,
           /*  "categories" => $categories, */
        ]);
}
}