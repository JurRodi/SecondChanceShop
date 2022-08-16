<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function index(){
        $id = Auth::id();
        $messages = DB::table('messages')->where('reciever_id', $id)->get();
        $messages = $messages->unique('reciever_id');
        foreach($messages as $message){
            if($message->sender_id == $id){
                $message->user = DB::table('users')->where('id', $message->reciever_id)->first();
            }else{
                $message->user = DB::table('users')->where('id', $message->sender_id)->first();
            }
        }
        $data['messages'] = $messages;
        return view('messages/index', $data);
    }

    public function create($id){
        $user = DB::table('users')->where('id', $id)->first();
        $data['user'] = $user;
        return view('messages/create', $data);
    }

    public function store(Request $request, $id){
        $request->validate([
            'message' => 'required',
        ]);
        
        $message = new \App\Models\Message();
        $message->sender_id = Auth::user()->id;
        $message->reciever_id = $id;
        $message->body = $request->message;
        $message->save();
        return redirect('/messages/show/' . $id);
    }

    public function show($id){
        $messages = DB::table('messages')->where('sender_id', $id)->where('reciever_id', Auth::user()->id)->orWhere('reciever_id', $id)->where('sender_id', Auth::user()->id)->get();
        foreach($messages as $message){
            $message->user = DB::table('users')->where('id', $id)->first();
        }
        $data['messages'] = $messages;
        return view('messages/show', $data);
    }
    
    public function placebid(Request $request, \App\Models\Product $product){
        $request->validate([
            'bid' => 'required|string',
        ]);
        $message = new \App\Models\Message();
        $message->sender_id = Auth::user()->id;
        $message->reciever_id = $product->user_id;
        $message->body = Auth::user()->name . " has placed a bid of €" . $request->bid . " on " . $product->name . ".";
        $message->save();
        return redirect('/messages/show/'.$product->user_id);
    }
}