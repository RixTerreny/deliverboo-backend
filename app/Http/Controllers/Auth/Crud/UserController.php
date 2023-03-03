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
    public function show(string $id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

}
