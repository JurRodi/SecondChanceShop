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

    @if($flash = session('message'))
        @component('components/alert')
            @slot('type')
                success
            @endslot
            {{ $flash }}
            <a href="/users/{{ $user->id }}" class="">Back to Profile</a>
        @endcomponent
    @endif

    <div class="d-flex w-100 mt-5 justify-content-around">
        <div class="d-flex" style="width: 35%;">
            @if($user->avatar == "avatar.svg")
                <img src="{{ asset('storage/avatars/'.$user->avatar) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle me-4" style="width: 100px; height: 100px;">
            @else
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="img-fluid rounded-circle me-4" style="width: 100px; height: 100px;">
            @endif
            <form method="POST" action="/users/update/{{ $user->id }}" enctype="multipart/form-data">
                @method('PUT')    
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input value="{{ old('name' , $user->name) }}" type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
                <div class="form-group mb-3">
                    <label for="image">Profile picture</label>
                    <input value="{{ old('image' , $user->image) }}" type="file" class="form-control" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        <div>
            <a href="/users/{{ $user->id }}" class="btn btn-dark">Go back</a>
        </div>
    </div>
@endsection