<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PricesList;
use App\Models\Product;
use App\Models\Brand;

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

    public function brands()
    {
        $brands = Brand::withCount('products')->where('is_active', true)->get();

        return view('landing.allBrands', compact('brands'));
    }

    public function brandDetail($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $products = $brand->products()->where('is_active', true)->latest()->get();

        return view('landing.brand-detail', compact('brand', 'products'));
    }

    public function productsByCategory($category)
    {
        $products = \App\Models\Product::all()->filter(function ($product) use ($category) {
            if (!is_array($product->variations)) {
                $variations = json_decode($product->variations, true);
            } else {
                $variations = $product->variations;
            }

            if (!$variations || !is_array($variations)) return false;

            // Ambil harga termurah
            $lowestPrice = collect($variations)->pluck('price')->min();

            return match ($category) {
                'entry' => $lowestPrice <= 4000000,
                'mid' => $lowestPrice > 4000000 && $lowestPrice <= 7000000,
                'flagship' => $lowestPrice > 7000000,
                default => false,
            };
        });

        return view('landing.productByCategory', [
            'category' => $category,
            'products' => $products,
        ]);
    }


}
