<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap for the website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/product'))
            ->add(Url::create('/products'))
            ->add(Url::create('/brands'));

        // Tambahkan semua product (dinamis)
        foreach (\App\Models\Product::all() as $product) {
            $sitemap->add(Url::create('/product/' . $product->slug));
        }

        // Tambahkan semua brand product (dinamis)
        foreach (\App\Models\Brand::all() as $brand) {
            $sitemap->add(Url::create('/brand/product/' . $brand->slug));
        }

        // Tambahkan semua pricelist (dinamis)
        foreach (\App\Models\PricesList::all() as $pricelist) {
            $sitemap->add(Url::create('/price-list/' . $pricelist->slug));
        }

        // Tambahkan semua kategori produk (dinamis)
        $priceCategories = ['entry', 'mid', 'flagship'];
        foreach ($priceCategories as $category) {
            $sitemap->add(Url::create('/products/category/' . $category));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');
    }
}
