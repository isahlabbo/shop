@extends('client::layouts.master')

@section('title')
    Client Dashboard
@endsection

@section('content')
    <!-- available registered shops in the area -->
    <div class="row">
        @foreach(client()->areaShops() as $areaShop)
            <div class="col-md-3">{{$areaShop->name}}</div>
        @endforeach
    </div>
    <!-- available registered shops in the town -->
    <div class="row">
        @foreach(client()->townShops() as $townShop)
            <div class="col-md-3">{{$townShop->name}}</div>
        @endforeach
    </div>
    <!-- available registered shops in the local government -->
    <div class="row">
        @foreach(client()->localGovernmentShops() as $lgaShop)
            <div class="col-md-3">{{$lgaShop->name}}</div>
        @endforeach
    </div>
    <!-- available registered shops in the state -->
    <div class="row">
        @foreach(client()->stateShops() as $stateShop)
            <div class="col-md-3">{{$areaShop->name}}</div>
        @endforeach
    </div>
@endsection
