<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
