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
    <div class="mx-auto w-50">
        <h1>Place a bid on {{ $product->name }}</h1>
        <form action="{{ url('messages/placebid/' .$product->id) }}" method="POST" class="w-100">
            @csrf
            <div>
                <div class="form-group">
                    <h5>From {{ $product->user->name }}</h5>
                </div>

                <div class="form-group mb-3">
                    <label for="bid">bid</label>
                    <input value="{{ old('bid') }}" type="text" class="form-control" name="bid" id="bid" placeholder="Enter bid">
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Place bid</button>
                </div>
            </div>
        </form>
    </div>
@endsection