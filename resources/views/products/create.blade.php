@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" required>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
        <label for="category_id">Category</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="description">Description</label>
        <textarea name="description"></textarea>
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" required>
        @error('price')
        <span>{{ $message }}</span>
        @enderror
        <button type="submit">Save</button>
    </form>
@endsection
