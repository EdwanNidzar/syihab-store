<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PricesList;
use App\Models\Product;
use App\Models\Brand;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

class LandingController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Syihab Store - Official Store');
        SEOTools::setDescription('TERBUKTI TERMURAH & TERLENGKAP');
        SEOTools::opengraph()->setUrl(url('/'));
        SEOTools::setCanonical(url('/'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOMeta::addKeyword(['Syihab Store', 'SyihabStore', 'Syihab', 'Syihab Store Official', 'Syihab Store Official Store']);

        return view('landing.index');
    }

    public function events()
    {
        SEOTools::setTitle('Syihab Store - Events');
        SEOTools::setDescription('Event Syihab Store');
        SEOTools::opengraph()->setUrl(url('/events'));
        SEOTools::setCanonical(url('/events'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOMeta::addKeyword(['Syihab Store', 'SyihabStore', 'Syihab', 'Syihab Store Official', 'Syihab Store Official Store']);
    
        return view('landing.event');
    }

    public function credits()
    {
        SEOTools::setTitle('Syihab Store - Simulasi Kredit');
        SEOTools::setDescription('Simulasi Kredit Syihab Store');
        SEOTools::opengraph()->setUrl(url('/credits'));
        SEOTools::setCanonical(url('/credits'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOMeta::addKeyword(['Syihab Store', 'SyihabStore', 'Syihab', 'Syihab Store Official', 'Syihab Store Official Store']);

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
        SEOTools::setTitle('Syihab Store - Produk');
        SEOTools::setDescription('Produk Syihab Store');
        SEOTools::opengraph()->setUrl(url('/product'));
        SEOTools::setCanonical(url('/product'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOMeta::addKeyword(['Syihab Store', 'SyihabStore', 'Syihab', 'Syihab Store Official', 'Syihab Store Official Store']);
        
        return view('landing.products');
    }

    public function products()
    {
        SEOTools::setTitle('Syihab Store - Semua Produk');
        SEOTools::setDescription('Semua Produk Syihab Store');
        SEOTools::opengraph()->setUrl(url('/products'));
        SEOTools::setCanonical(url('/products'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOMeta::addKeyword(['Syihab Store', 'SyihabStore', 'Syihab', 'Syihab Store Official', 'Syihab Store Official Store']);

        $products = Product::where('is_active', true)->latest()->get();

        return view('landing.allProducts', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        SEOTools::setTitle('Syihab Store - Produk ' .$product->name);
        SEOTools::setDescription('Produk Syihab Store');
        SEOTools::opengraph()->setUrl(url('/product/' . $product->name));
        SEOTools::setCanonical(url('/product/' . $slug));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOMeta::addKeyword(['Syihab Store', 'SyihabStore', 'Syihab', 'Syihab Store Official', 'Syihab Store Official Store']);


        return view('landing.product-detail', compact('product'));
    }

    public function brands()
    {
        SEOTools::setTitle('Syihab Store - Semua Brand');
        SEOTools::setDescription('Semua Brand Syihab Store');
        SEOTools::opengraph()->setUrl(url('/brands'));
        SEOTools::setCanonical(url('/brands'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOMeta::addKeyword(['Syihab Store', 'SyihabStore', 'Syihab', 'Syihab Store Official', 'Syihab Store Official Store']);

        $brands = Brand::withCount('products')->where('is_active', true)->get();

        return view('landing.allBrands', compact('brands'));
    }

    public function brandDetail($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $products = $brand->products()->where('is_active', true)->latest()->get();

        SEOTools::setTitle('Syihab Store - Brand ' . $brand->name);
        SEOTools::setDescription('Brand Syihab Store');
        SEOTools::opengraph()->setUrl(url('/brand/product/' . $brand->slug));
        SEOTools::setCanonical(url('/brand/product/' . $slug));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOMeta::addKeyword(['Syihab Store', 'SyihabStore', 'Syihab', 'Syihab Store Official', 'Syihab Store Official Store']);

        return view('landing.brand-detail', compact('brand', 'products'));
    }

    public function productsByCategory($category)
    {
        // Daftar kategori harga
        $priceCategories = [
            '1-jutaan' => ['min' => 1000000, 'max' => 1999999],
            '2-jutaan' => ['min' => 2000000, 'max' => 2999999],
            '3-jutaan' => ['min' => 3000000, 'max' => 3999999],
            '4-jutaan' => ['min' => 4000000, 'max' => 4999999],
            '5-jutaan' => ['min' => 5000000, 'max' => 5999999],
            'entry-level' => ['min' => 0, 'max' => 1999999],
            'midrange' => ['min' => 2000000, 'max' => 4999999],
            'flagship' => ['min' => 5000000, 'max' => 100000000]
        ];

        $products = \App\Models\Product::all()->filter(function ($product) use ($category, $priceCategories) {
            if (!is_array($product->variations)) {
                $variations = json_decode($product->variations, true);
            } else {
                $variations = $product->variations;
            }

            if (!$variations || !is_array($variations)) return false;

            // Ambil harga termurah
            $lowestPrice = collect($variations)->pluck('price')->min();

            // Cek jika kategori termasuk kategori harga
            if (array_key_exists($category, $priceCategories)) {
                $range = $priceCategories[$category];
                return $lowestPrice >= $range['min'] && $lowestPrice <= $range['max'];
            }

            // Kategori original
            return match ($category) {
                'entry' => $lowestPrice <= 4000000,
                'mid' => $lowestPrice > 4000000 && $lowestPrice <= 7000000,
                'flagship' => $lowestPrice > 7000000,
                default => false,
            };
        });

        // Untuk SEO, ubah judul jika kategori harga
        $categoryLabel = str_replace('-', ' ', $category);
        if (array_key_exists($category, $priceCategories)) {
            $categoryLabel = 'Harga ' . $categoryLabel;
        }

        SEOTools::setTitle('Syihab Store - Produk ' . $category);
        SEOTools::setDescription('Produk Syihab Store');
        SEOTools::opengraph()->setUrl(url('/products/category/' . $category));
        SEOTools::setCanonical(url('/products/category/' . $category));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOMeta::addKeyword(['Syihab Store', 'SyihabStore', 'Syihab', 'Syihab Store Official', 'Syihab Store Official Store']);
        
        return view('landing.productByCategory', [
            'category' => $categoryLabel, // Kirim label yang sudah diformat
            'products' => $products,
        ]);
    }


}
