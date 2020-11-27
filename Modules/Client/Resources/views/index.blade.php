@extends('client::layouts.master')

@section('title')
    Client Dashboard
@endsection

@section('content')
    <!-- available registered shops in the area -->
    <div class="row">
        <div class="col-md-12">{{url('/client/registration/'.client()->CID)}}</div>
        
        @foreach(client()->areaShops() as $areaShop)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('img/intro-img.jpg')}}" alt="" height="200">
                        <table>
                            <tr>
                                <td><b>Title:</b> </td>
                                <td>{{strtolower($areaShop->name)}}</td>
                            </tr>
                            <tr>
                                <td><b>Design:</b> </td>
                                <td>{{strtolower($areaShop->designType->name)}}</td>
                            </tr>
                            <tr>
                                <td><b>Location:</b> </td>
                                <td> {{$areaShop->address->area->town->lga->state->name}} {{$areaShop->address->area->town->lga->name}} {{$areaShop->address->area->town->name}} {{$areaShop->address->area->name}}, {{$areaShop->address->name}}</td>
                            </tr>
                            <tr>
                                <td><b>Uploaded:</b> </td>
                                <td><a href="#" >{{count($areaShop->shopDesigns)}}</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
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
