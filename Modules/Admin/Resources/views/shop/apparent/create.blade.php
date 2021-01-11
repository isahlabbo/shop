@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} new apparent {{date('Y')}} registration page
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <br>
		<div class="card">
                <div class="card-header card-header-primary">{{$shop->name}} {{ __('Apparent Registration') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('admin.shop.apparent.register',[$shop->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
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
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        <input id="email" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Apparent Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="apparent_image" type="file" class="form-control" name="apparent_image" required autocomplete="apparent_image">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Programme') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="programme">
                                            <option value="">Choose Programme</option>
                                            @foreach($shop->programmes as $programme)
                                                <option value="{{$programme->id}}">{{$programme->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Programme Class') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="class">
                                            <option value="">Choose Programme Class</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="discount">
                                            @for($i=0; $i <= 100; $i++)
                                            <option value="{{$i}}">% {{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Religion') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="religion">
                                            <option value="">Religion</option>
                                            @foreach($religions as $religion)
                                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Tribe') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="tribe">
                                            <option value="">Tribe</option>
                                            @foreach($tribes as $tribe)
                                                <option value="{{$tribe->id}}">{{$tribe->name}}</option>
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
                                    {{ __('Register') }}
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
    <script src="{{asset('js/Ajax/programmeClass.js')}}"></script>
@endsection