<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(Request $request)
    {
    	$this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
            'date_time' => 'required',
           
        ]);

        $reservation=new Reservation();
        $reservation->name=$request->name;
        $reservation->email=$request->email;
        $reservation->phone=$request->phone;
        $reservation->message=$request->message;
        $reservation->date_time=$request->date_time;
        $reservation->status='Inactive';
        //return $request->all();
        $reservation->save();

        session()->flash('success','Reservation has been sent successfully!!!. We will confirm it shortly');
        return redirect()->back();
    }
}
