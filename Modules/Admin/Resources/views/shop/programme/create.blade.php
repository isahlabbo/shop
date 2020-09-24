@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} new programme registration page
@endsection

@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <br>
		<div class="card shadow">
                <div class="card-header card-header-primary">{{$shop->name}} {{ __('Programme Registration') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('admin.shop.programme.register',[$shop->id]) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Programme Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Programme Duration in Month') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="duration" value="{{ old('duration') }}" required autocomplete="name" autofocus>

                                        @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Programme Fee') }}</label>

                                    <div class="col-md-6">
                                        <input id="fee" type="number" class="form-control @error('fee') is-invalid @enderror" name="fee" required autocomplete="new-fee">

                                        @error('fee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('About Programme') }}</label>

                                    <div class="col-md-6">
                                    <textarea name="about" id="" cols="30" rows="5" placeholder="Write some thin about the in few sentences"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="morning" id="remember" {{ old('morning') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Morning Schedule') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="evening" id="remember" {{ old('evening') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Evening Schedule') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

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
@endsection