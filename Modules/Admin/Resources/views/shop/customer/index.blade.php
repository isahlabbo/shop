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
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADDRESS</th>
                <th>FINSHED</th>
                <th>UN FINISHED</th>
                <th>BONUS</th>
                <th>REFFERAL</th>
                <th></th>
                <th> <a href="{{route('admin.shop.customer.create',[$shop->id])}}"> <button class="btn-secondary btn">New Customer</button> </a></th>
            </thead>
            <tbody>
                @foreach($shop->shopClients as $shopClient)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{$shopClient->client->first_name}} {{$shopClient->client->last_name}}</td>
                    <td>{{$shopClient->client->email}}</td>
                    <td>{{$shopClient->client->phone}}</td>
                    <td>{{$shopClient->client->address->name}}</td>
                    <td>{{$shopClient->client->gender->name}}</td>
                    <td>{{$shopClient->client->religion->name}}</td>
                    <td>{{$shopClient->client->tribe->name}}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#grantor_{{$shopClient->client->grantor->id}}"> 
                            <button class="btn-primary btn">
                                Grantor
                            </button> 
                        </a>
                    </td>
                    <td>
                        <button class="btn-primary btn">
                            Edit
                        </button>
                        <button class="btn-secondary btn">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection