<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;
use Session;

class SubscriberController extends Controller
{
    public function index()
    {
        $subs = Subscriber::latest()->get();
        return view('admin.marketing.subscribers.index')->with('subs', $subs);
    }

    public function destroy($id)
    {
        $subs = Subscriber::find($id);
        $subs->delete();
        return redirect()->back()->with('success','Subscriber Deleted successfully!');
    }
}
