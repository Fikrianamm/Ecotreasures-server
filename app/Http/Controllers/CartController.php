<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function add(Request $request, Product $product){   
        try{                   
            $validatedData = $request->validate([
                'quantity' => 'required|not_in:0|min:1',
                'notes' => 'required|min:3|max:500'
            ]);

            function getusercart($user){
                $cart = Cart::where('user_id', $user->id)->first();
                return $cart;
            }            

            $user = auth()->user();     

            if(!getusercart($user)){
                Cart::create(['user_id' => $user->id]);
            }
            
            $isProductInCart = CartItem::where('product_id', $product->id)->where('cart_id', getusercart($user)->id)->first();

            if($isProductInCart){
                return response()->json([
                    'success' => false,
                    'message' => 'This product has been added in cart'
                ]);
            }

            $qtyInt = intval($validatedData['quantity']);

            CartItem::create([
                'cart_id' => getusercart($user)->id,
                'product_id' => $product->id,
                'quantity' => $qtyInt,
                'notes' => $validatedData['notes']
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
            dd($cart->product);
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
