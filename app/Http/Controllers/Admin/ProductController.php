<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\CampaignProduct;
use App\Category;
use App\FlashDealProduct;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Session;

class ProductController extends Controller
{

    public function index()
    {
        if (Session::has('pro_alt_temp_img')) {
            Session::forget('pro_alt_temp_img');
        }
        $files = glob('uploads/products/alt-img/temp/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file); //delete file
            }
        }
        $products = Product::latest()->get();
        return view('admin.products.index')->with('products', $products);
    }

    public function create()
    {
        $categories = Category::parents()->get();

        if (Session::has('pro_alt_temp_img')) {
            Session::forget('pro_alt_temp_img');
        }
        $files = glob('uploads/products/alt-img/temp/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file); //delete file
            }
        }

        $brands = Brand::all();
        $data = [
            'categories' => $categories,
            'brands' => $brands,
        ];
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $mathcSlugCount = Product::where('slug', Str::slug($request->name))->count();

        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        if ($mathcSlugCount > 0) {
            $product->slug = Str::slug($request->name . '+' . '-' . Str::random());
        } else {
            $product->slug = Str::slug($request->name);
        }
        $product->details = $request->details;
        $product->video_link = $request->video_link;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->spacial_price = $request->spacial_price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->pro_new_from = $request->pro_new_from;
        $product->pro_new_to = $request->pro_new_to;
        $product->sizes = $request->sizes ?? null;
        $product->colors = $request->colors ?? null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . 'webp';
            Image::make($image)->encode('webp', 50)->save(public_path('uploads/products/' . $imageName));
            $imageUrl = $imageName;
            $product->image = $imageUrl;
            if (!$request->hasFile('meta_image')){
                $product->meta_img = $imageUrl;
            }
        }
        if ($request->hasFile('meta_image')){
            $file = $request->file('meta_image');
            $filename = uniqid() . '.' . 'webp';;
            $file->move(public_path('uploads/products/meta-image/'),$filename);
            $product->meta_img = $filename;
        }
