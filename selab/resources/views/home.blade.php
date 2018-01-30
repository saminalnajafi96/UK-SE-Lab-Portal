@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome, {{ Auth::user()->name }}</div>
                    
                    <div class="panel-body">
                        @if(count($environments) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Environment Name</th>
                                </tr>
                                @foreach($environments as $environment)
                                    <tr>
                                        <td><a href="">{{$environment->environment_name}}</a></td>
                                    </tr>
                                @endforeach
                            </table>
                            {{$environments->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection