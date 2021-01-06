@extends('admin::layouts.master')

@section('title')
   {{config('name')}}customer shop referral
@endsection

@section('content')
<div class="row">
    <div class="col-md-3"></div> 
    <div class="col-md-6">
    	<br>
        <div class="card shadow">
        	<div class="card-header btn-primary">Customer shop referral</div>
        	<div class="card-body">
        		<form method="post" action="{{route('admin.shop.customer.referral.register',['direct'])}}">
        			@csrf
        			<div class="form-group row">
				    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Shop') }}</label>
				    <div class="col-md-6">
				        <select class="form-control" name="shop">
				        	<option value="">Choose Shop</option>
				        	@foreach(admin()->shops as $shop)
				        	    <option value="{{$shop->id}}">{{$shop->name}}</option>
				        	@endforeach
				        </select>
				    </div>
				</div>
				
				<div class="form-group row">
				    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Customer Identification number') }}</label>
				    
				    <div class="col-md-6">
				        <input id="password" type="number" class="form-control @error('area') is-invalid @enderror" name="CIN" required autocomplete="area" value="{{old('area')}}">

				        @error('CIN')
				            <span class="invalid-feedback" role="alert">
				                <strong>{{ $message }}</strong>
				            </span>
				        @enderror
				    </div>
				</div>

				<div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </div>
                </div>

        		</form>
        	</div>
        </div>
    </div> 
</div>
@endsection

@section('scripts')

@endsection