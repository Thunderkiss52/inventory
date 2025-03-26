@extends('layouts.app')

@section('content')
    <h1>Order #{{ $order->id }}</h1>
    <p>Customer Name: {{ $order->customer_name }}</p>
    <p>Creation Date: {{ $order->created_at }}</p>
    <p>Status: {{ $order->status }} </p>
    <p>Comment: {{ $order->comment ?? 'No comment' }}</p>
    <p>Product: {{ $order->product->name }}</p>
    <p>Quantity: {{ $order->quantity }}</p>
    <p>Total Price: {{ number_format($order->total_price, 2) }}</p>
    @if(trim($order->status) == 'new')
        <form action="{{ route('orders.complete', $order) }}" method="POST">
            @method('patch')
            @csrf
            <button type="submit">Mark as Completed</button>
        </form>
    @endif
@endsection
