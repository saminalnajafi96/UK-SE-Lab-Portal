@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome, {{ Auth::user()->name }}</div>
                    
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Environment Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <a href="ASE.html">ASE Cluster</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="SE.html">SE Cluster</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="SE_Cluster3.html">SE Cluster 3</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
