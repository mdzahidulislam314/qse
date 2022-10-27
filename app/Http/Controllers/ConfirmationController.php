<?php

namespace App\Http\Controllers;

use App\Bkashtrxid;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! session()->has('success_message')) {
            return redirect('/');
        }

        return view('thankyou');
    }

    public function payment()
    {
        return view('payment-page');
    }

    public function confirmPayment(Request $request)
    {
        $payment = new Bkashtrxid();
        $payment->order_id = $request->order_id;
        $payment->trx_id = $request->trx_id;
        $payment->submitted_at = $request->created_at;
        $payment->is_verified = 0;
        $payment->save();
        Session::forget('payMethod');
        Session::forget('order_id');
        return redirect()->route('users.edit');
    }
}
