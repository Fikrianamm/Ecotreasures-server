<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:api');
    }
    
    public function add(Product $product){
        try{
            $user = auth()->user();
            Wishlist::create([
                'product_id' => $product->id,
                'user_id' => $user->id
            ]);
    
            return response()->json([
                'success' => true,
                'message' => "Product added to wishlist",            
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

    public function show(){
        try{
            $user = auth()->user();
    
            $wishlists = Wishlist::where('user_id', $user->id)->get();
            $data = $wishlists->map(function($item){
                return [
                    'success' => true,
                    'message' => 'Data found',
                    'data' => [
                        'wishlist' => [
                            'wishlist_id' => $item->id,
                            'product' => $item->product
                        ],
                    ],
                ];
            });
    
            return response()->json($data, 200);

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
    
    public function delete(Wishlist $wishlist){
        try{
            $user = auth()->user();
            Wishlist::destroy($wishlist->id);
    
            return response()->json([
                'success' => true,
                'message' => 'Item deleted from wishlist'
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
