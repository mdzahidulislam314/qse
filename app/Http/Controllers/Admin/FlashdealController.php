<?php

namespace App\Http\Controllers\Admin;

use App\Flashdeal;
use App\FlashDealProduct;
use App\Flashsell;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Image;

class FlashdealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flashdeal = Flashdeal::all();
        $data = [
            'flashdeal' => $flashdeal,
            'title' => 'Flash Sells'
        ];
        return view('admin.marketing.flash-deals.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Add Flash sells',
        ];
        return view('admin.marketing.flash-deals.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'product_id' => 'required',
            'title' => 'required',
        ],[
            'product_id.required' => 'Please added product on flash deal',
        ]);

        $flashdeal = new Flashdeal();
        $flashdeal->title = $request->title;
        $flashdeal->start_date = strtotime($request->start_date);
        $flashdeal->end_date = strtotime($request->end_date);

        if (Flashdeal::where('slug', CleanURL($request->title))->first()){
            $flashdeal->slug = CleanURL($request->title).'-'.Str::random(5);
        }else{
            $flashdeal->slug = CleanURL($request->title);
        }
        if ($request->file('image')){
            $flashdeal->image = image_upload($request->file('image'),'uploads/flash-deals/',null);
        }

        if ($request->has('is_active')){
            $flashdeal->is_active = true;
        }
        if ($request->has('is_feature')){
            $flashdeal->is_feature = true;
        }

        if ($flashdeal->save()){
            foreach ($request->product_id as $key => $product) {
                $flash_deal_product = new FlashDealProduct();
                $flash_deal_product->flashdeal_id = $flashdeal->id;
                $flash_deal_product->product_id = $product;
                $flash_deal_product->save();

                $root_product = Product::findOrFail($product);
                $root_product->price = $request['price_'.$product];
                $root_product->spacial_price = $request['spacial_price_'.$product];
                $root_product->save();
            }
            return redirect()->route('flashdeals.create')->with('success', 'Successfully Created done!');
        }
        else{

            return redirect()->route('flashdeals.create')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flashdeal = Flashdeal::findorFail($id);
        $data = [
            'flashdeal' => $flashdeal,
            'title' => 'Edit Flashdeal',
        ];

        return view('admin.marketing.flash-deals.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'title' => 'required',
        ],[
            'product_id.required' => 'Please added product on flash deal',
        ]);

        $flashdeal =Flashdeal::findOrFail($id);
        $flashdeal->title = $request->title;
        $flashdeal->slug = strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
        $flashdeal->start_date = strtotime($request->start_date);
        $flashdeal->end_date = strtotime($request->end_date);
        if (Flashdeal::where('id','!=', $id)->where('slug', CleanURL($request->title))->first()){
            $flashdeal->slug = CleanURL($request->title).'-'.Str::random(5);
        }else{
            $flashdeal->slug = CleanURL($request->title);
        }
        if ($request->file('image')){
            $flashdeal->image = image_upload($request->file('image'),'uploads/flash-deals/',$flashdeal->image);
        }

        if ($request->has('is_active')){
            $flashdeal->is_active = true;
        }
        if ($request->has('is_feature')){
            $flashdeal->is_feature = true;
        }

        foreach ($flashdeal->flashdealProducts as $key => $flashdeal_product) {
            $flashdeal_product->delete();
        }

        if ($flashdeal->save()){
            foreach ($request->product_id as $key => $product) {
                $flash_deal_product = new FlashDealProduct();
                $flash_deal_product->flashdeal_id = $flashdeal->id;
                $flash_deal_product->product_id = $product;
                $flash_deal_product->save();

                $root_product = Product::findOrFail($product);
                $root_product->price = $request['price_'.$product];
                $root_product->spacial_price = $request['spacial_price_'.$product];
                $root_product->save();
            }
            return redirect()->route('flashdeals.index')->with('success', 'Successfully Update done!');
        }
        else{

            return redirect()->route('flashdeals.edit')->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flash_deal = FlashDeal::findOrFail($id);
        $image = $flash_deal->image;
        foreach ($flash_deal->flashdealProducts as $key => $flash_deal_product) {
            $flash_deal_product->delete();
        }
        try {
            if (file_exists(public_path($image)) && $image !== null) {
                unlink(public_path($image));
            }
            FlashDeal::destroy($id);
            return redirect()->route('flashdeals.index')->with('success', 'Successfully Deleted done!');

        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Successfully Deleted done!');;
        }

    }

    public function flashdealpro(Request $request){
        $product_ids = $request->product_ids;
        return view('admin.marketing.flash-deals.flash-deal-products', compact('product_ids'));
    }

    public function flashdealedit(Request $request){
        $product_ids = $request->product_ids;
        $flash_deal_id = $request->flash_deal_id;
        return view('admin.marketing.flash-deals.flash-deal-products-edit', compact('product_ids', 'flash_deal_id'));
    }

}
