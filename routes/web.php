<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MessagesController;

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
Route::get('/products/create', [ProductsController::class, 'create'])->middleware('auth');
Route::post('/products/store', [ProductsController::class, 'store'])->middleware('auth');
Route::get('/products/{product}', [ProductsController::class, 'show']);
Route::get('/products/edit/{product}', [ProductsController::class, 'edit'])->middleware('auth');
Route::put('/products/update/{product}', [ProductsController::class, 'update'])->middleware('auth');
Route::delete('/products/destroy/{product}', [ProductsController::class, 'destroy'])->middleware('auth');
Route::get('/products/bid/{product}', [ProductsController::class, 'bid'])->middleware('auth');
Route::post('/messages/placebid/{product}', [MessagesController::class, 'placebid'])->middleware('auth');

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'verify']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/users/{user}', [UserController::class, 'index'])->middleware('auth');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/users/update/{user}', [UserController::class, 'update'])->middleware('auth');
Route::get('/users/favorites/{user}', [UserController::class, 'favorites'])->middleware('auth');

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', [MessagesController::class, 'index'])->middleware('auth');
    Route::get('create/{user}', [MessagesController::class, 'create'])->middleware('auth');
    Route::post('/store/{user}', [MessagesController::class, 'store'])->middleware('auth');
    Route::get('/show/{user}', [MessagesController::class, 'show'])->middleware('auth');
});

Route::get('location', [LocationController::class, 'index']);