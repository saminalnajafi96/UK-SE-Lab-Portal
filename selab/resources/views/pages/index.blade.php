@extends('layouts.app')

@section('content')
	<div class="jumbotron text-center">
		<h1>Welcome to the UK SE Lab Portal</h1>
		@if(Auth::guest())
			<p>
				<a class="btn btn-primary bt-lg" href="/login" role="button">Login</a>
				<a class="btn btn-success bt-lg" href="/register" role="button">Register</a>
			</p>
		@endif
	</div>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel-body">
					<p>
						The SE Lab portal is designed for SEs to access the kit in the SE Lab in a simple and easy to use manner.
						It's recommended to be used for testing to answer technical questions as well as a self-learning environment.
						<br/><br/>
						For support or any questions, please send an email to <strong>ng-ukselabportal</strong>. Or, if you are logged in, you can send an email directly
						through the Support page
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection