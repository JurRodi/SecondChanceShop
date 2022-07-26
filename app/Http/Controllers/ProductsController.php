<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){
        $products = DB::table('products')->orderBy('id', 'desc')->get();
        // $products = DB::table('products')->orderBy('id', 'desc')->paginate(10);
        // dd($products);
        $data['products'] = $products;
        return view('products/index', $data);
    }

    public function show(\App\Models\Product $product){
        $data['product'] = $product;
        return view('products/show', $data);
    }

    public function create(){
        $categories = DB::table('categories')->get();
        $data['categories'] = $categories;
        return view('products/create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|string',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);

        $product = new \App\Models\Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $request->image->store('images', 'public');
        $product->category_id = $request->category_id;
        $product->save();

        $request->flash('message', 'Product created successfully!');

        return redirect('/');
    }

    public function edit(\App\Models\Product $product){
        $data['product'] = $product;
        return view('products/edit', $data);
    }

    public function destroy(\App\Models\Product $product){
        $product->delete();
        return redirect('/products');
    }
}
