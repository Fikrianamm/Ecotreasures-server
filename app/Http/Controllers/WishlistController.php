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
        $user = auth()->user();
        Wishlist::create([
            'product_id' => $product->id,
            'user_id' => $user->id
        ]);

        return response()->json([
            'success' => true,
            'message' => "Product added to wishlist",            
        ], 201);
    }

    public function show(){
        $user = auth()->user();

        $wishlists = Wishlist::where('user_id', $user->id)->get();
        $data = $wishlists->map(function($item){
            return [
                'success' => true,
                'message' => 'Data found',
                'data' => [
                    'wishlist_id' => $item->id,
                    'product' => $item->product
                ],
            ];
        });

        return response()->json($data, 201);
    }
    
    public function delete(Wishlist $wishlist){
        $user = auth()->user();
        Wishlist::destroy($wishlist->id);

        return response()->json([
            'success' => true,
            'message' => 'Item deleted from wishlist'
        ], 201);
    }
}
