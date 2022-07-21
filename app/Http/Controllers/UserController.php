<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function user(){
        $user = DB::table('users')->where('id', 1)->first();
        $data['user'] = $user;
        return view('users/index', $data);
    }
}
