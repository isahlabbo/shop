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
            <form action="{{route('admin.shop.customer.work.register',[$shopClient->shop->id,$shopClient->id])}}" method="post">
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