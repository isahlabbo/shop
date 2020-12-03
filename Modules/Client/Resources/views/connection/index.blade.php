@extends('client::layouts.master')

@section('title')
    {{client()->CIN}} Client Connections
@endsection

@section('content')
<br>
<div class="row">   
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header btn-secondary">Available Connections</div>
                <div class="card-body">
                    <div class="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Total Bonus</th>
                                    <th>Paid Bonus</th>
                                    <th>Pending Bonus</th>
                                    <th>
                                        <a href="{{route('client.connection.create',[client()->CIN])}}">
                                             <button class="btn btn-primary">New Connection</button>
                                        </a>
                                    </th>
                                 </tr>
                            </thead>
                            <tbody>
                                @foreach(connections(client()) as $connection)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$connection->first_name}} {{$connection->last_name}}</td>
                                        <td>{{$connection->gender->name}}</td>
                                        <td>{{$connection->email}}</td>
                                        <td>{{$connection->phone}}</td> 
                                        <td><b>#</b>{{$connection->bonusEarnFrom($connection)}}</td>
                                        <td><b>#</b>{{$connection->bonusEarnPaidFrom($connection)}}</td>
                                        <td><b>#</b>{{$connection->bonusEarnNotPaidFrom($connection)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                                                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    