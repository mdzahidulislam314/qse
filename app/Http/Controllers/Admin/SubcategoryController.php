<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Yajra\DataTables\Facades\DataTables;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Sub Category',
            'subCategories' => Subcategory::all(),
            'categories' => Category::all(),
            'dataUrl' => route('sub-categories.data')
        ];

        return view('admin.sub-categories.index',$data);
    }

    public function data()
    {
        $data = Subcategory::with('category');
        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
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
             'category_id' => 'required'
        ]);

        $subcat = new Subcategory();
        $subcat->name = $request->name;
        $subcat->category_id = $request->category_id;
        if (isset($request->status)){
            $subcat->status = 1;
        }else{
            $subcat->status = 0;
        }
        $subcat->slug = Str::slug($request->name);
        $subcat->save();

        return response()->json([
            'success' => true,
            'message' => 'Created successfully!'
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $subcat = Subcategory::findOrFail($id);

        $subcat->name = $request->name;
        $subcat->category_id = $request->category_id;
        if (isset($request->status)){
            $subcat->status = 1;
        }else{
            $subcat->status = 0;
        }
        $subcat->slug = Str::slug($request->name);
        $subcat->save();

        return response()->json([
            'success' => true,
            'message' => 'Updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);

        $subcategory->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully!'
        ], 200);
    }
}
