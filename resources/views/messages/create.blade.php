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
        <h1>Create a new message</h1>
        <form action="{{ url('messages/store/' .$user->id) }}" method="POST" class="w-100">
            @csrf
            <div>
                <div class="form-group">
                    <h5>To {{ $user->name }}</h5>
                </div>

                <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control mt-3">Send message</button>
                </div>
            </div>
        </form>
    </div>
@endsection