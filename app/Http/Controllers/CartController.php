<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function add(Product $product){
        try{
            $user = auth()-user();

            function getusercart(){
                $cart = Cart::where('user_id', $user->id)->fisrt();
                return $cart;
            }

            if(!getusercart()){
                Cart::create(['user_id' => $user->id]);
            }

            CartItem::create([
                'cart_id' => getusercart()->id,
                'product_id' => $product->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => "Product added to cart",            
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

            $cart = Cart::where('user_id', $user->id)->first();
            $cart_items = CartItems::where('cart_id', $cart->id)->get();
            $data = $cart_items->map(function($item){
                $product = Product::where('id', $item->product_id)->first();                
                return [
                    'success' => true,
                    'message' => 'Data found',
                    'data' => [
                        'wishlist' => [
                            'cart_id' => $item->id,
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
}
