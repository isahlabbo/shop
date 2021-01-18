@extends('admin::layouts.master')
@section('title')
   SEWMYCLOTH Shop Admin Dasboard
@endsection
@section('content')
<div class="row">

    <div class="col-md-1"></div>
    <div class="col-md-10">
    <br>
    <div class="card shadow">
        <div class="card-header btn-primary">Your Available Shop Works For {{date('d/M/Y',time())}}</div>
        <div class="card-body">
            <div class="row">
                @foreach(admin()->shops as $shop)
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-header btn-secondary">{{$shop->name}}</div>
                            <div class="card-body">
                                <table class="table">
                                   
                                    <tr>
                                        
                                        <td>
                                            <a href="{{route('admin.shop.customer.work.bargain.index',[$shop->id])}}">{{count($shop->availableWorksToBargain())}}  {{count($shop->availableWorksToBargain())>1 ? 'of your Customers':'of your Customer'}} want to give you work click to view the {{count($shop->availableWorksToBargain())>1 ? 'works':'work'}}</a>
                                        </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        
                                        <td><a href="{{route('admin.shop.customer.work.today.index',[$shop->id])}}">You have {{count($shop->workExpectedToBeCompletedToaday())}} {{count($shop->workExpectedToBeCompletedToaday())>1 ? 'works':'work'}} to complete in this shop taday</a>
                                        </td>
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

<!-- shop activities start -->

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
    								<td>
                                    <a href="{{ route('admin.shop.apparent.index',[$shop->id]) }}">
                                        {{count($shop->apparents)}}
                                    </a></td>
    							</tr>
    							<tr>
    								<td>Customers</td>
    								<td>
                                        <a href="{{ route('admin.shop.customer.index',[$shop->id]) }}">{{count($shop->shopClients)}}</a>
                                    </td>
    							</tr>
    							<tr>
    								<td>Designs</td>
    								<td>
                                    <a href="{{ route('admin.shop.design.index',[$shop->id]) }}">
                                        {{count($shop->shopDesigns)}}
                                    </a></td>
    							</tr>
    							<tr>
    								<td>Programmes</td>
    								<td>
                                        <a href="{{ route('admin.shop.programme.index',[$shop->id]) }}">{{count($shop->programmes)}}
                                        </a>
                                    </td>
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
    								<td>Total Work Fees</td>
    								<td><a href="{{route('admin.shop.payment.totalFee',[$shop->id])}}">#{{$shop->availableBalance()}}</a></td>
    							</tr>
                                <tr>
                                    <td>Paid Fee</td>
                                    <td><a href="{{route('admin.shop.payment.paidFee',[$shop->id])}}"><b>#</b>{{$shop->availablePaidBalance()}}</a></td>
                                </tr>
    							<tr>
    								<td>Pending Payment</td>
    								<td><a href="{{route('admin.shop.payment.pendingFee',[$shop->id])}}"><b>#</b>{{$shop->availableUnPaidBalance()}}</a></td>
    							</tr>

    							<tr>
    								<td>Paid Referral Bonus</td>
    								<td><a href="{{route('admin.shop.payment.paidBonus',[$shop->id])}}"><b>#</b>{{$shop->availablePaidReferralBonusBalance()}}</a></td>
    							</tr>

    							<tr>
    								<td>Pending Referral Bonus</td>
    								<td><a href="{{route('admin.shop.payment.pendingBonus',[$shop->id])}}"><b>#</b>{{$shop->availableUnPaidReferralBonusBalance()}}</a></td>
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
