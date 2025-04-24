<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PricesList;
use App\Models\Product;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function events()
    {
        return view('landing.event');
    }

    public function credits()
    {
        return view('landing.credit');
    }

    public function priceList($slug)
    {
        $pricelists = PricesList::where('slug', $slug)->get();

        if ($pricelists->isEmpty()) {
            abort(404); // jika tidak ditemukan
        }

        return view('landing.pricelist', compact('pricelists'));
    }

    public function product()
    {
        return view('landing.products');
    }

    public function products()
    {
        $products = Product::where('is_active', true)->latest()->get();

        return view('landing.allProducts', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();


        return view('landing.product-detail', compact('product'));
    }
}
