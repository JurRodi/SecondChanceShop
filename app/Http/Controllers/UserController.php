<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index($id){
        $user = DB::table('users')->where('id', $id)->first();
        $data['user'] = $user;
        $products = DB::table('products')->where('user_id', $id)->get();
        $data['products'] = $products;
        return view('users/index', $data);
    }

    public function register(){
        return view('users/register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/');
    }

    public function login(){
        return view('users/login');
    }

    public function verify(Request $request){
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                return redirect('/');
            }
        }
        return redirect('/login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function edit(\App\Models\User $user){
        $data['user'] = $user;
        return view('users/edit', $data);
    }

    public function update(Request $request, \App\Models\User $user){
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user->name = $request->name;
        if($request->hasFile('image')){
            $url = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
            $user->avatar = $url;
        }
        $user->save();
        $request->flash();
        $request->session()->flash('message', 'Profile updated successfully!');
        return redirect('/users/edit/'.$user->id);
    }

    public function favorites(\App\Models\User $user){
        $data['user'] = $user;
        $favorites = DB::table('favorite_products')->where('user_id', $user->id)->get();
        $products = DB::table('products')->whereIn('id', $favorites->pluck('product_id'))->get();
        $data['products'] = $products;
        return view('users/favorites', $data);
    }
    
}
