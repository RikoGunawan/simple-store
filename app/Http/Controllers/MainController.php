<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $products = Product::query();
        //Cek jika request memiliki parameter 'search'
        if ($request->has('search')) {
            //Mencari data berdasarkan nama yang mirip dengan parameter 'search'
            $products->where('name', 'like', "%{$request->search}%");
        }
        //Mengambil data produk dengan pagination 15 data per halaman berikut dengan
        $products = $products->paginate(15)->appends($request->only('search'));
        return view('main', compact('products'));
    }
}
