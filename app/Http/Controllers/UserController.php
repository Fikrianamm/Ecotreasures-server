<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $find = User::where('email', $validatedData['email'])->count();

        if($find > 0){            
            return response()->json([
                "message" => "Email already exist"
            ], 409);
        }

        User::create($validatedData);
        
        return response()->json([
            'message' => 'Sucessfully Registered',
            'data' => [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ]
        ], 201);
    }

    public function update(Request $request, User $user){        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        User::where('id', $user->id)->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Profile Updated Successfully!',
        ], 201);
    }
}
