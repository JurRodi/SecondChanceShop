@extends('layouts/app')

@section('content')
    <div class="d-flex w-100 mt-5 justify-content-around">
        <div class="d-flex">
            <img src="{{ asset('storage/avatars/'.$user->avatar) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle me-4" style="width: 100px; height: 100px;">
            <p class="mt-3">{{ $user->name }}</p>
        </div>
        <div>
            
        </div>
    </div>
@endsection