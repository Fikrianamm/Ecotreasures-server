<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    // create new AuthController instance
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    // get a JWT via given credentials
    public function login(){
        try{
            $credentials = request(['email', 'password']);
    
            if(!$token = auth()->attempt($credentials)){
                return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
            }
    
            $response = $this->respondWithToken($token);        
            $cookie = cookie('data', $response, $response->original['expires_in']);
    
            return response()->json([
                'success' => true,
                'message' => 'logged in',
                'data' => [
                    'token' => $response->original['access_token'],
                ]
            ], 200)->withCookie($cookie);

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

    // get authenticated user
    public function me(){
        return response()->json(auth()->user());        
    }

    // logout (invalidate user)
    public function logout(){        
        auth()->logout();
        return response()->json(['success' => true, 'message' => 'Successfully logged out']);
    }

    // refresh a token
    public function refresh(){
        return $this->respondWithToken(auth()->refresh());
    }

    // get token array structure
    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
