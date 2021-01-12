@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} registered apparent in {{date('Y')}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div> 
    <div class="col-md-10">
        <br>
        <a href="{{route('admin.shop.customer.create',[$shop->id])}}">
        <button class="btn btn-primary"><i class="fa fa-plus"> Customer</i></button>
        </a>
        @foreach($shop->shopClients as $shopClient)
        @if($shopClient->client->stageOfThisClient() != 'sub client')
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header btn-primary">
                        @if($shopClient->client->image)
                           <img src="{{storage_url($shopClient->client->image)}}" width="45" height="45" class="radius">
                        @else
                            <img src="{{asset('img/user.png')}}" width="45" height="45" class="radius">
                        @endif
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Name</td>
                                <td>{{$shopClient->client->first_name}} {{$shopClient->client->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{$shopClient->client->phone}}</td>
                            </tr>
                            <tr>
                                <td>CIN</td>
                                <td>{{$shopClient->client->CIN}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="#" data-toggle="modal" data-target="#more_{{$shopClient->id}}">More Info...</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @include('admin::shop.customer.more')
        @endif
        @endforeach
    </div> 
</div>
@endsection

@section('scripts')

@endsection