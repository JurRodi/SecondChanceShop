<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductSearch extends Component
{

    public $search;
    public $products = [];

    public function search()
    {
        $this->products = \App\Models\Product::where('name', 'like', "%{$this->search}%")->take(8)->get();
        $this->products = \App\Models\Product::where('description', 'like', "%{$this->search}%")->take(8)->get();
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
