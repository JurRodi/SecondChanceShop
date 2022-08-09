<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductSearch extends Component
{

    public $search;
    public $products = [];

    public function mount()
    {
        $this->products = \App\Models\Product::where('name', 'like', '%' . 'nin' . '%')->get();
    }

    public function search()
    {
        $this->products = \App\Models\Product::where('name', 'like', "%{$this->search}%")->take(8)->get();
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
