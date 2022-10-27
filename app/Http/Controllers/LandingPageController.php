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
        $featureProducts = Product::with(['productAltImages','reviews'])
            ->where('featured', true)
            ->where('new_arrival', true)
            ->where('hot_deal', true)
            ->active()
            ->inRandomOrder()
            ->take(10)
            ->get(['slug','image','id','spacial_price','price','name']);
        $newArrivalPro = Product::with(['productAltImages','reviews'])
            ->where('new_arrival', true)
            ->active()
            ->inRandomOrder()
            ->take(10)
            ->get(['slug','image','id','spacial_price','price','name']);

        $hotDealPro = Product::with(['productAltImages','reviews'])
            ->where('hot_deal', true)
            ->active()
            ->inRandomOrder()
            ->take(10)
            ->get(['slug','image','id','spacial_price','price','name']);
        $banners = Banner::where('status', true)->orderBy('orders', 'ASC')->take(5)->get();
        $brands = Brand::where('status', true)->latest()->get(['image']);
        $blogs = Blog::where('is_active', true)->latest()->take(10)->get(['slug','image','title','created_at']);

        $sliders = Slider::where('status', true)->orderBy('orders', 'ASC')->take(7)->get(['image_url','open_new_tab','image']);
        $flashDeal  = Flashdeal::where('is_active', true)->where('is_feature', true)->first(['start_date','end_date','slug']);
        //category show
        $showHomepageCat = Category::where('status', true)->showhomepage()->take(6)->get(['name','id','slug']);
        $products_data = [];

        foreach ($showHomepageCat as $cat){
            $products = Product::where('category_id', $cat->id)->take(10)->get();
            $single = [
                'category' => $cat,
                'products' => $products
            ];
            array_push($products_data, $single);
        }

        $data = [
          'featureProducts' => $featureProducts,
          'newArrivalPro' => $newArrivalPro,
          'hotDealPro' => $hotDealPro,
          'banners' => $banners,
            'brands' => $brands,
            'products_data' => $products_data,
            'sliders' => $sliders,
            'blogs' => $blogs,
            'flashDeal' => $flashDeal,
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
