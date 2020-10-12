@extends('admin::layouts.master')

@section('title')
    {{$client->first_name}} {{$client->last_name}} measurement
@endsection

@section('content')
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		@if($client->gender_id == 1)
	        @include('client::measurements.male')
	    @else
	        @include('client::measurements.female')
	    @endif
	</div>
</div>
    
@endsection