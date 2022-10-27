<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;

class ContactController
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.marketing.contacts.index')->with('contacts', $contacts);
    }

    public function destroy($id)
    {
        $subs = Contact::find($id);
        $subs->delete();
        Session::flash('success', 'Contacts Deleted successfully!');
        return redirect()->back();
    }
}
