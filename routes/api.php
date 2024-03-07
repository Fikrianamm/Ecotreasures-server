<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json(['success'=>true, 'message'=>'test api']);
});

// User Router
Route::group(['middleware' => 'api', 'prefix' => 'user'], function(){
    Route::post('/update/{user}', [UserController::class, 'update']);
    Route::post('/register', [UserController::class, 'register']);
});

// Auth router
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function($router){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);    
});

// Wishlist router
Route::group(['middleware' => 'api', 'prefix' => 'wishlists'], function(){
    Route::post('/add/{product}', [WishlistController::class, 'add']);
    Route::get('/show', [WishlistController::class, 'show']);
    Route::delete('/delete/{wishlistitem}', [WishlistController::class, 'delete']);
});

// Product router
Route::group(['middleware' => 'api','prefix' => 'products'], function (){
    Route::post('/create', [ProductController::class, 'create']);
    Route::post('/update/{product}', [ProductController::class, 'update']);
    Route::get('/seller', [ProductController::class, 'getsellerdata']);
    Route::delete('/delete/{product}', [ProductController::class, 'delete']);
    Route::get('/data', [ProductController::class, 'getalldata']);
    Route::post('/review/{product}', [ProductController::class, 'review']);
    Route::get('/review/{product}', [ProductController::class, 'getreviewsdata']);
});