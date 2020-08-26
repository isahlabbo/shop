@extends('layouts.minimal')

@section('title')
 Client login page
@endsection

@section('content')
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<form class="">
			<input type="text" name="username" class="form-control"><br>
			<input type="password" name="password" class="form-control">
		</form>
	</div>
</div>
@endsection