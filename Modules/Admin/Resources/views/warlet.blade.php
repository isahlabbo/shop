@extends('admin::layouts.master')
@section('title')
   SEWMYCLOTH Shop Admin Shop Warlet
@endsection
@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <br>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                @foreach(admin()->shopAdmins as $shopAdmin)
                    <div class="card shadow">
                    	<div class="card-header card-header-primary">{{$shopAdmin->shop->name}} WARLET</div>
				        <div class="card-body">
				            <table class="table">
				            	<tr>
				            		<td>Total Partispation Commission</td>
				            		<td>#{{$shopAdmin->totalParstispationCommission()}}</td>
				            	</tr>

				            	<tr>
				            		<td>Paid Partispation Commission</td>
				            		<td>#{{$shopAdmin->paidParstispationCommission()}}</td>
				            	</tr>

				            	<tr>
				            		<td>Balance Partispation Commission</td>
				            		<td>#{{$shopAdmin->balanceParstispationCommission()}}</td>
				            	</tr>

				            	<tr>
				            		<td>Agent Commission</td>
				            		<td># 0</td>
				            	</tr>

				            	<tr>
				            		<td>Debit Card Balance</td>
				            		<td># {{$shopAdmin->debitCardBalance()}}</td>
				            	</tr>
				            </table> 	
				        </div>
			        </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>    
</div>


@endsection
