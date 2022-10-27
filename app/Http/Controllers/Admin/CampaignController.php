<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use App\CampaignProduct;
use App\Flashdeal;
use App\FlashDealProduct;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Image;

class CampaignController extends Controller
{

    public function index()
    {
        $items = Campaign::all();
        $data = [
            'campaigns' => $items,
            'title' => 'Campaign'
        ];
        return view('admin.marketing.campaigns.index',$data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Campaign',
        ];
        return view('admin.marketing.campaigns.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'product_id' => 'required',
            'title' => 'required',
        ],[
            'product_id.required' => 'Please added product',
        ]);

        $campaign = new Campaign();
        $campaign->title = $request->title;

        if (Campaign::where('slug', CleanURL($request->title))->first()){
            $campaign->slug = CleanURL($request->title).'-'.Str::random(5);
        }else{
            $campaign->slug = CleanURL($request->title);
        }
        if ($request->file('image')){
            $campaign->image = image_upload($request->file('image'),'uploads/campaign/',null);
        }
        if ($request->has('is_active')){
            $campaign->is_active = true;
        }else{
            $campaign->is_active = false;
        }

        if ($campaign->save()){
            foreach ($request->product_id as $key => $product) {
                $campaign_product = new CampaignProduct();
                $campaign_product->campaign_id = $campaign->id;
                $campaign_product->product_id = $product;
                $campaign_product->save();

                $root_product = Product::findOrFail($product);
                $root_product->price = $request['price_'.$product];
                $root_product->spacial_price = $request['spacial_price_'.$product];
                $root_product->save();
            }
            return redirect()->route('campaigns.index')->with('success', 'Successfully Created done!');
        }
        else{

            return redirect()->route('campaigns.create')->with('error', 'Something went wrong!');
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
        $campaign = Campaign::findorFail($id);
        $data = [
            'campaign' => $campaign,
            'title' => 'Edit Campaign',
        ];

        return view('admin.marketing.campaigns.edit',$data);
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

        $campaign =Campaign::findOrFail($id);
        $campaign->title = $request->title;
        $campaign->slug = strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
        if (Campaign::where('id','!=', $id)->where('slug', CleanURL($request->title))->first()){
            $campaign->slug = CleanURL($request->title).'-'.Str::random(5);
        }else{
            $campaign->slug = CleanURL($request->title);
        }
        if ($request->file('image')){
            $campaign->image = image_upload($request->file('image'),'uploads/campaign/', $campaign->image);
        }
        if ($request->has('is_active')){
            $campaign->is_active = true;
        }else{
            $campaign->is_active = false;
        }

        foreach ($campaign->campaignProducts as $key => $campaign_product) {
            $campaign_product->delete();
        }

        if ($campaign->save()){
            foreach ($request->product_id as $key => $product) {
                $campaign_product = new CampaignProduct();
                $campaign_product->campaign_id = $campaign->id;
                $campaign_product->product_id = $product;
                $campaign_product->save();

                $root_product = Product::findOrFail($product);
                $root_product->price = $request['price_'.$product];
                $root_product->spacial_price = $request['spacial_price_'.$product];
                $root_product->save();
            }
            return redirect()->route('campaigns.index')->with('success', 'Successfully Update done!');
        }
        else{

            return redirect()->route('campaigns.edit')->with('error', 'Something went wrong!');
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
        $campaign = Campaign::findOrFail($id);
        $image = $campaign->image;
        foreach ($campaign->campaignProducts as $key => $campaign_product) {
            $campaign_product->delete();
        }
        try {
            if (file_exists(public_path($image)) && $image !== null) {
                unlink(public_path($image));
            }
            Campaign::destroy($id);
            return redirect()->route('campaigns.index')->with('success', 'Successfully Deleted done!');

        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Something went wrong!');;
        }

    }

    public function campaignpro(Request $request){
        $product_ids = $request->product_ids;
        return view('admin.marketing.campaigns.campaign-products', compact('product_ids'));
    }

    public function campaignedit(Request $request){
        $product_ids = $request->product_ids;
        $campaign_id = $request->campaign_id;
        return view('admin.marketing.campaigns.campaignl-products-edit', compact('product_ids', 'campaign_id'));
    }

}
