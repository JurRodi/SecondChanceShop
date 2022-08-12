@extends('layouts/app')

@section('content')
    <div class="d-flex w-100 mt-5 justify-content-around">
        <div class="d-flex" style="width: 35%;">
            @if($user->avatar == "avatar.svg")
                <img src="{{ asset('storage/avatars/'.$user->avatar) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle me-4" style="width: 100px; height: 100px;">
            @else
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="img-fluid rounded-circle me-4" style="width: 100px; height: 100px;">
            @endif
            <h5 class="mt-3">{{ $user->name }}</h5>
        </div>
        <div>
            @if(\Auth::user() && \Auth::user()->id == $user->id)
                <a href="/users/edit/{{ $user->id }}" class="btn btn-primary">Edit</a>
            @else
                <a href="/messages/create/{{ $user->id }}" class="btn btn-primary">Send message</a>
            @endif
        </div>
    </div>
    <div class="mt-5">
        <div class="d-flex flex-wrap justify-content-between">
            @foreach($products as $product)
                @component('components/card')
                    @slot('image')
                        {{ $product->image }}
                    @endslot
                    @slot('name')
                        {{ $product->name }}
                    @endslot
                    @slot('description')
                        {{ $product->description }}
                    @endslot
                    @slot('id')
                        {{ $product->id }}
                    @endslot
                @endcomponent
            @endforeach
        </div>
    </div>
@endsection