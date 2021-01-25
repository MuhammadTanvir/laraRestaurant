<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     public function contact_us(Request $request)
    {
    	$this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required',
           
        ]);

        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->subject=$request->subject;
        $contact->message=$request->message;
        //return $request->all();
        $contact->save();

        session()->flash('success','Message has been sent successfully!!!. We will contact with you shortly');
        return redirect()->back();
    }
}
