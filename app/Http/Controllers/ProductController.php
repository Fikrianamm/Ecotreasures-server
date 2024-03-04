<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['getalldata']]);
    }

    public function create(Request $request){                     
        try{
            $validatedData = $request->validate([
                'title' => 'required|min:3|max:100',
                'image' => 'required|min:',
                'price' => 'required',
                'stock' => 'required',
                'detail' => 'required'
            ]);
    
            $priceInt = intval($validatedData['price']);
            $stockInt = intval($validatedData['stock']);

            Product::create([
                'user_id' => auth()->user()->id,
                'title' => $validatedData['title'],
                'image' => $validatedData['image'],
                'price' => $priceInt,
                'stock' => $stockInt,
                'detail' => $validatedData['detail'],
            ]);                    
    
            return response()->json([
                'success' => true,
                'message' =>  'Product created successfully.'
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "Error" => $e
            ]);
        }

    }

    public function getsellerdata(){
        try{
            $wishlists = Product::where('user_id', auth()->user()->id)->get();
            $data = $wishlists->map(function($item){
                return [
                    'success' => true,
                    'message' => 'Data found',
                    'data' => [
                        'product' => [
                            'id' => $item->id,
                            'title' => $item->title,
                            'thumbnail' => $item->image,
                            'price' => $item->price,
                            'stock' => $item->stock,
                            'detail' => $item->detail
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

    public function update(Request $request, Product $product){
        try{
            $validatedData = $request->validate([
                'title' => 'required',
                'image' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'detail' => 'required'
            ]);        
    
            Product::where('id', $product->id)->update([            
                'title' => $validatedData['title'],
                'image' => $validatedData['image'],
                'price' => $validatedData['price'],
                'stock' => $validatedData['stock'],
                'detail' => $validatedData['detail'],
            ]);
    
            return response()->json([
                'success' => true,
                'message' =>  'Product updated successfully.'
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

    public function delete(Product $product){
        try{
            Product::destroy($product->id);
            return response()->json([
                'success' => true,
                'message' => 'Delete Successfully!',
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

    public function getalldata(){
        try{
            $products = Product::all();
            $data = $products->map(function($item){
                return [
                    'success' => true,
                    'message' => 'Data found',
                    'data' => [
                        'product' => [
                            'id' => $item->id,
                            'title' => $item->title,
                            'thumbnail' => $item->image,
                            'price' => $item->price,
                            'stock' => $item->stock,
                            'detail' => $item->detail
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
