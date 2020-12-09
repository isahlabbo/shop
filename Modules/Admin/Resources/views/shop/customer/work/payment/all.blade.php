@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} total reghistered works
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    	<br>
        <div class="card shadow">
            <div class="card-header btn btn-primary">{{$shop->name}} TOTAL REGISTERED WORKS</div>
	        <div class="card-body">
	            <table class="table">
	                <thead>
	                    <th>S/N</th>
	                    <th>Customer Name</th>
	                    <th>Description</th>
	                    <th>Fee</th>
	                    <th></th>
	                </thead>
	                <tbody>
	                    @foreach($works as $work)
	                    <tr>
	                        <td>{{$loop->index+1}}</td>
	                        <td> {{$work->shopClient->client->first_name}} {{$work->shopClient->client->last_name}}</td>
	                        <td> {{$work->description}}</td>
	                        <td> # {{$work->fee}}</td>
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
	                    <tr>
	                    	<td></td>
	                    	<td><b>Total</b></td>
	                    	<td></td>
	                    	<td><b># {{$shop->availableBalance()}}</b></td>
	                    	<td></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>
        </div>
    </div>
</div>
@endsection