<?php

use App\Http\Controllers\Api\RestaurantController as ApiRestaurantController;
use App\Http\Controllers\Api\DishController as ApiDishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/restaurants",[ApiRestaurantController::class,"index"]);

Route::get("/dish/{id}",[ApiDishController::class,"index"]);
Route::get("/restaurants/category/{category}",[ApiRestaurantController::class,"CategorySerch"]);
