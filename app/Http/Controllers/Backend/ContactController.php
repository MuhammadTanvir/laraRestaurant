<?php

namespace App\Http\Controllers\Backend;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function contact_lists()
    {
    	$contact_info=Contact::all();
    	return view('backend.pages.contact.index',compact('contact_info'));
    }

    public function contact_details($id)
    {
    	$contact_details=Contact::find($id);
    	//return $contact_details;
    	return view('backend.pages.contact.show',compact('contact_details'));
    }

    public function contact_destory($id)
    {
    	$contact=Contact::find($id);
        //return $contact;
    	$contact->delete();
    	return redirect()->route('admin.contact_lists');
    }
}
