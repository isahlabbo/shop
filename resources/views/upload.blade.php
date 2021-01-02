
@extends('layouts.minimal')

@section('title')
 Client login page
@endsection

@section('content')
<div class="row card">
	<div class="card-body">
	@foreach($images as $image)
       <div class="col-md-3"><img src="{{storage_url($image->location)}}"></div>
	@endforeach
	</div>
</div>
<br>
<br>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<form method="post" action="{{route('upload.send')}}" enctype="multipart/form-data">
			@csrf
			<input type="file" name="image" class="form-control">
			<br>
			<button class="btn-primary btn-block">Upload</button>
		</form>
	</div>
</div>
@endsection