@extends('admin::layouts.master')

@section('title')
   {{$client->first_name}} {{$client->first_name}} registered family member
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-triped">
            <thead>
                <th>S/N</th>
                <th>NAME</th>
                <th>RELATION</th>
                <th>PHONE</th>
                <th>WORKS</th>
                <th>FINISHED</th>
                <th>UN FINISHED</th>
                <th> <a href="{{route('admin.shop.customer.family.member.create',[$shop->id,$client->id])}}"> <button class="btn-secondary btn">New Family Member</button> </a></th>
            </thead>
            <tbody>
                @foreach($client->clientFamilyMembers as $clientFamilyMember)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{$clientFamilyMember->subClient()->first_name}} {{$clientFamilyMember->subClient()->last_name}}</td>
                    <td> {{$clientFamilyMember->relation->name}}</td>
                    <td>{{$clientFamilyMember->subClient()->phone}}</td>
                    <td>
                        <a href="{{route('admin.shop.customer.work.index',[$shop->id,$clientFamilyMember->subClient()->getThisShopClient($shop)->id])}}" class="btn-primary btn">
                        {{count($clientFamilyMember->subClient()->getThisShopClient($shop)->shopClientWorks)}}
                        </a>
                    </td>
                    <td>0</td>
                    <td>0</td>
                    <td>
                        <button class="btn-primary btn">
                            Edit
                        </button>
                        <button class="btn-secondary btn">
                            Delete
                        </button>
                        <a href="{{route('admin.shop.customer.measurement.index',[$shop->id,$clientFamilyMember->subClient()->id])}}">
                            <button class="btn-primary btn">
                            Measurement
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