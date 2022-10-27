<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Session;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers',
        ]);

        $data = new Subscriber();
        $data->email = $request->email;
        $data->save();

        return redirect()->back()->with('success', 'Successfully Subscribe Newsletter');
    }
}
