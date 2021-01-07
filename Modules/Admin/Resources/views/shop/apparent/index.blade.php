@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} registered apparent in {{date('Y')}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-triped">
            <thead>
                <th>S/N</th>
                <th>PICTURE</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADDRESS</th>
                <th>GENDER</th>
                <th>RELIGION</th>
                <th>TRIBE</th>
                <th>PROGRAMME</th>
                <th></th>
                <th> <a href="{{route('admin.shop.apparent.create',[$shop->id])}}"> <button class="btn-secondary btn">New Apparent</button> </a></th>
            </thead>
            <tbody>
                @foreach($shop->apparents as $apparent)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> <img src="{{storage_url($apparent->image)}}" height="45" width="45"> </td>
                    <td> {{$apparent->first_name}} {{$apparent->last_name}}</td>
                    <td>{{$apparent->email}}</td>
                    <td>{{$apparent->phone}}</td>
                    <td>{{$apparent->address->name ?? ''}}</td>
                    <td>{{$apparent->gender->name ?? ''}}</td>
                    <td>{{$apparent->religion->name ?? ''}}</td>
                    <td>{{$apparent->tribe->name ?? ''}}</td>
                    <td>{{$apparent->programme->name ?? ''}}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#grantor_{{$apparent->grantor->id ?? ''}}"> 
                            <button class="btn-primary btn" data-toggle="modal" data-target="#grantor_{{$apparent->id}}">
                                Grantor
                            </button> 
                        </a>
                        @include('admin::shop.apparent.grantor')

                    </td>
                    <td>
                        <a href="{{route('admin.shop.apparent.edit',[$shop->id,$apparent->id])}}" >
                            <button class="btn-primary btn">
                                Edit
                            </button>
                        </a>
                        <a href="{{route('admin.shop.apparent.delete',[$shop->id,$apparent->id])}}" onclick="return confirm('Are you sure you want to delete this apparent from your shop')">
                            <button class="btn-secondary btn">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection