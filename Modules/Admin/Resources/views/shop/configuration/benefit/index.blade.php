@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} benefit configuration page
@endsection
@section('content')
<br>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8"><br>
        <div class="card shadow">
            <div class="card-body">
                <form action="{{route('admin.shop.configuration.benefit.update',[$shop->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if($shop->shopWorkBenefitPlan)
                    <div class="form-group row">
					    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Shop And Its Maintenance') }}</label>
					    <div class="col-md-6">
					        <select class="form-control" name="shop_and_its_maintenance">
					        	<option value="{{$shop->shopWorkBenefitPlan->shop_and_its_maintenance ?? ''}}"><b>%</b>{{$shop->shopWorkBenefitPlan->shop_and_its_maintenance ?? 'Choose Percentage Share'}}</option>
					        	@for($i = 1; $i <= 100; $i++)
					        	    @if($i != $shop->shopWorkBenefitPlan->shop_and_its_maintenance)
					        	        <option value="{{$i}}">% {{$i}}</option>
					        	    @endif
					        	@endfor
					        </select>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Expensive') }}</label>
					    <div class="col-md-6">
					        <select class="form-control" name="work_expensive">
					        	<option value="{{$shop->shopWorkBenefitPlan->work_expensive ?? ''}}"><b>%</b>{{$shop->shopWorkBenefitPlan->work_expensive ?? 'Choose Percentage Share'}}</option>
					        	@for($i = 1; $i <= 100; $i++)
					        	    @if($i != $shop->shopWorkBenefitPlan->work_expensive)
					        	    <option value="{{$i}}">% {{$i}}</option>
					        	    @endif
					        	@endfor
					        </select>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Agent') }}</label>
					    <div class="col-md-6">
					        <select class="form-control" name="work_agent">
					        	<option value="{{$shop->shopWorkBenefitPlan->work_agent ?? ''}}"><b>%</b>{{$shop->shopWorkBenefitPlan->work_agent ?? 'Choose Percentage Share'}}</option>
					        	@for($i = 1; $i <= 100; $i++)
					        	    @if($i != $shop->shopWorkBenefitPlan->work_agent)
					        	        <option value="{{$i}}">% {{$i}}</option>
					        	    @endif
					        	@endfor
					        </select>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Beneficial') }}</label>
					    <div class="col-md-6">
					        <select class="form-control" name="work_beneficial">
					        	<option value="{{$shop->shopWorkBenefitPlan->work_beneficial ?? ''}}"><b>%</b>{{$shop->shopWorkBenefitPlan->work_beneficial ?? 'Choose Percentage Share'}}</option>
					        	@for($i = 1; $i <= 100; $i++)
					        	    @if($i != $shop->shopWorkBenefitPlan->work_beneficial)
					        	        <option value="{{$i}}">% {{$i}}</option>
					        	    @endif
					        	@endfor
					        </select>
					    </div>
					</div>
                    @else
                    <div class="form-group row">
					    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Shop And Its Maintenance') }}</label>
					    <div class="col-md-6">
					        <select class="form-control" name="shop_and_its_maintenance">
					        	<option value=""><b>%</b>Choose Percentage Share</option>
					        	@for($i = 1; $i <= 100; $i++)
					        	    <option value="{{$i}}">% {{$i}}</option>
					        	@endfor
					        </select>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Expensive') }}</label>
					    <div class="col-md-6">
					        <select class="form-control" name="work_expensive">
					        	<option value=""><b>%</b>Choose Percentage Share</option>
					        	@for($i = 1; $i <= 100; $i++)
					        	    <option value="{{$i}}">% {{$i}}</option>
					        	@endfor
					        </select>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Agent') }}</label>
					    <div class="col-md-6">
					        <select class="form-control" name="work_agent">
					        	<option value=""><b>%</b>Choose Percentage Share</option>
					        	@for($i = 1; $i <= 100; $i++)
					        	    <option value="{{$i}}">% {{$i}}</option>
					        	@endfor
					        </select>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Beneficial') }}</label>
					    <div class="col-md-6">
					        <select class="form-control" name="work_beneficial">
					        	<option value=""><b>%</b>Choose Percentage Share</option>
					        	@for($i = 1; $i <= 100; $i++)
					        	    <option value="{{$i}}">% {{$i}}</option>
					        	@endfor
					        </select>
					    </div>
					</div>
                    @endif
					<div class="form-group row">
					    <label for="password" class="col-md-4 col-form-label text-md-right"></label>
					    <div class="col-md-6">
					        <button class="btn btn-primary btn-block">Configure</button>
					    </div>
					</div>
                    
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection
