@extends('layouts/app')

@section('content')
    <div class="mx-auto w-50 d-flex flex-column justify-content-between" style="height: 600px;">
        <div>
            @foreach ($messages as $message)
                @if($message->sender_id == Auth::user()->id)
                    <div class="d-flex align-items-center justify-content-end bg-info rounded mb-2 pe-2" style="height: 50px;">
                        <div style="max-width: 80%;">
                            <p class="mb-0">{{ $message->body }}</p>
                        </div>
                    </div>
                @else
                    <div class="d-flex align-items-center bg-light rounded mb-2 ps-2" style="height: 50px;">
                        @if($message->user->avatar == "avatar.svg")
                            <img src="{{ asset('storage/avatars/'.$message->user->avatar) }}" alt="{{ $message->user->name }}" class="img-fluid rounded-circle me-2" style="width: 40px; height: 40px;">
                        @else
                            <img src="{{ $message->user->avatar }}" alt="{{ $message->user->name }}" class="img-fluid rounded-circle me-2" style="width: 40px; height: 40px;">
                        @endif
                        <div class="" style="max-width: 80%;">
                            <p class="mb-0">{{ $message->body }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <form action="{{ url('messages/store/' .$message->user->id) }}" method="POST" class="w-100">
            @csrf
            <div>
                <div class="form-group">
                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control mt-3 mb-5">Send message</button>
                </div>
            </div>
        </form>
    </div>
@endsection