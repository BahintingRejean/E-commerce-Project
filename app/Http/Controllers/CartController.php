<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Constructor to require authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show cart contents
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart-view', compact('cartItems', 'total'));
    }

    public function getCartItemCount()
    {
        return Cart::where('user_id', Auth::id())->sum('quantity');
    }
    
    // Add item to cart
    public function add(Product $product)
    {
        $user = Auth::user();

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('products.index')
            ->with('success', 'Product added to cart!');
    }

    // Update cart item quantity
    public function update(Cart $cart, $quantity)
    {
        if ($quantity > 0) {
            $cart->quantity = $quantity;
            $cart->save();
            return response()->json([
                'message' => 'Cart updated successfully',
                'quantity' => $cart->quantity,
                'total' => $cart->quantity * $cart->product->price
            ]);
        } else {
            $cart->delete();
            return response()->json([
                'message' => 'Item removed from cart'
            ]);
        }
    }

    // Remove item from cart
    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')
            ->with('success', 'Item removed from cart!');
    }

    // Clear entire cart
    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('cart.index')
            ->with('success', 'Cart cleared successfully!');
    }
}
