@extends('admin::layouts.master')

@section('content')
<div class="row">

    <div class="col-md-1"></div>
    <div class="col-md-10">
    <br>
    <div class="card shadow">
    	<div class="card-header btn-primary">Your Available Shops Activities Analysis</div>
    	<div class="card-body">
    		<div class="row">
    			@foreach(admin()->shops as $shop)
    			
    			<div class="col-md-3">
    				<div class="card shadow">
    					<div class="card-header btn-secondary">{{$shop->name}}</div>
    					<div class="card-body">
    						<table class="table table-responsive">
    							<tr>
    								<td>Apparentes</td>
    								<td>{{count($shop->apparents)}}</td>
    							</tr>
    							<tr>
    								<td>Customers</td>
    								<td>{{count($shop->shopClients)}}</td>
    							</tr>
    							<tr>
    								<td>Designs</td>
    								<td>{{count($shop->shopDesigns)}}</td>
    							</tr>
    							<tr>
    								<td>Programmes</td>
    								<td>{{count($shop->programmes)}}</td>
    							</tr>
    							<tr>
    								<td>Available Works</td>
    								<td>{{count($shop->availableWorks())}}</td>
    							</tr>
    						</table>
    					</div>
    				</div>
    			</div>

                <br>
    			
    			@endforeach
    		</div>
    	</div>
    </div>
    </div>    
</div>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <br>
    <div class="card shadow">
    	<div class="card-header btn-primary">Your Available Shops Income Analysis</div>
    	<div class="card-body">
    		<div class="row">
    			@foreach(admin()->shops as $shop)
    			
    			<div class="col-md-3">
    				<div class="card shadow">
    					<div class="card-header btn-secondary">{{$shop->name}}</div>
    					<div class="card-body">
    						<table class="table table-responsive">
    							<tr>
    								<td>Paid</td>
    								<td><b>#</b>{{$shop->availablePaidBalance()}}</td>
    							</tr>
    							<tr>
    								<td>Pending Payment</td>
    								<td><b>#</b>{{$shop->availableUnPaidBalance()}}</td>
    							</tr>

    							<tr>
    								<td>Paid Referral Bonus</td>
    								<td><b>#</b>{{$shop->availablePaidReferralBonusBalance()}}</td>
    							</tr>

    							<tr>
    								<td>Pending Referral Bonus</td>
    								<td><b>#</b>{{$shop->availableUnPaidReferralBonusBalance()}}</td>
    							</tr>

    						</table>
    					</div>
    				</div>
    			</div>

                <br>
    			
    			@endforeach
    		</div>
    	</div>
    </div>
    </div>    
</div>    
@endsection
