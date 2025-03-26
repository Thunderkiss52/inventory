@extends('layouts.app')

@section('content')
    <h1>Product: {{ $product->name }}</h1>
    <p>Price: {{ number_format($product->price, 2) }} руб.</p>
    <p>Category: {{ $product->category->name }}</p>
    <p>Description: {{ $product->description ?? 'No description' }}</p>
    <a href="{{ route('products.index') }}">Back to list</a>
@endsection
