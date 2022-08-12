@extends('layouts/app')

@section('content')
    <div style="display: flex; flex-wrap:wrap;">
        @if($products->count() > 0)
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
        @else
            <h3 class="mx-auto mt-5">No favorite products yet</h3>
        @endif
    </div>
@endsection