@extends('layouts/app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <a href="/users/{{ $product->user_id }}">{{ $product->user->name }}</a>

    <h3>Category</h3>
    <p>{{ $product->category->name }}</p>

    @component('components/alert')
        @slot('type')
            success
        @endslot
        @slot('slot')
            Succes!
        @endslot
    @endcomponent

@endsection