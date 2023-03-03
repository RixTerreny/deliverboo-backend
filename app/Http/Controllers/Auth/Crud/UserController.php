<?php

namespace App\Http\Controllers\Auth\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view("profile.show", ["user" => $user]);
    }


}