//        $product->images = json_encode($files);

        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        if (isset($request->featured)) {
            $product->featured = true;
        } else {
            $product->featured = false;
        }
        if (isset($request->is_enable)) {
            $product->is_enable = true;
        } else {
            $product->is_enable = false;
        }
        if (isset($request->hot_deal)) {
            $product->hot_deal = true;
        } else {
            $product->hot_deal = false;
        }
        if (isset($request->new_arrival)) {
            $product->new_arrival = true;
        } else {
            $product->new_arrival = false;
        }

        if ($product->save()){
            if (Session::has('pro_alt_temp_img')) {
                $alt_img = Session::get('pro_alt_temp_img');
                foreach ($alt_img as $key => $img) {
                    $oldPath = 'uploads/products/temp/' . $img;
                    $nPath = 'uploads/products/' . $img;
                    if (file_exists($oldPath)) {
                        copy($oldPath, $nPath);
                        unlink($oldPath);
                        Session::forget('pro_alt_temp_img');
                        $product_image = new ProductImage;
                        $product_image->product_id = $product->id;
                        $product_image->image = $img;
                        $product_image->save();
                    }
                }
            }
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }

        return redirect()->route('products.index')->with('success','Created Successfully Done!');
    }

    public function edit($id)
    {
        $multiImgs = ProductImage::where('product_id',$id)->get();
        $product = Product::find($id);
        $brands = Brand::all();
        $categories =  Category::parents()->get();

        $data = [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'multiImgs' => $multiImgs,
        ];

        return view('admin.products.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $product = Product::find($id);
        $brand = $product->brand_id;

//        $baseImage = $product->image;
//        $images = $request->hasFile('images');
//
//        if ($image = $request->file('image')) {
//            if ($image && file_exists(public_path('uploads/products/' . $baseImage))) {
//                unlink(public_path('uploads/products/' . $baseImage));
//            }
//            $imageName = uniqid() . '.' . 'webp';
//            Image::make($image)->encode('webp', 70)->save(public_path('uploads/products/' . $imageName));
//            $imageLink = $imageName;
//        } else {
//            $imageLink = $product->image;
//        }

//        multi image

//        $files = [];

//        if ($request->hasFile('images')) {
//            $images = json_decode($product->images);
//            foreach ($images as $image) {
//                if ($image && file_exists(public_path('uploads/products/' . $image))) {
//                    unlink(public_path('uploads/products/' . $image));
//                }
//            }
//            foreach ($request->images as $image) {
//                $imagesName = uniqid() . '.' . 'webp';
//                Image::make($image)->encode('webp', 70)->save(public_path('uploads/products/' . $imagesName));
//                $files[] =  $imagesName;
//            }
//
//        } else {
//            $files = $product->images;
//        }

        if ($product->slug === Str::slug($request->name)) {
            $product->slug = Str::slug($request->name);
        } else {
            $mathcSlugCount = Product::where('slug', Str::slug($request->name))->count();
            if ($mathcSlugCount > 0) {
                $product->slug = Str::slug($request->name . '+' . '-' . Str::random());
            } else {
                $product->slug = Str::slug($request->name);
            }
        }

        $product->name = $request->name;
        $product->code = $request->code;
        $product->details = $request->details;
        $product->video_link = $request->video_link;
        $product->price = $request->price;
        if ($request->has('brand_id')){
            $product->brand_id = $request->brand_id;
        }else{
            $product->brand_id = $brand;
        }
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->spacial_price = $request->spacial_price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->pro_new_from = $request->pro_new_from;
        $product->pro_new_to = $request->pro_new_to;
        $product->sizes = $request->sizes ?? null;
        $product->colors = $request->colors ?? null;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
//        $product->image = $imageLink;
//        if ($images) {
//            $product->images = json_encode($files);
//        } else {
//            $product->images = $files;
//        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            @unlink(public_path('uploads/products/' . $product->image));
            $filename = uniqid() . '.' . 'webp';
            Image::make($file)->encode('webp', 50)->save('uploads/products/' . $filename);
            $product->image = $filename;
            if (!$request->hasFile('meta_image')){
                $product->meta_img = $filename;
            }
        }

        if ($request->hasFile('meta_image')){
            $file = $request->file('meta_image');
            @unlink(public_path('uploads/products/meta-image/' . $product->meta_image));
            $filename = uniqid() . '.' . 'webp';;
            $file->move(public_path('uploads/products/meta-image/'), $filename);
            $product->meta_img = $filename;
        }

        if (isset($request->featured)) {
            $product->featured = true;
        } else {
            $product->featured = false;
        }
        if (isset($request->is_enable)) {
            $product->is_enable = true;
        } else {
            $product->is_enable = false;
        }
        if (isset($request->hot_deal)) {
            $product->hot_deal = true;
        } else {
            $product->hot_deal = false;
        }
        if (isset($request->new_arrival)) {
            $product->new_arrival = true;
        } else {
            $product->new_arrival = false;
        }

        if ($product->save()){
            if (Session::has('pro_alt_temp_img')) {
                $alt_img = Session::get('pro_alt_temp_img');
                foreach ($alt_img as $key => $img) {
                    $oldPath = 'uploads/products/temp/' . $img;
                    $nPath = 'uploads/products/' . $img;
                    if (file_exists($oldPath)) {
                        copy($oldPath, $nPath);
                        unlink($oldPath);
                        Session::forget('pro_alt_temp_img');
                        $product_image = new ProductImage;
                        $product_image->product_id = $product->id;
                        $product_image->image = $img;
                        $product_image->save();
                    }
                }
            }
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }

        return redirect()->route('products.index')->with('success','Updated Successfully Done!');
    }

    public function getSub(Request $request)
    {

        if ($request->has('category_id')) {
            return \DB::table('subcategories')->where('category_id', $request->input('category_id'))->get(['id', 'name']);
        }
    }

    public function updateStatus($id, $status)
    {

        $product = Product::findOrfail($id);
        $product->is_enable = $status;
        $product->save();
        return response()->json([
            'success' => true,
            'message' => 'Status Updated successfully!',
        ], 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $thum = $product->image;
        $meta_image = $product->meta_img;
        $alt_image = ProductImage::where('product_id', $id)->get();

        try {
            if (file_exists(public_path('uploads/products/' . $thum)) && $thum) {
                unlink(public_path('uploads/products/' . $thum));
            }
            if ($meta_image){
                if (file_exists(public_path('uploads/products/meta-image/' . $meta_image)) && $meta_image) {
                    unlink(public_path('uploads/products/meta-image/' . $meta_image));
                }
            }
            if ($alt_image) {
                foreach ($alt_image as $row) {
                    if (file_exists(public_path('uploads/products/alt-img/' . $row->image)) && $row->image) {
                        unlink(public_path('uploads/products/alt-img/' . $row->image));
                    }
                }
                ProductImage::where('product_id', $id)->get()->each->delete();
            }
            $flash_deal_product = FlashDealProduct::where('product_id', $id)->get()->each->delete();
            $campaign_product = CampaignProduct::where('product_id', $id)->get()->each->delete();
            $order_array = OrderProduct::where('product_id', $id)
                ->pluck('order_id')
                ->toArray();
            $order = Order::whereIn('id', $order_array)->get()->each->delete();
            $order_product = OrderProduct::where('product_id', $id)->get()->each->delete();

            $product->delete();

            return redirect()->route('products.index')->with('success', 'Deleted Successfully Done!');

        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', 'something is wrong!');
        }

    }
}
