@extends('client::layouts.master')

@section('title')
    SEWMYCLOTH search shops
@endsection

@section('content')
<div class="row">
	<div class="col-md-3"></div>
    <br>
	<div class="col-md-6 card shadow">
    <br>
		<form action="{{route('client.shop.search')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Country</label>
                <div class="col-md-6">
                    <select name="country" id="" class="form-control">
                        <option value="1">Nigeria</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">State</label>
                <div class="col-md-6">
                    <select name="state" id="" class="form-control">
                        <option value="">Chose State</option>
                        @foreach($states as $state)
                           <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Local Government</label>
                <div class="col-md-6">
                    <select name="lga" id="" class="form-control">
                        <option value="">Chose LGA</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Town</label>
                <div class="col-md-6">
                    <select name="town" id="" class="form-control">
                        <option value="">Chose Town</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Area</label>
                <div class="col-md-6">
                    <select name="area" id="" class="form-control">
                        <option value="">Chose Area</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Address</label>
                <div class="col-md-6">
                    <select name="address" id="" class="form-control">
                        <option value="">Chose Address</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block">Search</button>
                </div>
            </div>
        </form>
	</div>
</div>    
@endsection

@section('scripts')
    <script src="{{asset('js/Ajax/address.js')}}"></script>
    <script src="{{asset('js/Ajax/lgaTown.js')}}"></script>
    <script src="{{asset('js/Ajax/townArea.js')}}"></script>
    <script src="{{asset('js/Ajax/areaAddress.js')}}"></script>
@endsection