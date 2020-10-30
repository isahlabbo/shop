@extends('admin::layouts.master')

@section('title')
   {{$client->first_name}} {{$client->first_name}} registered children
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
                <th>CHILDREN</th>
                <th>WIVES</th>
                <th>WORKS</th>
                <th>FINSHED</th>
                <th>UN FINISHED</th>
                <th>BONUS</th>
                <th>REFFERAL</th>
                <th> <a href="{{route('admin.shop.customer.create',[$shop->id])}}"> <button class="btn-secondary btn">New Child</button> </a></th>
            </thead>
            <tbody>
                @foreach($client->clientFamilyMembers as $clientFamilyMember)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{$clientFamilyMember->client->first_name}} {{$clientFamilyMember->client->last_name}}</td>
                    <td>{{$clientFamilyMember->client->phone}}</td>
                    <td>
                    <a href="{{route('admin.shop.customer.children.index',[$shop->id,$clientFamilyMember->id])}}" class="btn-primary btn">
                        {{count($clientFamilyMember->client->clientFamilyMemberren)}}
                    </a>
                    </td>

                    <td>
                    <a href="{{route('admin.shop.customer.work.index',[$shop->id,$clientFamilyMember->id])}}" class="btn-secondary btn">
                        {{count($clientFamilyMember->client->clientWives)}}
                    </a>
                    </td>
                    <td>
                        <a href="{{route('admin.shop.customer.work.index',[$shop->id,$clientChild->id])}}" class="btn-primary btn">
                        {{count($clientChild->shopClientWorks)}}
                        </a>
                    </td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{$shopClient->refferal_code}}</td>
                    
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection