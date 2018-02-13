<?php
	
	namespace App\Http\Controllers;
	
	use DB;
	use Illuminate\Http\Request;
	use App\Booking;
	use App\User;
	use App\Calendar;
	use Illuminate\Support\Facades\Input;
	
	class BookingsController extends Controller
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
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			$slots = Calendar::orderBy('id','asc')
					->where([
							['date', '>=', date('Y-m-d')],
							['time', '>', time()],
							['status', '=', 0],
					])->get();
			//			$slots = DB::table('calendar')->where([
			//					['date', '>=', date('Y-m-d')],
			//					['time', '>', time()],
			//			])
			//->get();
			$title = 'Book a slot';
			return view('bookings.index')->with([
					'title' => $title,
					'slots' => $slots,
			]);
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			//
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			$otp = str_random(8);
			$id = $request->get('id');
			
			// Create a booking and fill in details to send to DB
			$booking = new Booking;
			$booking->user_id = auth()->user()->id;
			$booking->date_id = $id;
			$booking->booking_password = $otp;
			
			// Update Calendar table
			DB::table('calendar')
					->select('id','status')
					->where('id', $id)
					->update(['status' => 1]);
			
			$booking->save();
			
			return redirect('/bookings')->with([
					'success' => 'Booking successful! Here is your temporary password: '.$otp.'. Please make sure you have this at hand as you will need it to connect to the environments',
			]);
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function show($id)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit($id)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, $id)
		{
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id)
		{
			//
		}
	}
