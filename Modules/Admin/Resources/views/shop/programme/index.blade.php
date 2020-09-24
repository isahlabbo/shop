@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} registered programmes
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-triped">
            <thead>
                <th>S/N</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Morning Schedule</th>
                <th>Evening Schedule</th>
                <th> 
                    <a href="{{route('admin.shop.programme.create',[$shop->id])}}"> 
                    <button class="btn-secondary btn">New Programme</button> </a>
                </th>
            </thead>
            <tbody>
                @foreach($shop->programmes as $programme)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{$programme->name}}</td>
                    <td> {{$programme->duration}}</td>
                    <td>{{$programme->fee}}</td>
                    <td>
                        {{$programme->hasMorningSchedule() ? 'Acive' : 'Not Active'}}
                    </td>
                    <td>
                        {{$programme->hasEveningSchedule() ? 'Acive' : 'Not Active'}}
                    </td>
                    <td>
                        <button class="btn-primary btn">
                            Edit
                        </button>
                        <button class="btn-secondary btn">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection