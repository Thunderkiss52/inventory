@extends('layouts.app')

@section('content')
<h1>Orders</h1>
<a href="{{ route('orders.create') }}">Create Order</a>
<table>
    <tr>
        <th>ID</th>
        <th>Creation Date</th>
        <th>Customer Name</th>
        <th>Status</th>
        <th>Total Price</th>
        <th>Actions</th>
    </tr>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->created_at }}</td>
        <td>{{ $order->customer_name }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ number_format($order->total_price, 2) }}</td>
        <td>
            <a href="{{ route('orders.show', $order) }}">View</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
