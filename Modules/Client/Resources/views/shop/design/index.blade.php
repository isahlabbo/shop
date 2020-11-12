@extends('client::layouts.master')

@section('title')
   {{$shop->name}} uploaded designs
@endsection
@section('content')
<br>
<div class="container row">
    @foreach($shop->shopDesigns as $design)
        @include('admin::shop.design.template')
    @endforeach      
</div>    
@endsection
