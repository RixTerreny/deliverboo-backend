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
        $user_id = Auth::id();
        $restaurant = Restaurant::where("user_id", $user_id)->first();
        $dishes = Dish::where("id_restaurant", $restaurant->id)->get();
        /* dd($dishes); */
        return view('dish.index',compact("dishes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('dish.create');
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
            'price' => ['required', 'numeric', 'min:0'],
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
        $dish = Dish::findOrFail($id);
        return view('dish.show',compact("dish"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dish = Dish::findOrFail($id);
        return view('dish.edit',compact("dish"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = Auth::id();

        $restaurant_id = Restaurant::where("user_id", $user_id)->first();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'id_restaurant' => ["nullable|exists:id,restaurants"],       
            'visible' => ['nullable', 'boolean'],       
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $dish = Dish::findOrFail($id);
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->id_restaurant = $restaurant_id->id;
        $dish->visible = $request->visible;
        $dish->price = $request->price;
        $dish->save();

        return redirect()->route('dashboard' ,compact("dish"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();
        return redirect()->route('dashboard');
    }
}
