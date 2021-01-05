@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} registered apparent in {{date('Y')}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-triped" id="customers">
            <thead>
                <th>S/N</th>
                <th>PICTURE</th>
                <th>NAME</th>
                <th>PHONE</th>
                <th>FAMILY MEMBERS</th>
                <th>WORKS</th>
                <th>FINSHED</th>
                <th>UN FINISHED</th>
                <th>BONUS</th>
                <th>REFFERAL</th>
                <th>CIN</th>
                <th> <a href="{{route('admin.shop.customer.create',[$shop->id])}}"> <button class="btn-secondary btn">New Customer</button> </a></th>
            </thead>
            <tbody>
                @foreach($shop->shopClients as $shopClient)
                @if($shopClient->client->stageOfThisClient() != 'sub client')
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> 
                        @if($shopClient->client->image)
                           <img src="{{storage_url($shopClient->client->image)}}" width="45" height="45" class="radius">
                        @else
                            <img src="{{asset('img/user.png')}}" width="45" height="45" class="radius">
                        @endif
                    </td>
                    <td> {{$shopClient->client->first_name}} {{$shopClient->client->last_name}}</td>
                    <td>{{$shopClient->client->phone}}</td>
                    <td>
                    <a href="{{route('admin.shop.customer.family.member.index',[$shop->id,$shopClient->id])}}" class="btn-primary btn">
                        {{count($shopClient->client->clientFamilyMembers)}} Members
                    </a>
                    </td>

                    <td>
                        <a href="{{route('admin.shop.customer.work.index',[$shop->id,$shopClient->id])}}" class="btn-primary btn">
                        {{count($shopClient->shopClientWorks)}} Works
                        </a>
                    </td>
                    <td>{{count($shopClient->shopClientWorks->where('status',1))}}</td>
                    <td>{{count($shopClient->shopClientWorks->where('status',0))}}</td>
                    <td>0</td>
                    <td>{{$shopClient->client->referral_code}}</td>
                    <td>{{$shopClient->client->CIN}}</td>
                    
                    <td>
                        <a href="{{route('admin.shop.customer.edit',[$shop->id,$shopClient->client->id])}}">
                        <button class="btn-primary btn">
                            Edit
                        </button>
                        </a>
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

@section('scripts')
<script>
    $(function() {
        $('#customers').DataTable({
            
        });
    });
</script>
@endsection