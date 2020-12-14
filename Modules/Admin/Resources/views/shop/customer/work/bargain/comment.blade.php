@extends('admin::layouts.master')

@section('title')
   {{$work->description}} bargain bargain comment
@endsection

@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    	<br>
        <div class="">
        <div class="">
        	<div class="row">
        	@foreach($work->shopClientWorkBargains as $bargain)
        	    @if($bargain->admin_id)
                    <div class="col-sm-10 alert alert-warning">{{$bargain->comment}}</div>
                    <div class="col-sm-2"><img src="{{asset('img/user.png')}}" rounded width="45" height="45"></div>
        	    @else
	        	    <div class="col-sm-2"><img src="{{asset('img/user.png')}}" rounded width="45" height="45"></div>
	                <div class="col-sm-10 alert alert-success">{{$bargain->comment}}</div>
                @endif
        	@endforeach
        	</div>
        	<br>
        	<br>
            <form action="{{route('admin.shop.customer.work.bargain.comment.send',[$shop->id,$work->id])}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label text-sm-right">{{ __('Comment') }}</label>
                    <div class="col-md-8">
                        <textarea id="password" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" required autocomplete="new-password" placeholder="Say your mind about {{$work->description}}"></textarea>
                        @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-8">
                        <button class="btn btn-primary shadow"><i class="fa fa-send"> Send</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection