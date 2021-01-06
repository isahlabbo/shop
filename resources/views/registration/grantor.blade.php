<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Name') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('grantor_name') is-invalid @enderror" name="grantor_name" required autocomplete="new-password">

        @error('grantor_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Gender') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="grantor_state">
        	<option value="">Choose Grantor Gender</option>
        	@foreach($genders as $gender)
        	    <option value="{{$gender->id}}">{{$gender->name}}</option>
        	@endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Email') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="email" class="form-control @error('grantor_email') is-invalid @enderror" name="grantor_email" required autocomplete="new-password">

        @error('grantor_email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Phone') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('grantor_phone') is-invalid @enderror" name="grantor_phone" required autocomplete="new-password">

        @error('grantor_phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Image') }}</label>

    <div class="col-md-6">
        <input id="grantor_image" type="file" class="form-control" name="grantor_image" required autocomplete="grantor_image">
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor State') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="grantor_state">
        	<option value="">Choose Grantor State</option>
        	@foreach($states as $state)
        	    <option value="{{$state->id}}">{{$state->name}}</option>
        	@endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor LGA') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="grantor_lga">
        	<option value="">Choose Grantor LGA</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Town') }}</label>
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('grantor_town') is-invalid @enderror" name="grantor_town" required autocomplete="new-password">

        @error('grantor_town')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Area') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('grantor_area') is-invalid @enderror" name="grantor_area" required autocomplete="new-password">

        @error('grantor_area')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Address') }}</label>
 
    <div class="col-md-6">
        <textarea id="password" type="text" class="form-control @error('grantor_address') is-invalid @enderror" name="grantor_address" required autocomplete="new-password"></textarea>

        @error('grantor_address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>