@if(isset($component['referral']) && $component['referral'])
<div class="form-group row">
	<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Refferal Code') }}</label>
	@if($referral)
	<div class="col-md-6">
	    <input id="password-confirm" type="number" class="form-control" name="referral_code" value="{{$component['data']->referral_code ?? $referral}}" placeholder="Referral Code" disabled="">
	</div>
	@else
	<div class="col-md-6">
	    <input id="password-confirm" type="number" class="form-control" name="referral_code" value="{{$component['data']->referral_code ?? old('refferal_code')}}" placeholder="Refferal Code">
	</div>
	@endif
</div>
@endif