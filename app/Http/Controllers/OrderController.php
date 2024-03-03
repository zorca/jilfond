<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use Illuminate\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Orders', [
            'entities' => Order::query()->with('items')->paginate(3),
            'sum' => Order::query()->sum('sum'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $cart = Session::get('shop.cart');

        $quantity = 0;
        $sum = 0;
        foreach ($cart as $index => $item) {
            $cart[$index]['sum'] = $cart[$index]['quantity'] * $cart[$index]['price'];
            $quantity += $cart[$index]['quantity'];
            $sum += $cart[$index]['sum'];
        }

        if (! $cart) {
            return back();
        }

        $order = Order::query()->create([
            'quantity' => $quantity,
            'sum' => $sum,
        ]);
        $order->items()->createMany($cart, ['id']);

        Session::forget('shop.cart');

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
