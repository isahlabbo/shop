@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} edit apparent information
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <br>
		<div class="card">
                <div class="card-header card-header-primary">{{$shop->name}} {{ __('Apparent Registration') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('admin.shop.apparent.update',[$shop->id,$component['data']->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ $component['data']->first_name }}" required autocomplete="name" autofocus>

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
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ $component['data']->last_name }}" required autocomplete="name" autofocus>

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
                                            <option value="{{$component['data']->gender->id}}">{{$component['data']->gender->name}}</option>
                                            @foreach($genders as $gender)
	                                            @if($gender->id != $component['data']->gender->id)
	                                                <option value="{{$gender->id}}">{{$gender->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $component['data']->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('GSM') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $component['data']->phone }}" required autocomplete="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Existing Image') }}</label>

                                    <div class="col-md-6">
                                        <img src="{{storage_url($component['data']->image)}}" width="200" height="70">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Change Apparent Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="apparent_image" type="file" class="form-control" name="apparent_image" autocomplete="apparent_image">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Programme') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="programme">
                                            <option value="{{$component['data']->programme->id}}">{{$component['data']->programme->name}}</option>
                                            @foreach($shop->programmes as $programme)
                                                @if($component['data']->programme->id != $programme->id)
                                                <option value="{{$programme->id}}">{{$programme->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Religion') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="religion">
                                            <option value="{{$component['data']->religion->id}}">{{$component['data']->religion->name}}</option>
                                            @foreach($religions as $religion)
	                                            @if($component['data']->religion->id != $religion->id)
	                                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Tribe') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="tribe">
                                            <option value="{{$component['data']->tribe->id}}">{{$component['data']->tribe->name}}</option>
                                            @foreach($tribes as $tribe)
	                                            @if($component['data']->tribe->id != $tribe->id)
                                                    <option value="{{$tribe->id}}">{{$tribe->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @include('registration.address')
                            </div>

                            <div class="col-md-4">
                                @include('registration.grantor')
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Update') }}
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
    <script src="{{asset('js/Ajax/address.js')}}"></script>
    <script src="{{asset('js/Ajax/grantorAddress.js')}}"></script>
@endsection