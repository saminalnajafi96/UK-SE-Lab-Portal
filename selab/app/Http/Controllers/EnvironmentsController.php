<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Database\Eloquent\ModelNotFoundException;
	use Illuminate\Http\Request;
	use App\Environment;
	use App\Hardware;
	
	class EnvironmentsController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			$environments = Environment::orderBy('id','asc')->paginate(5);
			return view('/environments/index')->with('environments',$environments);
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function show($environment_name, $id)
		{
			$name = urldecode($environment_name);
			$environment = Environment::where('environment_name', '=', $name)->firstOrFail();
			$hardware = Hardware::orderBy('id','asc')
					->where('environment_id', '=', $id)
					->get();
			return view('environments.show')->with([
					'environment' => $environment,
					'hardware' => $hardware,
			]);
		}
		
//		public function checkPass(Request $request) {
//			try {
//				$passwordEntered = $request->input('password');
//				$passwordInDB = Booking::where('booking_password', '=', $passwordEntered)->findOrFail();
//			} catch(ModelNotFoundException $e) {
//				return redirect()->back()->with([
//						'warning' => $passwordEntered.' does not exist',
//				]);
//			}
//
//
//
//			$time = time();
//			$date = now();
//			$passwordExpected = 0;
//
//			return redirect()->back()->with([
//					'success' => 'Use the buttons below to connect to tools',
//			]);
//		}
		
		//		/**
		//		 * Show the form for editing the specified resource.
		//		 *
		//		 * @param  int  $id
		//		 * @return \Illuminate\Http\Response
		//		 */
		//		public function edit($id)
		//		{
		//			//
		//		}
		//
		//		/**
		//		 * Update the specified resource in storage.
		//		 *
		//		 * @param  \Illuminate\Http\Request  $request
		//		 * @param  int  $id
		//		 * @return \Illuminate\Http\Response
		//		 */
		//		public function update(Request $request, $id)
		//		{
		//			//
		//		}
		//
		//		/**
		//		 * Remove the specified resource from storage.
		//		 *
		//		 * @param  int  $id
		//		 * @return \Illuminate\Http\Response
		//		 */
		//		public function destroy($id)
		//		{
		//			//
		//		}
		
		/**
		//		 * Show the form for creating a new resource.
		//		 *
		//		 * @return \Illuminate\Http\Response
		//		 */
		//		public function create()
		//		{
		//			//
		//		}
		//
		//		/**
		//		 * Store a newly created resource in storage.
		//		 *
		//		 * @param  \Illuminate\Http\Request  $request
		//		 * @return \Illuminate\Http\Response
		//		 */
		//		public function store(Request $request)
		//		{
		//			//
		//		}
	}
