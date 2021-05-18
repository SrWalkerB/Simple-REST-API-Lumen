<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{

    public function index(){

        return Product::all(); 
    }

    public function store(Request $request){

       $data = [
            "name" => $request->json("name"),
            "description" => $request->json("description"),
            "price" => $request->json("price"),
            "stock" => $request->json("stock")
        ];
 
        //Product::create($request->all()); Alternative
        Product::create($data);

        return $data;
    }

    public function show($id){

        $data = Product::find($id);
        return response()->json($data);
    }

    public function update($id){

        return $id;
    }

    public function delete($id){

        $product = Product::find($id);
                
        if(!$product){
            return response()->json([
                "message" => "product not found"
            ]);
        }

        $product->delete();

        return response()->json([
            "message" => "delete"
        ]);
    }   
}

?>