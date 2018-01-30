@extends('layouts.app')

@section('content')
	@if(!Auth::guest())
		<h1>{{$title}}</h1>
		<hr/>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						
						<div class="panel-heading">Book a slot</div>
						
						<div class="panel-body">
							<p>
								There are <strong>two</strong> available slots per working day (4 hours each). Once you book a slot, you will be able to connect
								to the kit in the lab through the dashboard. You will not be able to rebook or cancel your booking so please
								make sure you will definitely be using the lab if you have booked it.
							</p>
							<strong>Do not: </strong>
							<ul>
								<li>Book on behalf of someone else</li>
								<li>Book multiple sessions (allow the chance for others to use)</li>
							</ul>
							<br/> <hr/>
							<h3>Available slots</h3>
							@if(count($slots) > 0)
								<table class="table table-striped">
									<tr>
										<th>Date</th>
										<th>Time</th>
										<th></th>
									</tr>
									@foreach($slots as $slot)
										@if($slot->status == 0)
											<tr>
												<td>{{$slot->date}}</td>
												<td>{{$slot->time}}</td>
												<td><button class="btn btn-primary">Book</button></td>
											</tr>
										@endif
									@endforeach
								</table>
							@else
								There are no available slots.
							@endif
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection