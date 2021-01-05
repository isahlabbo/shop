@extends('admin::layouts.master')

@section('title')
   {{$shopClient->client->first_name}} {{$shopClient->client->last_name}} new work registration
@endsection

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
        <div class="card-header btn btn-primary">
        {{$shopClient->client->first_name}} {{$shopClient->client->last_name}} new work registration
        </div>
        <div class="card-body">
            <form action="{{route('admin.shop.customer.work.register',[$shopClient->shop->id,$shopClient->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Description') }}</label>
                    <div class="col-md-8">
                        <textarea id="password" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-password"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Fee/ Ammout') }}</label>
                    <div class="col-md-8">
                        <input type="number" name="fee" id="" class="form-control" placeholder="Specify the work fee">
                        @error('fee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Fee/ Ammout Paid') }}</label>
                    <div class="col-md-8">
                        <input type="number" name="paid_fee" id="" class="form-control" placeholder="Specify the fee paid now">
                        @error('fee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Finishing Date') }}</label>
                    <div class="col-md-8">
                        <input type="date" name="finishing_date" id="" class="form-control" placeholder="Specify the work fee">
                        @error('fee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Finishing Time') }}</label>
                    <div class="col-md-8">
                        <input type="time" name="finishing_time" id="" class="form-control" placeholder="Specify the work fee">
                        @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Picture</label>
                    <div class="col-md-8">
                        <input type="file" name="image" id="" class="form-control">
                        @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-8">
                        <button class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection