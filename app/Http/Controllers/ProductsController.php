<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index(){
        $products = DB::table('products')->orderBy('id', 'desc')->get();
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
        if($request->hasFile('image')){
            $url = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $product->image = $url;
        }
        $product->category_id = $request->category_id;
        $product->user_id = Auth::user()->id;
        $product->save();

        $request->flash();
        $request->session()->flash('message', 'Product created successfully!');
        return redirect('/products/create');
    }

    public function edit(\App\Models\Product $product){
        $categories = DB::table('categories')->get();
        $data['product'] = $product;
        $data['categories'] = $categories;
        return view('products/edit', $data);
    }

    public function update(Request $request, \App\Models\Product $product){
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|string',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        if($request->hasFile('image')){
            $url = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $product->image = $url;
        }
        $product->category_id = $request->category_id;
        $product->save();

        $request->flash();
        $request->session()->flash('message', 'Product updated successfully!');
        return redirect('/products/edit/'.$product->id);
    }

    public function destroy($id){
        $product = \App\Models\Product::where('id', $id)->first();
        $product->delete();
        return redirect('/');
    }
}
