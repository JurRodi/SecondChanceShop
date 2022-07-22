<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($id){
        $user = DB::table('users')->where('id', $id)->first();
        $data['user'] = $user;
        return view('users/index', $data);
    }
}
