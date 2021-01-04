<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>

        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>

        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
    <div class="col-md-6">
        <select class="form-control" name="gender">
            <option value="">Gender</option>
            @foreach($genders as $gender)
                <option value="{{$gender->id}}">{{$gender->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('GSM') }}</label>

    <div class="col-md-6">
        <input id="email" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>