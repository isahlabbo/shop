@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} registered apparent in {{date('Y')}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <br>
        <div class="card shadow">
        <div class="card-header btn btn-primary">{{strtoupper($shopClient->client->first_name)}} {{strtoupper($shopClient->client->last_name)}} REGISTERED WORKS IN {{$shop->name}}</div>
        <div class="card-body">
            <table class="table table-triped">
                <thead>
                    <th>S/N</th>
                    <th>Sample</th>
                    <th>Description</th>
                    <th>Fee</th>
                    <th>paid</th>
                    <th>Pending Payment</th>
                    <th>Finishing Date</th>
                    <th>Finishing Time</th>
                    <th>Registered At</th>
                    <th>Status</th>
                    <th> <a href="{{route('admin.shop.customer.work.create',[$shop->id,$shopClient->id])}}"> <button class="btn-secondary btn">Add Work</button> </a>
                    </th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($shopClient->shopClientWorks as $work)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td> <img src="{{storage_url($work->cloth_image)}}" width="45" height="45"></td>
                        <td> {{$work->description}}</td>
                        <td> #{{$work->fee}}</td>
                        <td> #{{$work->paid_fee}}</td>
                        <td> #{{$work->fee - $work->paid_fee}}</td>
                        <td> {{date('1-M-Y',strtotime($work->finishing_date))}}</td>
                        <td> {{$work->finishing_time}}</td>
                        <td>{{$work->created_at}}</td>
                        <td>{{$work->status == 0 ? 'Processing...' : 'Finished'}}</td>
                        <td>
                        @if($work->status == 0)
                            <a href="{{route('admin.shop.customer.work.done',[$shop->id,$work->id])}}" >
                            <button class="btn-primary btn" onclick="return confirm('are you sure you are true with this work')"> 
                                Done
                            </button>
                            </a>
                        @elseif($work->status == 1)
                            <button class="btn-primary btn"> 
                                <a href="{{route('admin.shop.customer.work.collect',[$shop->id,$work->id])}}" style="color: white">Collected</a>
                            </button>
                        @elseif($work->status == 2)
                            <button class="btn-primary btn" data-toggle="modal" data-target="#benefit_{{$work->id}}"> 
                                <i class="fa fa-share"> <b>#</b> {{$work->shareableBalance()}}</i>
                            </button>
                           @include('admin::shop.customer.work.shareBenefit')  

                        @else
                            <button class="btn-primary btn"> 
                                <a href="{{route('admin.shop.design.create',[$shop->id,$work->id])}}" style="color: white">Upload Work</a>
                            </button>    
                        @endif      
                        </td>
                        <td>
                            @if($work->fee > $work->paid_fee)
                            <button class="btn-secondary" data-toggle="modal" data-target="#work_{{$work->id}}">
                                Pay #{{$work->fee - $work->paid_fee}} Now
                            </button>
                            @include('admin::shop.customer.work.payWork')
                            @else
                                Paid
                            @endif
                        </td>
                        <td>
                            <button class="btn-secondary" data-toggle="modal" data-target="#update_{{$work->id}}"><i class="fa fa-eye"></i> Edit</button>
                           @include('admin::shop.customer.work.bargain.update')  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection