<!-- resources/views/products/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Product: {{ $product->name }}</h1>
    <form action="{{ route('products.update', $product) }}" method="post">
        @csrf
        @method('put')
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
        <label for="category_id">Category</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <label for="description">Description</label>
        <textarea name="description">{{ $product->description }}</textarea>
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required>
        @error('price')
        <span>{{ $message }}</span>
        @enderror
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('products.index') }}">Back to list</a>
@endsection
