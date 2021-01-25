<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
    	$total_categories=Category::count();
    	$total_items=Item::count();
    	$reservations=Reservation::where('status','Inactive')->get();
    	return view('backend.pages.dashboard.index',compact('total_categories','total_items','reservations'));
    }
}
