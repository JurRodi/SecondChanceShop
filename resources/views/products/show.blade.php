@extends('layouts/app')

@section('content')

    @if($errors->any())
        @component('components/alert')
            @slot('type')
                danger
            @endslot
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        @endcomponent
    @endif

    <div class="mx-auto w-50 mb-3 bg-light d-flex justify-content-center" style="height: 500px;"><img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid"></div>
    <div class="mx-auto w-50 d-flex justify-content-between">
        <div style="width: 70%;">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p>€ {{ $product->price }}</p>
            <h5>Category</h5>
            <p>{{ $product->category->name }}</p>
            <h5>Posted by</h5>
            <div class="mb-3">
                <img src="{{ $product->user->avatar }}" alt="{{ $product->user->name }}" class="img-fluid rounded-circle me-2" style="width: 50px; height: 50px;">
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
                <livewire:favorite-products :product="$product" />
                <a href="/products/bid/{{ $product->id }}" class="btn btn-primary">Place bid</a>
            </div>
        @endif
    </div>
@endsection