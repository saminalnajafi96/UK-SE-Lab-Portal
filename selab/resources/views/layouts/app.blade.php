<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'UK SE Lab Portal') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('include.navbar')
    <div class="container">
        @include('include.messages')
        @yield('content')
    </div>
</div>

<!-- Scripts and stuff on bottom so page loads faster -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{asset('js/jquery.zoom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Functions.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/style.css')}}"/>
</body>
</html>