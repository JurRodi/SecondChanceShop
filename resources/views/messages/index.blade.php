@extends('layouts/app')

@section('content')
    <div>
        @if($messages->count() > 0)
            @foreach ($messages as $message)
                <div class="media w-50 mx-auto mt-5 mb-3 pb-3 px-3 border-bottom">
                    <a class="pull-left text-decoration-none text-secondary d-flex justify-content-between" href="/messages/show/{{ $message->user->id }}">
                        <div class="d-flex" style="width: 70%">
                            <div class="d-flex align-items-center">
                                @if($message->user->avatar == "avatar.svg")
                                    <img src="{{ asset('storage/avatars/'.$message->user->avatar) }}" alt="{{ $message->user->name }}" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                                @else
                                    <img src="{{ $message->user->avatar }}" alt="{{ $message->user->name }}" class="img-fluid rounded-circle me-2" style="width: 50px; height: 50px;">
                                @endif
                            </div>
                            <div class="ms-3 d-flex flex-column" style="max-width: 100%;">
                                <h5 class="media-heading">{{ $message->user->name }}</h5>
                                <p>{{ $message->body }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <small>Posted {{ $message->created_at }}</small>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <h3 class="mx-auto mt-5">No messages yet</h3>
        @endif
    </div>
@endsection