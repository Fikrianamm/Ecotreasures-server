<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    protected function getuser(){
        $user = auth()->user();
        return $user;
    }

    public function create(Request $request){        
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'detail' => 'required'
        ]);

        Products::create([
            'user_id' => getuser()->id,
            'title' => $validatedData['title'],
            'image' => $validatedData['image'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'detail' => $validatedData['detail'],
        ]);

        return response()->json([
            'success' => true,
            'message' =>  'Product created successfully.'
        ], 201);
    }

    public function getsellerdata(){
        $wishlists = Products::where('user_id', getuser()->id)->get();
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

        return response()->json($data, 201);
    }

    public function update(Request $request, Products $product){        
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'detail' => 'required'
        ]);

        Products::where('id', $product->id)->update([            
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

    public function delete(Products $product){
        Products::destroy($product);
        return response()->json([
            'success' => true,
            'message' => 'Delete Successfully!',
        ], 201);
    }

    public function getalldata(){
        $products = Products::all();
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

        return response()->json($data, 201);
    }
}
