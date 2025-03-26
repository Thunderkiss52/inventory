<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $product = Product::find($validatedData['product_id']);
            $validatedData['total_price'] = $product->price * $validatedData['quantity'];
            $validatedData['status'] = 'new';
            Order::create($validatedData);

            return redirect()->route('orders.index')->with('success', 'Order created successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }


    public function complete(Order $order)
    {
        if ($order->status == 'new') {
            $order->status = 'completed';
            $order->save();
            return redirect()->route('orders.show', $order)->with('success', 'Order status updated to completed.');
        }
        return redirect()->route('orders.show', $order)->with('error', 'Order status cannot be changed.');
    }
}
