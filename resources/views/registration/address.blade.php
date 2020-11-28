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
        <textarea id="password" type="text" class="form-control @error('area') is-invalid @enderror" name="address" required autocomplete="address" value="{{old('address')}}"></textarea>

        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

