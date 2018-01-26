<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingsController extends Controller
{
	public function index(){
		$title = 'Book a slot';
		return view('bookings.index')->with('title',$title);
	}
}
