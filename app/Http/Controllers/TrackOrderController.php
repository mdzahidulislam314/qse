<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{
    public function index()
    {
        return view('pages.order-tracking');
    }

    public function orderTrack()
    {
        if (\request()->has('trackOrderId')){
            $order = Order::where('order_id', request()->get('trackOrderId'))->first();
            if ($order){
                return view('pages.tracking-result',compact('order', $order));
            }
            return redirect()->route('track.order')->with('warning', 'Order Not Found/Order id is invalid');
        }
    }
}
