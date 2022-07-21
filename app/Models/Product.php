<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ['category'];

    public function category(){
        return $this->hasOne(\App\Models\Category::class, 'id', 'category_id');
    }

    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
