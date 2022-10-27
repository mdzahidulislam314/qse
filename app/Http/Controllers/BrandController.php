<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function allbrand()
    {
        $brands = Brand::all(['name','slug']);
        return view('all-brands')->with('brands', $brands);
    }

    public function show($slug)
    {
        $pagination = 30;

        if (request()->count){
            $pagination = request()->count;
        }

        $brand = Brand::where('slug', $slug)->first();

        $cat = null;

        $products = Product::where('brand_id', $brand->id)->latest();
        $categoryName = 'Shop Now';


        if (request()->sort == 'low_high') {
            $products = $products
                ->orderBy('price')
                ->orderBy('spacial_price')
                ->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products
                ->orderBy('price')
                ->orderBy('spacial_price')
                ->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('shop')->with([
            'products' => $products,
            'categoryName' => $categoryName,
            'cat' => $cat,
            'brand' => $brand,
        ]);
    }
}
