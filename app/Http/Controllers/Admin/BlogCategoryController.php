<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = BlogCategory::all();
        return view('admin.blogs.categories.index',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $blog_cat = new BlogCategory();
        $blog_cat->name = $request->name;
        $blog_cat->slug = Str::slug($request->name);
        if (isset($request->is_active)) {
            $blog_cat->is_active = true;
        }
        $blog_cat->save();
        Session::flash('success', 'Blog created successfully');

        return redirect()->back();
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
        $cat = BlogCategory::findOrFail($id);
        return view('admin.blogs.categories.edit',compact('cat'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $blog_cat = BlogCategory::find($id);
        $blog_cat->name = $request->name;
        $blog_cat->slug = Str::slug($request->name);
        if (isset($request->is_active)) {
            $blog_cat->is_active = true;
        }
        $blog_cat->save();

        Session::flash('success', 'Blog Update successfully');

        return redirect()->route('blogscategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = BlogCategory::find($id);
        $category->delete();
        Session::flash('success', 'Category deleted successfully');
        return redirect()->back();
    }
}
