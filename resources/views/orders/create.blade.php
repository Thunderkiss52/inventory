@extends('layouts.app')

@section('content')
    <h1>Create Order</h1>
    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        <label for="customer_name">Customer Name</label>
        <input type="text" name="customer_name" required>
        @error('customer_name')
        <span>{{ $message }}</span>
        @enderror
        <label for="product_id">Product</label>
        <select name="product_id" required>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} ({{ number_format($product->price, 2) }})</option>
            @endforeach
        </select>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" min="1" required>
        @error('quantity')
        <span>{{ $message }}</span>
        @enderror
        <label for="comment">Comment</label>
        <textarea name="comment"></textarea>
        <button type="submit">Save</button>
    </form>
@endsection
