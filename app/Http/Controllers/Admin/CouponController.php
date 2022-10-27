<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index',compact('coupons'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $couon = new Coupon();
        $couon->code = $request->code;
        $couon->type = $request->type;
        $couon->value = $request->value;
        $couon->percent_off = $request->percent_off;
        if ($request->has('status')){
            $couon->status = true;
        }
        $couon->save();
        return redirect()->back()->with('success', 'Coupon created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        $couon = Coupon::find($id);
        $couon->code = $request->code;
        $couon->type = $request->type;
        $couon->value = $request->value;
        $couon->percent_off = $request->percent_off;
        if ($request->has('status')){
            $couon->status = true;
        }else{
            $couon->status = false;
        }
        $couon->save();
        return redirect()->back()->with('success', 'Coupon Updated successfully');
    }

    public function destroy($id)
    {
        $couon = Coupon::find($id);
        $couon->delete();
        return redirect()->back()->with('success', 'Coupon Deleted successfully');
    }
}
