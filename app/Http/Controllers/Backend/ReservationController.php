<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservations()
    {
    	$reservations=Reservation::all();
    	return view('backend.pages.reservation.index',compact('reservations'));
    }

     public function reservation_status($id)
    {
        $reservation = Reservation::find($id);
        
        $reservation->status ="Active";
        $reservation->save();

        session()->flash('success','Reservation Confirmed Successfully!!!');
        return redirect()->back();
    }
}
