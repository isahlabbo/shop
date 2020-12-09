@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} expected work for {{date('d-M-Y',time())}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    	<br>
        <div class="card shadow">
            <div class="card-header btn btn-primary">{{$shop->name}} WORKS FOR {{date('d/M/Y',time())}}</div>
	        <div class="card-body">
	            <table class="table">
	                <thead>
	                    <th>S/N</th>
	                    <th>Customer Name</th>
	                    <th>Description</th>
	                    <th>Fee</th>
	                    <th>paid</th>
	                    <th>Pending Payment</th>
	                    <th>Finishing Date</th>
	                    <th>Finishing Time</th>
	                    <th>Registered At</th>
	                    <th>Status</th>
	                    <th>
	                    </th>
	                    <th></th>
	                </thead>
	                <tbody>
	                    @foreach($shop->workExpectedToBeCompletedToaday() as $work)
	                    <tr>
	                        <td>{{$loop->index+1}}</td>
	                        <td> {{$work->description}}</td>
	                        <td> {{$work->shopClient->client->first_name}} {{$work->shopClient->client->last_name}}</td>
	                        <td> # {{$work->fee}}</td>
	                        <td> # {{$work->paid_fee}}</td>
	                        <td> # {{$work->fee - $work->paid_fee}}</td>
	                        <td> {{date('d/M/Y',strtotime($work->finishing_date))}}</td>
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
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
        </div>
    </div>
</div>
@endsection