<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['register']]);
    }
    
    public function register(Request $request){
        try{
            $validatedData = $request->validate([
                'name' => 'required|min:3|max:100',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:3|max:255'
            ]);
            
            $find = User::where('email', $validatedData['email'])->count();
        
            if($find > 0){            
                return response()->json([
                    "success" => false,
                    "message" => "Email already exist"
                ], 409);
            }
        
            User::create($validatedData);
            
            return response()->json([
                'message' => 'Sucessfully Registered',
                'success' => true,
                'data' => [
                    'user' => [
                        'name' => $validatedData['name'],
                        'email' => $validatedData['email'],
                        'avatar' => 'https://ui-avatars.com/api/?name=' . urldecode($validatedData['name'])
                    ],
                ]
            ], 201);
            
        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => "Something Error",
                "errors" => [
                    'error' => $e->getMessage()
                ]
            ]);
        }
    }

    public function update(Request $request, User $user){
        try{
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);            
    
            User::where('id', $user->id)->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password'])
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Profile Updated Successfully!',
            ], 200);

        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => "Something Error",
                "errors" => [
                    'error' => $e->getMessage()
                ]
            ]);
        }
    }
}
