<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Session;
use Image;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    protected $modelClass = Category::class;

    public function index()
    {
        $categories= Category::parents()->with('children')->latest()->get();
        $cat_parents = Category::parents()->get();
        $allcats= Category::latest()->get();
        $data = [
            'title' => 'Category',
            'categories' =>  $categories,
            'allcats' =>  $allcats,
            'cat_parents' =>  $cat_parents,
            'dataUrl' => route('categories.data')
        ];

        return view('admin.categories.datagrid',$data);
    }

    public function data()
    {

        $data = $this->modelClass::latest();
        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function create()
    {
        $cat_parents = Category::parents()->get();
        $data = [
            'title' => 'Add Category',
            'model' => new $this->modelClass,
            'formAction' => route('categories.store'),
            'cat_parents' => $cat_parents
        ];

        return view('admin.categories.form',$data);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $model = new $this->modelClass;
        try {
            $model->name = $request->name;
            $model->meta_description = $request->meta_description;
            $model->meta_title = $request->meta_title;
            $model->parent_id = $request->parent_id;

            if (Category::where('slug', CleanURL($request->name))->first()){
                $model->slug = CleanURL($request->name).'-'.Str::random(5);
            }else{
                $model->slug = CleanURL($request->name);
            }

            if ($request->file('image')){
                $model->image = image_upload($request->file('image'),'uploads/categories/',null);
            }

            if (isset($request->status)){
                $model->status = 1;
            }else{
                $model->status = 0;
            }
            $model->save();

        } catch (\Exception $e) {
            Session::flash('error', 'Oops! Something went wrong!');
            return redirect()->back();
            // TODO handle exeception
        }
        Session::flash('success', 'Category created successfully');
        return redirect()->back();
    }


    public function edit($id)
    {
        $model = $this->modelClass::findOrFail($id);
        $cat_parents = Category::parents()->get();

        $data = [
            'model' => $model,
            'formAction' => route('categories.update',$model->id),
            'cat_parents' => $cat_parents
        ];
        return view('admin.categories.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $model = $this->modelClass::findOrFail($id);
        try {
            $model->name = $request->name;
            $model->meta_description = $request->meta_description;
            $model->meta_title = $request->meta_title;
            $model->parent_id = $request->parent_id;
            if (Category::where('id','!=', $id)->where('slug', CleanURL($request->name))->first()){
                $model->slug = CleanURL($request->name).'-'.Str::random(5);
            }else{
                $model->slug = CleanURL($request->name);
            }

            if ($request->file('image')){
                $model->image = image_upload($request->file('image'),'uploads/categories/', $model->image);
            }

            if (isset($request->status)){
                $model->status = 1;
            }else{
                $model->status = 0;
            }
            $model->save();

        } catch (\Exception $e) {
            Session::flash('error', 'Oops! Something went wrong!');
            return redirect()->back();
            // TODO handle exeception
        }

        Session::flash('success', 'Category Updated successfully!');
        return redirect()->route('categories.index');
    }

    public function showHomepage($id, $show_homepage)
    {

        $cat = Category::findOrfail($id);
        $cat->show_homepage = $show_homepage;
        $cat->save();
        return response()->json([
            'success' => true,
            'message' => 'Status Updated successfully!',
        ], 200);
    }

    public function catStatus($id, $status)
    {

        $cat = Category::findOrfail($id);
        $cat->status = $status;
        $cat->save();
        return response()->json([
            'success' => true,
            'message' => 'Status Updated successfully!',
        ], 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $cateImg = $category->image;

        try {

            if (file_exists(public_path($cateImg)) && $cateImg !== null) {
                unlink(public_path($cateImg));
            }
            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Deleted successfully!'
            ], 200);

        }catch (\Exception $exception){
            notify()->error('Unable to delete this Image');
            return redirect()->back();
        }
    }

}

