<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FavoriteProducts extends Component
{

    public $favorite;

    public $btn;

    public \App\Models\Product $product;

    public function mount()
    {
        if(Auth::check()){
            $this->favorite = \App\Models\FavoriteProduct::where('product_id', $this->product->id)->where('user_id', Auth::user()->id)->exists();
        }
        if ($this->favorite) {
            $this->btn = 'btn-warning';
        } else {
            $this->btn = 'btn-outline-warning';
        }
    }

    public function favorite()
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        if ($this->favorite != true) {
            $favorite = new \App\Models\FavoriteProduct;
            $favorite->product_id = $this->product->id;
            $favorite->user_id = Auth::user()->id;
            $favorite->save();
            $this->btn = 'btn-warning';
            $this->favorite = true;
        } else {
            $favorite = \App\Models\FavoriteProduct::where('product_id', $this->product->id)->where('user_id', Auth::user()->id)->first();
            if($favorite != null) {
                $favorite->delete();
                $this->btn = 'btn-outline-warning';
                $this->favorite = false;
            }
        }
    }

    public function render()
    {
        return view('livewire.favorite-products');
    }
}
