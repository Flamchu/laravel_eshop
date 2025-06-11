<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['product']->price * $item['quantity'];
        }

        return view('shop.cart', compact('cart', 'total'));
    }

    public function add(Product $product, Request $request)
    {
        $quantity = (int) $request->input('quantity', 1);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'product' => $product,
                'quantity' => $quantity
            ];
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Product successfully added.');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        unset($cart[$product->id]);

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Product removed.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart emptied.');
    }
}
