@extends('layouts/app')

@section('content')
    <form method="post" action="{{ url('/login') }}">
        @csrf
        <h2>Log in</h2>

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
            <label for="email">Email address</label>
            <input value="{{ old('name') }}" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Log in</button>
        </div>
        <div>
            <label>No account?</label>
            <a href="/register" >Sign up here</a>
        </div>
    </form>
@endsection