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
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::latest()->get();
        $data = [
            'services' => $services,
            'title' => 'All Services',
        ];
        return view('admin.services.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Service Create'
        ];
        return view('admin.services.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);

        $service = new Service();
        $service->slug = Str::slug($request->name);
        $service->name = $request->name;
        $service->desc = $request->desc;
        if ($image = $request->file('image')) {
            $image =  image_upload($image,'uploads/service/',null);
            $service->image = $image;
        }
//
//        $service->meta_title = $request->meta_title;
//        $service->meta_description = $request->meta_description;
//        $service->meta_keywords = $request->meta_keywords;

        if (isset($request->is_feature)) {
            $service->is_feature = true;
        } else {
            $service->is_feature = false;
        }
        if (isset($request->is_active)) {
            $service->is_active = true;
        } else {
            $service->is_active = false;
        }

        $service->save();

        return redirect()->route('products.index')->with('success','Created Successfully Done!');
    }

    public function edit($id)
    {
        $d = Service::find($id);
        $data = [
            'service' => $d,
            'title' => 'Edit Service',
        ];
        return view('admin.services.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $service = Service::find($id);

        if ($image = $request->file('image')) {
            $oldImage = $service->image;
            $image =  image_upload($image,'uploads/service/', $oldImage);
            $service->image = $image;
        }
        $service->name = $request->name;
        $service->desc = $request->desc;
        $service->slug = Str::slug($request->name);
        if (isset($request->is_feature)) {
            $service->is_feature = true;
        } else {
            $service->is_feature = false;
        }
        if (isset($request->is_active)) {
            $service->is_active = true;
        } else {
            $service->is_active = false;
        }

        $service->save();

        return redirect()->route('services.index')->with('success','Updated Successfully Done!');
    }

    public function getSub(Request $request)
    {

        if ($request->has('category_id')) {
            return \DB::table('subcategories')->where('category_id', $request->input('category_id'))->get(['id', 'name']);
        }
    }

    public function updateStatus($id, $status)
    {
        $data = Service::findOrfail($id);
        $data->is_active = $status;
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Updated successfully!',
        ], 200);
    }

    public function updateFeature($id, $status)
    {
        $data = Service::findOrfail($id);
        $data->is_feature = $status;
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Updated successfully!',
        ], 200);
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $image = $service->image;

        try {
            if (file_exists(public_path($image)) && $image) {
                unlink(public_path($image));
            }

            $service->delete();
            return redirect()->back()->with('success', 'Successfully Deleted done!');

        } catch (\Exception $exception) {

            return redirect()->back()->with('error', 'Unable to delete this Image!');
        }

    }
}
