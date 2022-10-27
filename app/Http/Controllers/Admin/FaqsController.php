<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Faq::all();
        return view('admin.pages.faqs.index')->with('pages', $pages);
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
            'desc' => 'required',
            'order_by' => 'required|unique:faqs',
        ]);

        $page = new Faq();
        $page->title = $request->title;
        $page->desc = $request->desc;
        $page->order_by = $request->order_by;
        if (isset($request->is_active)) {
            $page->is_active = true;
        }
        $page->save();

        Session::flash('success', 'Created successfully!');
        return redirect()->route('faqs.index');
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
        $page = Faq::find($id);
        $data = [
            'page' => $page,
        ];

        return view('admin.pages.faqs.edit', $data);
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
            'desc' => 'required',
            'order_by' => 'unique:faqs,order_by,'.$id,
        ]);

        $page = Faq::find($id);
        $page->title = $request->title;
        $page->desc = $request->desc;
        $page->order_by = $request->order_by;
        if (isset($request->is_active)) {
            $page->is_active = true;
        }
        $page->save();

        Session::flash('success', 'Updated successfully!');

        return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Faq::find($id);
        $page->delete();
        Session::flash('success', 'Faq Deleted successfully!');
        return redirect()->back();
    }
}
