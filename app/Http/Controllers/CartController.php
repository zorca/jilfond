<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class CartController extends Controller
{

    /**
     * Display a shopping cart with all items.
     */
    public function index()
    {
        $cart = Session::get('shop.cart');
        return Inertia::render('Cart', [
            'cart' => $cart,
        ]);
    }


    /**
     * Add item with quantity to cart
     */
    public function add(Request $request)
    {
        $request->validate([
            'entity_id' => 'nullable|integer',
            'quantity' => 'nullable|integer|max:100',
        ]);

        $entityId = $request->input('entity_id');
        $quantity = $request->input('quantity');

        $product = Product::query()->findOrFail($entityId);
        $product->quantity = $quantity;
        $cartItem = $product->toArray();

        $cart = Session::get('shop.cart', []);

        if (! array_key_exists($entityId, $cart)) {
            $cart[$entityId] = $cartItem;
        } else {
            foreach ($cart as $index => $item) {
                if ($index === $entityId) {
                    $cart[$entityId]['quantity'] += $quantity;
                }
            }
        }

        Session::put('shop.cart', $cart);

        return back()->with('status','test');
    }
}
