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
                        <button class="btn-primary btn" data-toggle="modal" data-target="#programme_{{$programme->id}}">
                            Edit
                        </button>
                        <a href="{{route('admin.shop.programme.delete',[$shop->id,$programme->id])}}" 
                            onclick="return confirm('Are you sure you want to delete this programme')">
                        <button class="btn-secondary btn">
                            Delete
                        </button>
                        </a>
                        <a href="{{route('admin.shop.programme.schedule.index',[$shop->id,$programme->id])}}">
                            <button class="btn-primary btn">
                                Time Table
                            </button>
                        </a>
                    </td>
                </tr>
                @include('admin::shop.programme.edit')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection