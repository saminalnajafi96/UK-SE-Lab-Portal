@extends('layouts.app')

@section('content')
	<a href="/environments" class="btn btn-default">Go back</a>
	<h1>{{$environment->environment_name}}</h1>
	<hr/>
	<div>
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
		
		@foreach($hardware as $item)
			<h5>{{$item->model}}</h5>
			<div class="system">
				<img src="/storage/images/{{$item->front_image}}" id="{{$item->name}}_Front" class="front">
				<span class="zoom">
					<img src="/storage/images/{{$item->back_image}}" id="{{$item->name}}_Back" class="back">
				</span>
				@if(!Auth::guest())
					<div class="details front" id="{{$item->model}}_hover">
						<ul>
							<li>Node IP address: {{$item->node_ip}}</li>
							<li>OS: {{$item->os}}</li>
							@if($item->management_ip != null)
								<li>Management IP: {{$item->management_ip}}</li>
							@endif
						</ul>
					</div>
				@endif
			</div>
			<br/>
		@endforeach
		<hr/><br/>
		
		@if(!Auth::guest())
			@foreach($hardware as $item)
				@if($item->management_ip != null)
					<a href="http://{{$item->management_ip}}" target="_blank">
						<button class="btn btn-primary btn-sm" type="button">Connect to System Manager</button>
					</a>
				@else
					<a href="http://{{$item->node_ip}}" target="_blank">
						<button class="btn btn-primary btn-sm" type="button">Connect to {{$item->model}}</button>
					</a>
				@endif
			
			@endforeach
		@endif
	</div>
@endsection