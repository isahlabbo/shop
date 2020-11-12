@extends('client::layouts.master')

@section('title')
    SEWMYCLOTH shops search results
@endsection

@section('content')
<br>
<div class="container row">
	@foreach($shops as $shop)
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <img src="{{asset('img/intro-img.jpg')}}" alt="" height="200">
                <table class="table">
                    <tr>
                        <td><b>Title:</b> </td>
                        <td>{{strtolower($shop->name)}}</td>
                    </tr>
                    <tr>
                        <td><b>Design:</b> </td>
                        <td>{{strtolower($shop->designType->name)}}</td>
                    </tr>
                    <tr>
                        <td><b>Location:</b> </td>
                        <td> {{$shop->address->area->town->lga->state->name}}, {{$shop->address->area->town->lga->name}}, {{$shop->address->area->town->name}}, {{$shop->address->area->name}}, {{$shop->address->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Designs Uploaded:</b> </td>
                        <td><a href="{{route('client.shop.design.index',[$shop->id])}}" >{{count($shop->shopDesigns)}}</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endforeach
</div>    
@endsection
