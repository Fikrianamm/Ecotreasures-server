<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistItem;
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
            $wishlist = Wishlist::where('user_id', $user->id)->first();
            
            if(!$wishlist){
                Wishlist::create(['user_id' => $user->id]);
            }                        

            WishlistItem::create([
                'wishlist_id' => Wishlist::where('user_id', $user->id)->first()->id,
                'product_id' => $product->id
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
    
            $wishlist = Wishlist::where('user_id', $user->id)->first();
            $wishlist_items = WishlistItem::where('wishlist_id', $wishlist->id)->get();
            $data = $wishlist_items->map(function($item){
                $product = Product::where('id', $item->product_id)->first();                
                return [
                    'success' => true,
                    'message' => 'Data found',
                    'data' => [
                        'wishlist' => [
                            'wishlist_id' => $item->id,
                            'product' => [
                                'id' => $product->id,
                                'owner' => $product->user->name,
                                'title' => $product->title,
                                'image' => $product->image,
                                'price' => $product->price,
                                'stock' => $product->stock,
                            ],
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
    
    public function delete(WishlistItem $wishlistitem){
        try{            
            WishlistItem::destroy($wishlistitem->id);
    
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
