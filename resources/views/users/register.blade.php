@extends('layouts/app')

@section('content')
    <form method="post" action="{{ url('/register') }}">
        @csrf
        <h2>Register</h2>

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

        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" placeholder="Enter name">
        </div>
        <div class="form-group mb-2">
            <label for="email">Email address</label>
            <input value="{{ old('email') }}" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group mb-2">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Regsiter</button>
        </div>
        <div>
            <label>Already have an account?</label>
            <a href="/login" >Log in here</a>
        </div>
    </form>
@endsection