@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} registered apparent in {{date('Y')}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table">
            <thead>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>STATE</th>
                <th>LGA</th>
                <th>AREA</th>
                <th>ADDRESS</th>
                <th>GENDER</th>
                <th>RELIGION</th>
                <th>TRIBE</th>
                <th>GRANTOR</th>
                <th> <a href="{{route('admin.shop.apparent.create',[$shop->id])}}"> <button class="btn-secondary btn">New Apparent</button> </a></th>
            </thead>
        </table>
    </div>
</div>
@endsection