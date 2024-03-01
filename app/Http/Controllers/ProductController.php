<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Dashboard');
    }

    /**
     * Display a listing of the resource on the main page.
     */
    public function home()
    {
        $cart = Session::get('shop.cart');
        return Inertia::render('Home', [
            'entities' => Product::query()->paginate(12),
            'cart' => $cart,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
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
     * Display a shop cart.
     */
    public function cart()
    {
        $cart = Session::get('shop.cart');
        return Inertia::render('Cart', [
            'cart' => $cart,
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'entity_id' => 'nullable|integer',
            'quantity' => 'nullable|integer|max:100',
        ]);

        $product = Product::query()->findOrFail($request->input('entity_id'));

        $product->cart_quantity = $request->input('quantity');

        Session::push('shop.cart', $product->toArray());

        return back()->with('status','test');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
