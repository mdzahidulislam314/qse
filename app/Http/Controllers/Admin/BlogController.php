<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\BlogCategory;
use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('blogCategory')->latest()->get();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
          'categories' => BlogCategory::all(),
        ];
        return view('admin.blogs.create', $data);
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->cat_id = $request->cat_id;
        if (Blog::where('slug', CleanURL($request->title))->first()){
            $blog->slug = CleanURL($request->title).'-'.Str::random(5);
        }else{
            $blog->slug = CleanURL($request->title);
        }

        if ($request->has('is_active')) {
            $blog->is_active = true;
        }
        if ($request->file('image')){
            $blog->image = image_upload($request->file('image'),'uploads/blogs/',null);
        }
        if ($request->file('meta_img')){
            $blog->meta_img = image_upload($request->file('meta_img'),'uploads/blogs_meta/',null);
        }

        $blog->save();

        Session::flash('success', 'Blog created successfully');
        return redirect()->route('blogs.create');
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
        $blog = Blog::find($id);
        $data = [
            'categories' => BlogCategory::all(),
            'blog' => $blog
        ];
        return view('admin.blogs.edit', $data);
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->description;
        $blog->cat_id = $request->cat_id;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;

        if (Blog::where('id','!=', $id)->where('slug', CleanURL($request->title))->first()){
            $blog->slug = CleanURL($request->title).'-'.Str::random(5);
        }else{
            $blog->slug = CleanURL($request->title);
        }

        if ($request->file('image')){
            $blog->image = image_upload($request->file('image'),'uploads/blogs/', $blog->image);
        }
        if ($request->file('meta_img')){
            $blog->meta_img = image_upload($request->file('meta_img'),'uploads/blogs_meta/', $blog->meta_img);
        }

        if ($request->has('is_active')) {
            $blog->is_active = true;
        }
        $blog->save();

        Session::flash('success', 'Blog Updated successfully');
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (file_exists(public_path($blog->image))){
            @unlink(public_path($blog->image));
        }
        if (file_exists(public_path($blog->meta_img))){
            @unlink(public_path($blog->meta_img));
        }
        $blog->delete();
        Session::flash('success', 'Blog deleted successfully');
        return redirect()->route('blogs.index');
    }
}
