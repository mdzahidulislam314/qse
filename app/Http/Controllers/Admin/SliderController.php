<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $data = [
            'sliders' => $sliders,
            'title' => 'Sliders',
        ];

        return view('admin.sliders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $data = [
//            'formAction' => route('sliders.store'),
//            'title' => 'Add Slider',
//            'slider' => '',
//        ];
//        return view('admin.sliders.create', $data);
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
            'image' => 'required',
        ]);

        if ($image = $request->file('image')) {
          $image =  image_upload($image,'uploads/sliders/',null);
        }

        $slider = new Slider();
        $slider->image_url = $request->image_url;
        $slider->title = $request->title;
        $slider->description = $request->description;
        if (isset($request->status)) {
            $slider->status = true;
        } else {
            $slider->status = false;
        }

        if ($image) {
            $slider->image = $image;
        }
        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Successfully Created done!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
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
        $slider = Slider::findOrFail($id);

        if ($image = $request->file('image')) {
            $oldImage = $slider->image;
            $image = image_upload($image, 'uploads/sliders/', $oldImage);
        }

        $slider->image_url = $request->image_url;
        $slider->title = $request->title;
        $slider->description = $request->description;
        if (isset($request->status)) {
            $slider->status = true;
        } else {
            $slider->status = false;
        }
        $slider->image = $image;

        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Successfully Updated done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $image = $slider->image;

        try {
            if (file_exists(public_path($image)) && $image) {
                unlink(public_path($image));
            }

            $slider->delete();
            return redirect()->back()->with('success', 'Successfully Deleted done!');

        } catch (\Exception $exception) {

            notify()->error('Unable to delete this Image ');
            return redirect()->back();
        }
    }

    public function sliderStatus($id, $status)
    {
        $data = Slider::findOrfail($id);
        $data->status = $status;
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Status Updated successfully!',
        ], 200);
    }
}
