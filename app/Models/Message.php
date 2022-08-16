<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $with = ['user'];

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function reciever(){
        return $this->hasOne(User::class, 'id', 'reciever_id');
    }
}
