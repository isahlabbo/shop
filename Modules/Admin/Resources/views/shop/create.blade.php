@extends('admin::layouts.master')

@section('title')
   {{admin()->first_name}} {{admin()->last_name}} new shop registration
@endsection

@section('content')
    <div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<br>
		<div class="card">
                <div class="card-header" style="background-color: black; color: white">{{ __('New Shop Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.shop.registration') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Shop Picture') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="file" class="form-control  @error('name') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="name" autofocus>

                                @error('image')
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
                                    @foreach($designTypes as $designType)
                                        <option value="{{$designType->id}}">{{$designType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Referral Fee Limit') }}</label>

                            <div class="col-md-6">
                                <select name="fee_limit" class="form-control">
                                    <option value="">Choose Limit</option>
                                    @foreach(referralFeeLimit() as $limit)
                                        <option value="{{$limit}}">{{$limit}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Referral Bonus') }}</label>

                            <div class="col-md-6">
                                <select name="referral_bonus" class="form-control">
                                    <option value="">Choose Bonus Plan</option>
                                    @foreach(referralBonus() as $bonus)
                                        <option value="{{$bonus}}">{{$bonus}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Shop words') }}</label>
                            
                            <div class="col-md-6">
                                <textarea id="password" type="text" class="form-control @error('words') is-invalid @enderror" name="words" required autocomplete="word" placeholder="Write 1 to 2 sentences to identify your shop"></textarea>

                                @error('words')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('About Shop') }}</label>
                            
                            <div class="col-md-6">
                                <textarea id="password" type="text" class="form-control @error('about') is-invalid @enderror" name="about" required autocomplete="about" placeholder="Write 5 to 10 sentences about your shop"></textarea>

                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @include('registration.address')
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block"> Register</button>
                            </div>
                        </div>
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