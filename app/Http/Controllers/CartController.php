<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Auth::user()->products;
        return view('cart', compact('products'));
    }

    public function addToCart(Product $product, Request $request)
{
    $user = Auth::user();
    if ($user->products->contains($product)) {
        $user->products()->updateExistingPivot($product, [
            'quantity' => $user->products->find($product)->pivot->quantity + ($request->quantity ?? 1)
        ]);
    } else {
        $user->products()->attach($product, ['quantity' => $request->quantity ?? 1]);
    }
    return redirect()->route('cart.index');
}

    //IDE Helper Generator for Laravel belum terpasang makanya error
    public function removeFromCart(Product $product)
    {
        $user = Auth::user();
        $user->products()->detach($product);
        return redirect()->route('cart.index');
    }
}
