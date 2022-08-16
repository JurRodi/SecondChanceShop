@extends('layouts/app')

@section('content')
    <h3>Add new product</h3>

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
            <a href="/" class="">Back to products</a>
        @endcomponent
    @endif
    
    <form method="POST" action="{{ url('/products/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" placeholder="Enter name">
        </div>
        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input value="{{ old('price') }}" type="text" class="form-control" name="price" id="price" placeholder="Enter price">
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input value="{{ old('image') }}" type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group mb-3">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection