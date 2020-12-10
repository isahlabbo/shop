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
            <div class="card-header btn btn-primary">{{$shop->name}} PAID BONUSES</div>
	        <div class="card-body">
	            <table class="table">
	                <thead>
	                    <th>S/N</th>
	                    <th>Customer Name</th>
	                    <th>Description</th>
	                    <th>Paid Bonus</th>
	                    <th>Referral No</th>
	                </thead>
	                <tbody>
	                    @foreach($bonuses as $bonus)
	                    <tr>
	                        <td>{{$loop->index+1}}</td>
	                        <td>{{$loop->index+1}}</td>
	                        <td> {{$bonus->shopClient->client->first_name}} {{$bonus->shopClient->client->last_name}}</td>
	                        <td> {{$bonus->shopClientWork->description}}</td>
	                        <td> # {{$bonus->paid_amount}}</td>
	                        <td>
	                            {{$bonus->shopClientWork->shopClient->client->CIN}}
	                        </td>
	                    </tr>
	                    @endforeach
	                    <tr>
	                    	<td></td>
	                    	<td><b>Total</b></td>
	                    	<td></td>
	                    	<td><b># {{$shop->availablePaidReferralBonusBalance()}}</b></td>
	                    	<td></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>
        </div>
    </div>
</div>
@endsection