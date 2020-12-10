@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} paid bonuses
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    	<br>
        <div class="card shadow">
            <div class="card-header btn btn-primary">{{$shop->name}} PENDING PAID BONUSES</div>
	        <div class="card-body">
	            <table class="table">
	                <thead>
	                    <th>S/N</th>
	                    <th>Customer Name</th>
	                    <th>Description</th>
	                    <th>Pending Fee</th>
	                    <th>Referral No</th>
	                    <th></th>
	                </thead>
	                <tbody>
	                    @foreach($bonuses as $bonus)
	                    <tr>
	                        <td>{{$loop->index+1}}</td>
	                        <td> {{$bonus->shopClient->client->first_name}} {{$bonus->shopClient->client->last_name}}</td>
	                        <td> {{$bonus->shopClientWork->description}}</td>
	                        <td> # {{$bonus->pendingBonus()}}</td>
	                        <td>
	                            {{$bonus->shopClientWork->shopClient->client->CIN}}
	                        </td>
	                        <td>
	                        	<button class="btn btn-primary" data-toggle="modal" data-target="#bonus_{{$bonus->id}}">Clear Bonus</button>
                                @include('admin::shop.customer.work.payment.bonus.clear')
	                        </td>
	                    </tr>
	                    @endforeach
	                    <tr>
	                    	<td></td>
	                    	<td><b>Total</b></td>
	                    	<td></td>
	                    	<td><b># {{$shop->availableUnPaidReferralBonusBalance()}}</b></td>
	                    	<td></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>
        </div>
    </div>
</div>
@endsection