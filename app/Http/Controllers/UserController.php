<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email:dns|min:5|max:100',
            'password' => 'required|min:5|max:20'
        ]);

        return response()->json([
            'data' => $request
        ]);
    }
}
