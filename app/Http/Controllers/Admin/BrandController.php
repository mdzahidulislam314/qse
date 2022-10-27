<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Image;
use FILE;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'title' => 'Brands',
            'brand' => Brand::all(),
            'dataUrl' => route('brands.data'),
        ];
        return view('admin.brands.index',$data);
    }

    public function data()
    {
        $data = Brand::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    /*AJAX request*/
    public function getBrands(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $brands = Brand::orderby('name','asc')->select('id','name')->get();
        }else{
            $brands = Brand::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->get();
        }
        $response = array();
        foreach($brands as $brand){
            $response[] = array(
                "id"=>$brand->id,
                "text"=>$brand->name
            );
        }
        echo json_encode($response);
        exit;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;

        if (Brand::where('slug', CleanURL($request->name))->first()){
            $brand->slug = CleanURL($request->name).'-'.Str::random(5);
        }else{
            $brand->slug = CleanURL($request->name);
        }
        if ($request->file('image')){
            $brand->image = image_upload($request->file('image'),'uploads/brands/',null);
        }

        if (isset($request->status)){
            $brand->status = true;
        }else{
            $brand->status = false;
        }
        $brand->save();
        return response()->json([
            'success' => true,
            'message' => 'Brand created successfully!'
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;

        if (Brand::where('id','!=', $id)->where('slug', CleanURL($request->name))->first()){
            $brand->slug = CleanURL($request->name).'-'.Str::random(5);
        }else{
            $brand->slug = CleanURL($request->name);
        }
        if ($request->file('image')){
            $brand->image = image_upload($request->file('image'),'uploads/brands/', $brand->image);
        }

        if (isset($request->status)){
            $brand->status = 1;
        }else{
            $brand->status = 0;
        }

        $brand->save();

        return response()->json([
            'success' => true,
            'message' => 'Brand Updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        $image = $brand->image;

            if ($brand->image !== null && file_exists(public_path($image))) {
                unlink(public_path($image));
            }

            $brand->delete();

            return response()->json([
                'success' => true,
                'message' => 'Brand Deleted successfully!'
            ], 200);

    }
}
