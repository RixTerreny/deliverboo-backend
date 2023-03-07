<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dish = Dish::all();
        
        return view('dish.create',compact("dish"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $restaurant_id = Restaurant::where("user_id", $user_id)->first();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'id_restaurant' => ["nullable|exists:id,restaurants"],       
            'visible' => ['nullable', 'boolean'],       
            'price' => ['required', 'string'],
        ]);

        $dish = Dish::create([
            'name' => $request->name,
            'description' => $request->description,
            'id_restaurant' => $restaurant_id->id,
            'visible' => $request->visible,
            'price' => $request->price,
        ]);

        return redirect()->route('dashboard' ,compact("dish"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
