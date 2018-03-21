<?php
	
	namespace App\Console;
	
	use DB;
	use Illuminate\Console\Scheduling\Schedule;
	use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
	
	class Kernel extends ConsoleKernel
	{
		/**
		 * The Artisan commands provided by your application.
		 *
		 * @var array
		 */
		protected $commands = [
			//
		];
		
		/**
		 * Define the application's command schedule.
		 *
		 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
		 * @return void
		 */
		protected function schedule(Schedule $schedule)
		{
			// $schedule->command('inspire')
			//          ->hourly();
			$schedule->call(function() {
				$startDate = now();
				for($i=0;$i<14;$i++){
					if($i == 5 || $i == 12){
						$i += 2;
					}
					$date = date_create($startDate . "+".$i." day");
					//$date = date('Y-m-d', strtotime($startDate . "+".$i." day"));
					date_format($date,"d/m/Y");
					
					DB::table('calendar')->insert([
							['date' => $date, 'time' => '09:00',],
							['date' => $date, 'time' => '13:30',],
					]);
				}
			})->everyMinute();
//					->weekly(2)
//					->mondays()
//					->at('00:00');
			
		}
		
		/**
		 * Register the commands for the application.
		 *
		 * @return void
		 */
		protected function commands()
		{
			$this->load(__DIR__.'/Commands');
			
			require base_path('routes/console.php');
		}
	}
