@extends('admin::layouts.master')

@section('title')
   {{admin()->first_name}} {{admin()->last_name}} new shop registration
@endsection

@section('content')
    <div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<br>
		<div class="card">
                <div class="card-header" style="background-color: black; color: white">{{ __('New Shop Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Shop Title') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" placeholder="AI Fasion Design" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Work Flow/Day') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="number" class="form-control  @error('work_capacity') is-invalid @enderror" name="work_capacity" value="{{ old('work_capacity') }}" required autocomplete="work_capacity" autofocus>
                                @error('work_capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Shop Design') }}</label>

                            <div class="col-md-6">
                                <select name="design" class="form-control">
                                	<option value="">Design Type</option>
                                </select>
                            </div>
                        </div>

                        @include('registration.address')

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block"> Register</button>
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
@endsection