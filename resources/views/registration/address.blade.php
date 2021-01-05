@if(isset($component['address']) && $component['address'] && !isset($component['data']))
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

    <div class="col-md-6">
        <select class="form-control" name="country">
        	<option value="1">Nigeria</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="state">
        	<option value="">Choose State</option>
        	@foreach($states as $state)
        	    <option value="{{$state->id}}">{{$state->name}}</option>
        	@endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('LGA') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="lga">
        	<option value="">Choose LGA</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Town') }}</label>
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('area') is-invalid @enderror" name="town" required autocomplete="town" value="{{old('town')}}">

        @error('town')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('area') is-invalid @enderror" name="area" required autocomplete="area" value="{{old('area')}}">

        @error('area')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
    <div class="col-md-6">
        <textarea id="password" type="text" class="form-control @error('area') is-invalid @enderror" name="address" required autocomplete="address">{{old('address')}}</textarea>

        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@elseif(isset($component['data']))
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

    <div class="col-md-6">
        <select class="form-control" name="country">
            <option value="1">Nigeria</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="state">
            <option value="{{$component['data']->address->area->town->lga->state->id}}">{{$component['data']->address->area->town->lga->state->name}}</option>
            @foreach($states as $state)
                @if($state->id != $component['data']->address->area->town->lga->state->id)
                <option value="{{$state->id}}">{{$state->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('LGA') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="lga">
            <option value="{{$component['data']->address->area->town->lga->id}}">{{$component['data']->address->area->town->lga->name}}</option>
            @foreach($component['data']->address->area->town->lga->state->lgas as $lga)
                @if($lga->id != $component['data']->address->area->town->lga->id)
                <option value="{{$lga->id}}">{{$lga->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Town') }}</label>
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('area') is-invalid @enderror" name="town" required autocomplete="town" value="{{$component['data']->address->area->town->name}}">

        @error('town')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('area') is-invalid @enderror" name="area" required autocomplete="area" value="{{$component['data']->address->area->name}}">

        @error('area')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
    <div class="col-md-6">
        <textarea id="password" type="text" class="form-control @error('area') is-invalid @enderror" name="address" required autocomplete="address">{{$component['data']->address->name}}</textarea>

        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endif
