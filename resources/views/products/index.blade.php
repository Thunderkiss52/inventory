@extends('layouts.app')

@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}">Create Product</a>
<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ number_format($product->price, 2) }}</td>
        <td>{{ $product->category->name }}</td>
        <td>
            <a href="{{ route('products.show', $product) }}">View</a>
            <a href="{{ route('products.edit', $product) }}">Edit</a>
            <form action="{{ route('products.destroy', $product) }}" method="post">
                @method('delete')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
