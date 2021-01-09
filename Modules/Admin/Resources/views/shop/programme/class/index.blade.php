@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} / {{$programme->name}} registered classes
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-triped">
            <thead>
                <th>S/N</th>
                <th>Name</th>
                <th>Start At</th>
                <th>End At</th>
                <th>Current Week</th>
                <th>Current Week Topic</th>
                <th> 
                    <a href="#" data-toggle="modal" data-target="#newClass"> 
                    <button class="btn-secondary btn">New Class</button> </a>
                </th>
            </thead>
            <tbody>
                @foreach($programme->programmeClasses as $class)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{$class->name}}</td>
                    <td> {{$class->start}}</td>
                    <td>{{$class->end}}</td>
                    <td>{{$class->present()->week ?? 'Un define week'}}</td>
                    <td>{{$class->present()->topic ?? 'Un define topic'}}</td>
                    
                    <td>
                        <button class="btn-primary btn" data-toggle="modal" data-target="#class_{{$class->id}}">
                            Edit
                        </button>

                        <a href="{{route('admin.shop.programme.class.delete',[$shop->id,$programme->id,$class->id])}}" onclick="return confirm('Are you sure you want to delete this class ?')">
                        <button class="btn-secondary btn">
                            Delete
                        </button>
                        </a>
                    </td>
                </tr>
                @include('admin::shop.programme.class.edit')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin::shop.programme.class.create')

@endsection