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
							<h3>Available slots</h3>
							<table class="table table-striped">
								<tr>
									<th>Date</th>
									<th>Time</th>
									<th>Status</th>
									<th>Book slot</th>
								</tr>
							</table>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection