<?php

namespace App\Http\Controllers;

use App\Models\AccessoriesSet;
use App\Models\Bracelet;
use App\Models\CartItem;
use App\Models\Earring;
use App\Models\Necklace;
use App\Models\Product;
use App\Models\Ring;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        $sets = AccessoriesSet::all();
        $rings = Ring::all();
        $necklaces = Necklace::all();
        $bracelets = Bracelet::all();
        $earrings = Earring::all();
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart.');
        }

        $cartItems = CartItem::where('user_id', auth()->id())->get();
        $total = 0;
        foreach ($cartItems as $item) {
            if ($item->product) {  // تحقق من وجود المنتج
                $total += $item->product->price * $item->quantity;
            }
        }


        return view('front.cart', compact('cartItems', 'total', 'sets', 'rings', 'necklaces', 'bracelets', 'earrings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'product_type' => 'required|string|in:ring,bracelet,necklace,earring,set'
        ]);

        $user = auth()->user();

        $cartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->where('product_type', $request->product_type)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'product_type' => $request->product_type,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('front.index')->with('success', 'Product added to cart.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::findOrFail($id);

        if ($cartItem->user_id !== auth()->id()) {
            abort(403);
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('front.cart.index')->with('success', 'Cart updated.');
    }

    public function destroy($id)
    {
        $cartItem = CartItem::findOrFail($id);

        if ($cartItem->user_id !== auth()->id()) {
            abort(403);
        }

        $cartItem->delete();

        return redirect()->route('front.cart.index')->with('success', 'Item removed from cart.');
    }
}
