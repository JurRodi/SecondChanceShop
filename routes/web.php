<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductsController;

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

Route::get('/', [ProductsController::class, 'index']);
Route::get('/products/{product}', [ProductsController::class, 'show']);

// Route::get('/users/{user}', function () {
//     $user = DB::table('users')->where('id', 2)->first();
//     $data['user'] = $user;
//     return view('users/index', $data);
// });

Route::get('/users/{user}', [UserController::class, 'user']);