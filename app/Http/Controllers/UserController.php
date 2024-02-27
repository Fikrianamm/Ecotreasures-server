<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email:dns|unique:users|min:5|max:100',
            'password' => 'required|min:5|max:20'
        ]);        

        if(User::where('email', $validatedData->email)->exist()){
            return response()->json([
                "message" => "Email already exist"
            ], 409);
        }

        User::create($validatedData);
        
        return response()->json([
            'message' => 'Sucessfully Registered',            
        ], 201);
    }
}
