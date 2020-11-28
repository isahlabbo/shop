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
                <th>NAME</th>
                <th>PHONE</th>
                <th>FAMILY MEMBERS</th>
                <th>WORKS</th>
                <th>FINSHED</th>
                <th>UN FINISHED</th>
                <th>BONUS</th>
                <th>REFFERAL</th>
                <th> <a href="{{route('admin.shop.customer.create',[$shop->id])}}"> <button class="btn-secondary btn">New Customer</button> </a></th>
            </thead>
            <tbody>
                @foreach($shop->shopClients as $shopClient)
                @if($shopClient->client->stageOfThisClient() != 'sub client')
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{$shopClient->client->first_name}} {{$shopClient->client->last_name}}</td>
                    <td>{{$shopClient->client->phone}}</td>
                    <td>
                    <a href="{{route('admin.shop.customer.family.member.index',[$shop->id,$shopClient->id])}}" class="btn-primary btn">
                        {{count($shopClient->client->clientFamilyMembers)}}
                    </a>
                    </td>

                    <td>
                        <a href="{{route('admin.shop.customer.work.index',[$shop->id,$shopClient->id])}}" class="btn-primary btn">
                        {{count($shopClient->shopClientWorks)}}
                        </a>
                    </td>
                    <td>{{count($shopClient->shopClientWorks->where('status',1))}}</td>
                    <td>{{count($shopClient->shopClientWorks->where('status',0))}}</td>
                    <td>0</td>
                    <td>{{$shopClient->client->referral_code}}</td>
                    
                    <td>
                        <button class="btn-primary btn">
                            Edit
                        </button>
                        <button class="btn-secondary btn">
                            Delete
                        </button>
                        <a href="{{route('admin.shop.customer.measurement.index',[$shop->id,$shopClient->client->id])}}">
                            <button class="btn-primary btn">
                            Measurement
                            </button>
                        </a> 
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection