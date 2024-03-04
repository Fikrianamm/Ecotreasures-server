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
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'detail' => 'required'
        ]);

        $priceInt = intval($validatedData['price']);
        $stockInt = intval($validatedData['stock']);

        try{
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
        $wishlists = Product::where('user_id', auth()->user()->id)->get();
        $data = $wishlists->map(function($item){
            return [
                'success' => true,
                'message' => 'Data found',
                'data' => [                    
                    'id' => $item->id,
                    'title' => $item->title,
                    'thumbnail' => $item->image,
                    'price' => $item->price,
                    'stock' => $item->stock,
                    'detail' => $item->detail
                ],
            ];
        });

        return response()->json($data, 200);
    }

    public function update(Request $request, Product $product){        
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
        ], 201);
    }

    public function delete(Product $product){
        Product::destroy($product->id);
        return response()->json([
            'success' => true,
            'message' => 'Delete Successfully!',
        ], 201);
    }

    public function getalldata(){
        $products = Product::all();
        $data = $products->map(function($item){
            return [
                'success' => true,
                'message' => 'Data found',
                'data' => [                    
                    'id' => $item->id,
                    'title' => $item->title,
                    'thumbnail' => $item->image,
                    'price' => $item->price,
                    'stock' => $item->stock,
                    'detail' => $item->detail
                ],
            ];
        });

        return response()->json($data, 200);
    }
}
