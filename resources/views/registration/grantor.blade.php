@if(isset($component['data']))
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Name') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('grantor_name') is-invalid @enderror" name="grantor_name" required autocomplete="new-password" value="{{$component['data']->grantor->name}}">

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
        <select class="form-control" name="grantor_gender">
            <option value="{{$component['data']->grantor->gender->id ?? ''}}">{{$component['data']->grantor->gender->name ?? 'Grantor Gender'}}</option>
            @foreach($genders as $gender)
                @if($component['data']->grantor->gender->id ?? '' != $gender->id)
                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Email') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="email" class="form-control @error('grantor_email') is-invalid @enderror" name="grantor_email" required autocomplete="new-password" value="{{$component['data']->grantor->email}}">

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
        <input id="password" type="text" class="form-control @error('grantor_phone') is-invalid @enderror" name="grantor_phone" required autocomplete="new-password" value="{{$component['data']->grantor->phone}}">

        @error('grantor_phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Existing Grantor Image') }}</label>

    <div class="col-md-6">
        <img src="{{storage_url($component['data']->grantor->image)}}" width="200" height="70">
    </div>
</div>
<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Change Grantor Image') }}</label>

    <div class="col-md-6">
        <input id="grantor_image" type="file" class="form-control" name="grantor_image" autocomplete="grantor_image">
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor State') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="grantor_state">
            <option value="{{$component['data']->grantor->address->area->town->lga->state->id}}">{{$component['data']->grantor->address->area->town->lga->state->name}}</option>
            @foreach($states as $state)
                @if($component['data']->grantor->address->area->town->lga->state->id != $state->id)
                <option value="{{$state->id}}">{{$state->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor LGA') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="grantor_lga">
            <option value="{{$component['data']->grantor->address->area->town->lga->id}}">{{$component['data']->grantor->address->area->town->lga->name}}</option>
            @foreach($component['data']->grantor->address->area->town->lga->state->lgas as $lga)
                @if($component['data']->grantor->address->area->town->lga->id != $lga->id)
                <option value="{{$lga->id}}">{{$lga->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Grantor Town') }}</label>
    <div class="col-md-6">
        <input id="password" type="text" class="form-control @error('grantor_town') is-invalid @enderror" name="grantor_town" required autocomplete="new-password" value="{{$component['data']->grantor->address->area->town->name}}">

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
        <input id="password" type="text" class="form-control @error('grantor_area') is-invalid @enderror" name="grantor_area" required autocomplete="new-password" value="{{$component['data']->grantor->address->area->name}}">

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
        <textarea id="password" type="text" class="form-control @error('grantor_address') is-invalid @enderror" name="grantor_address" required autocomplete="new-password">{{$component['data']->grantor->address->name}}</textarea>

        @error('grantor_address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@else
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
@endif