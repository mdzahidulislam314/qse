<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index')->with('pages', $pages);
    }

    public function faqsIndex()
    {
        $pages = Page::all();
        return view('admin.pages.index')->with('pages', $pages);
    }

    public function contactIndex()
    {
        $pages = Page::all();
        return view('admin.pages.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->desc = $request->desc;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;

        if (Page::where('slug', CleanURL($request->title))->first()){
            $page->slug = CleanURL($request->title).'-'.Str::random(5);
        }else{
            $page->slug = CleanURL($request->title);
        }

        if ($request->file('meta_img')){
            $page->meta_img = image_upload($request->file('meta_img'),'uploads/page_meta/', null);
        }

        if (isset($request->is_active)) {
            $page->is_active = true;
        } else {
            $page->is_active = false;
        }
        $page->save();
        Session::flash('success', 'Page Created successfully!');
        return redirect()->route('pages.index');
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
        $page = Page::find($id);
        $data = [
            'page' => $page,
        ];

        return view('admin.pages.edit', $data);
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
        ]);

        $page = Page::find($id);
        $page->title = $request->title;
        $page->desc = $request->desc;
        $page->visibility = $request->visibility;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;

        if (Page::where('id','!=', $id)->where('slug', CleanURL($request->title))->first()){
            $page->slug = CleanURL($request->title).'-'.Str::random(5);
        }else{
            $page->slug = CleanURL($request->title);
        }

        if ($request->file('meta_img')){
            $page->meta_img = image_upload($request->file('meta_img'),'uploads/page_meta/', $page->meta_img);
        }

        if (isset($request->is_active)) {
            $page->is_active = true;
        } else {
            $page->is_active = false;
        }

        $page->save();

        Session::flash('success', 'Page Update successfully!');
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if (file_exists(public_path($page->meta_img))){
            @unlink(public_path($page->meta_img));
        }
        $page->delete();
        Session::flash('success', 'Page Deleted successfully!');
        return redirect()->back();
    }
}
