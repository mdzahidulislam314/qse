<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pagination = 30;

        if (request()->count){
            $pagination = request()->count;
        }

        $categories = Category::all();
        $brands = Brand::where('status', 1)->get();
        $cat = null;

        if (request()->category) {
            // get category by slug
            $cat = Category::where('slug', request()->category)->first();
            if($cat === null) {
                return view('shop')->with([
                    'categories' => $categories,
                    'cat_not_found' => true,
                ]);
            }
            $products = Product::with('category')->where('category_id', $cat->id);
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::with('category')->where('is_enable', true);
            $categoryName = 'Shop Now';
        }

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
            'categories' => $categories,
            'categoryName' => $categoryName,
            'cat' => $cat,
            'brands' => $brands,
            'brand' => null,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::with('category','brand')->where('slug', $slug)->firstOrFail();

//        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();
        $relatedProduct = Product::where('category_id', $product->category_id)->where('id','!=',$product->id)->orderBy('id','DESC')->get();

        $stockLevel = getStockLevel($product->quantity);

        $reviews = $product->reviews;

        $userId = (auth('customer')->user() ? auth('customer')->user()->id : '');

        $canReview = true;

        foreach ($reviews as $review){
            if ($review->customer_id == $userId){
                $canReview = false;
            }
        }

        $sizes = null;
        if ($product->sizes && $product->sizes !== '') {
            $sizesStr = trim($product->sizes);
            $sizesStr = rtrim(ltrim($sizesStr));
            $sizes = explode(",", $sizesStr);
        }

        $colors = null;
        if ($product->colors && $product->colors !== '') {
            $colorStr = trim($product->colors);
            $colorStr = rtrim(ltrim($colorStr));
            $colors = explode(",", $colorStr);
        }

        return view('products.product-details')->with([
            'product' => $product,
            'stockLevel' => $stockLevel,
            'relatedProduct' => $relatedProduct,
            'reviews' => $reviews,
            'canReview' => $canReview,
            'sizes' => $sizes,
            'colors' => $colors,
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');

         $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('details', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->paginate(50);

         $data = [
           'products' => $products,
         ];

        /*$products = Product::search($query)->paginate(10);*/ // this is using laravel scout

        return view('search-results',$data);
    }

    public function searchAlgolia(Request $request)
    {
        return view('search-results-algolia');
    }

    public function serachResult(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $query = $request->search;

        $searchResult = Product::where('name', 'like', "%$query%")
            ->orWhere('details', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->take(5)->get();

        return view('ajax-search',compact('searchResult'));
    }
}
