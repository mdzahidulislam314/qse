<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'subject' => 'required',
            'comments' => 'required',
        ]);
        $data = new Contact();
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->comments = $request->comments;
        $data->name = $request->name;
        $data->save();
        return redirect()->back()->with('success', 'Successfully Sent!');
    }
}
