<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::all();
        
        return view('auth.register',compact("categories"));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        /* dd(Auth::id()); */
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],       
            'photo' => ["file","nullable"],       
            'user_id' => ["int","required","exists:users,id"],       
            'restaurant_name' => ['required', 'string', 'max:255'],       
            'vat' => ['required', 'Numeric', "digits_between:11,11"],
            'id_category' => ["array","required","exists:categories,id"],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $restaurant = Restaurant::create([
            'name' => $request->restaurant_name,
            'vat' => $request->vat,
            'address' => $request->address,
            'user_id' => $user->id,
            'category' => $request->user->id,
         
        ]);
        if ($request->has("id_category[]")) {
           
            $restaurant->categories()->attach($request["id_category[]"]);
        }

        event(new Registered($user));
      /*   event(new Restaurant($restaurant)); */

        /* event(new Registered($restaurant)); */

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME, compact($restaurant));
    }
}
