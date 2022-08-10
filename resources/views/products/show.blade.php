@extends('layouts/app')

@section('content')
    <div class="w-50 ms-5 mb-3 bg-light d-flex justify-content-center" style="height: 500px;"><img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid"></div>
    <div class="ms-5 w-50 d-flex justify-content-between">
        <div style="width: 70%;">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p>€ {{ $product->price }}</p>
            <h5>Category</h5>
            <p>{{ $product->category->name }}</p>
            <h5>Posted by</h5>
            <div class="mb-3">
                @if($product->user->avatar == "avatar.svg")
                    <img src="{{ asset('storage/avatars/'.$product->user->avatar) }}" alt="{{ $product->user->name }}" class="img-fluid rounded-circle me-2" style="width: 50px; height: 50px;">
                @else
                    <img src="{{ $product->user->avatar }}" alt="{{ $product->user->name }}" class="img-fluid rounded-circle me-2" style="width: 50px; height: 50px;">
                @endif
                <a href="/users/{{ $product->user_id }}">{{ $product->user->name }}</a>
            </div>
        </div>
        @if($product->user_id == \Auth::id())
            <div>
                <a href="/products/edit/{{ $product->id }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="/products/destroy/{{ $product->id }}" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @else
            <div>
                <form method="POST" action="/products/favorite/{{ $product->id }}" class="d-inline">
                    @method('POST')
                    @csrf
                    <button type="submit" class="btn btn-warning">Favorite</button>
                </form>
                <form method="POST" action="/products/bid/{{ $product->id }}" class="d-inline">
                    @method('POST')
                    @csrf
                    <button type="submit" class="btn btn-primary">Place bid</button>
                </form>
            </div>
        @endif
    </div>
@endsection