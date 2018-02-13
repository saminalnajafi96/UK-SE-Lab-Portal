@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome, {{ Auth::user()->name }}</div>
                    
                    <div class="panel-body">
                        <h3>Your Bookings</h3>
                        @if(count($bookings) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Password</th>
                                </tr>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{$booking->id}}</td>
                                    <td>{{$booking->calendarDate($booking->date_id)}}</td>
                                    <td>{{$booking->calendarTime($booking->date_id)}}</td>
                                    <td>{{$booking->booking_password}}</td>
                                </tr>
                            @endforeach
                            </table>
                            @else
                            You have no bookings
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection