<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    $products = DB::table('products')->get();
    $data['products'] = $products;
    return view('products/index', $data);
});

Route::get('/users', function () {
    $users = DB::table('users')->get();
    $data['users'] = $users;
    return view('users/index', $data);
});