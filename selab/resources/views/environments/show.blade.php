@extends('layouts.app')

@section('content')
	<a href="/environments" class="btn btn-default">Go back</a>
	<h1>{{$environment->environment_name}}</h1>
	<div class="row">
		<h3>Description</h3> <hr/>
		{{$environment->description}} <br/>
		
		<h3>Warnings/Updates</h3> <hr/>
		{{$environment->updates}} <br/>
		
		<h3>Hardware</h3> <hr/>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#legendModal">Legend</button>
		
		<!-- Toggle between views of system -->
		<button type="button" class="btn btn-primary btn-sm" id="frontButton">Front view</button>
		<button type="button" class="btn btn-primary btn-sm" id="backButton">Back view</button>
		
		<!-- Modal -->
		<div class="modal fade" id="legendModal" role="dialog">
			<div class="modal-dialog modal-lg">
				
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"></button>
						<h4 class="modal-title">Legend</h4>
					</div>
					<div class="modal-body">
						<div class="legend">
							<img src="/storage/images/Back_Legend.png">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			
			</div>
		</div>
		<br/><br/>
		
		<div class="group-panel">
			@if(count($hardware) > 0)
				@foreach($hardware as $item)
					<div class="col-md-4 system">
						<div class="panel custom-panel">
							<div class="panel-heading">
								<h5>{{$item->model}}</h5>
							</div>
							<div>
								<img src="/storage/images/{{$item->front_image}}" id="{{$item->model}}_N{{$item->node_number}}_Front" class="front">
								<span class="zoom">
					<img src="/storage/images/{{$item->back_image}}" id="{{$item->model}}_N{{$item->node_number}}_Back" class="back">
				</span>
							</div>
							<div class="panel-body">
								@if(Auth::guest())
									<p>Please log in to see the details of this system</p>
								@else
									<ul>
										<li>Node {{$item->node_number}}</li>
										<li>Node IP address: {{$item->node_ip}}</li>
										<li>OS: {{$item->os}}</li>
									</ul>
								@endif
							</div>
						</div>
					</div>
				@endforeach
			@else
				There is no hardware assigned to this environment.
			@endif
		</div>
	</div>
	
	<div class="row">
		<hr/>
		@if(Auth::guest())
			Log in to be able to book a slot and connect to this environment <br/><br/>
			@else
			<strong>NOTE: Please do not connect to an environment if you have not booked a slot. You may be working at the same time as someone else and risk having work being affected</strong> <br/><br/>
		@endif
		@foreach($hardware as $item)
			@if($item->button == 0)
				@continue
			@endif
			
			@if($item->management_ip != null)
				@if(Auth::guest())
					<button class="btn btn-primary btn-sm" disabled>Connect to System Manager</button>
				@else
					<a class="connect" href="http://{{$item->management_ip}}" target="_blank">
						<button class="btn btn-primary btn-sm">Connect to System Manager</button>
					</a>
				@endif
			@else
				@if(Auth::guest())
					<button class="btn btn-primary btn-sm" disabled>Connect to {{$item->model}}</button>
				@else
					<a class="connect" href="http://{{$item->node_ip}}" target="_blank">
						<button class="btn btn-primary btn-sm">Connect to {{$item->model}}</button>
					</a>
				@endif
			@endif
		@endforeach
		
	
		{{--<h4>Connect to environment</h4>--}}
		{{--<div class="col-md-4">--}}
			{{--<div class="form-group">--}}
				{{--{!! Form::open(['action' => 'EnvironmentsController@checkPass','method' => 'POST']) !!}--}}
				{{--<label class="control-label" for="password">Enter the password for your booking here</label>--}}
				{{--<input class="form-control" name="password" type="text">--}}
				{{--<button class="btn btn-primary btn-sm" style="margin-top: 10px" type="submit">Submit</button>--}}
				{{--{!! Form::close() !!}--}}
			{{--</div>--}}
		{{--</div>--}}
		
		<br/><br/>
	</div>
@endsection