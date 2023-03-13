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
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],             
            'user_id' => ["nullable|exists:users,id"],       
            'restaurant_name' => ['required', 'string', 'max:255'],       
            'vat' => ['required', 'Numeric', "digits_between:11,11"],
            'id_category' => ["array","nullable","exists:categories,id"],
            'photo' => ['nullable', 'image'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->hasFile('photo', $data)) {
            $path = Storage::put("restaurant",$data["photo"]);
        }

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
            'photo' => $path ?? '',
        ]);


        
        $restaurant->categories()->attach($request->id_category);
        

        event(new Registered($user,$restaurant));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
