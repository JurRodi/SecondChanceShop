@extends('layouts/app')

@section('content')
    <h1>Products</h1>

    <div class="container" style="display: flex; flex-wrap:wrap;">
    @foreach($products as $product)
        <div class="card container-sm" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <a href="/products/{{ $product->id }}" class="btn btn-primary">Show</a>
            </div>
        </div>
    @endforeach
    </div>
@endsection