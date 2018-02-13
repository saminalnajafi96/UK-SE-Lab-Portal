<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use App\Environment;
	use App\Booking;
	use App\User;
	
	class HomeController extends Controller
	{
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('auth');
		}
		
		/**
		 * Show the application dashboard.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
//			$bookings = Booking::orderBy('id','asc')
//					->where('user_id', '=', auth()->user()->id)
//					->get();
			$user_id = auth()->user()->id;
			$user = User::find($user_id);
			
			return view('home')->with('bookings',$user->bookings);
		}
	}
