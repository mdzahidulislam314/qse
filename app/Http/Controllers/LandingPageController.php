<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Blog;
use App\Brand;
use App\Category;
use App\Flashdeal;
use App\Flashsell;
use App\Product;
use App\ProductImage;
use App\Services\SettingsService;
use App\Settings;
use App\Slider;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::where('status', true)->latest()->get(['image']);
        $blogs = Blog::where('is_active', true)->latest()->take(10)->get(['slug','image','title','created_at']);

        $sliders = Slider::where('status', true)->take(6)->get();

        $data = [
            'brands' => $brands,
            'sliders' => $sliders,
            'blogs' => $blogs,
        ];
        return view('landing-page',$data);
    }

    public function loadMorePro(Request $request)
    {
       if ($request->ajax()){

           if ($request->id){
                $data = Product::active()->where('id', '>' , $request->id)->limit(24)->get();
           }else{
               $data = Product::active()->orderBy('id', 'asc')->limit(24)->get();
           }

           return view('load-more-pro',compact('data'));
       }
    }

    public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);

        $color = $product->colors;
        $product_color = explode(',', $color);

        $size = $product->sizes;
        $product_size = explode(',', $size);

        $images = json_decode($product->images);
        $price = presentPrice($product->price);
        $spacial_price = presentPrice($product->spacial_price);
        return response()->json(array(
            'products' => $product,
            'color' => $product_color,
            'size' => $product_size,
            'images' => $images,
            'price' => $price,
            'spacial_price' => $spacial_price
        ));

    }
}
