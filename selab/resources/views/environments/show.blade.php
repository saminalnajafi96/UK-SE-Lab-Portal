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
		
		
	</div>
	@if(!Auth::guest())
		<!-- Buttons to connect go here -->
	@endif
@endsection