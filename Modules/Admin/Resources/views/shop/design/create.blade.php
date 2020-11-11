@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} uploaded designs
@endsection
@section('content')
<div class="row">
    <div class="col-md-2"></div>

    <div class="col-md-8"><br>
        <div class="card shadow">
            <div class="card-body">
                <form action="{{route('admin.shop.design.register',[$shop->id,$work->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Description') }}</label>
                        <div class="col-md-8">
                            <textarea id="password" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="new-password">{{$work->description}}</textarea>
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
                            <input type="number" name="fee" id="" value="{{$work->fee}}" class="form-control" placeholder="Specify the work fee">
                            @error('fee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Image') }}</label>
                        <div class="col-md-8">
                            <input type="file" name="design_image" id="" class="form-control" placeholder="Specify the work fee">
                            @error('design_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Work Prove Image') }}</label>
                        <div class="col-md-8">
                            <input type="file" name="prove_image" id="" class="form-control" placeholder="Specify the work fee">
                            @error('prove_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-8">
                            <button class="btn btn-primary btn-block">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 

</div>    
@endsection
