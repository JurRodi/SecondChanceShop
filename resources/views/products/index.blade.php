@extends('layouts/app')

@section('content')
    <div class="mb-3">
        <a href="/products/create" class="btn btn-primary">Add product</a>
    </div>
    <div style="display: flex; flex-wrap:wrap;">
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
@endsection