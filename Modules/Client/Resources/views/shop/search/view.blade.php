@extends('client::layouts.master')

@section('title')
    SEWMYCLOTH shops view
@endsection

@section('content')
<br>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <img src="{{storage_url($shop->image)}}" alt="" height="200" width="850">
                <br>
                
                <a href="{{route('client.shop.subscription.subscribe',[$shop->id])}}">
                    <button class="btn-primary">{{client()->hasSubscription($shop->id) && client()->hasActiveSubscription($shop->id) ? 'Subscribed' : 'Subscribe'}}</button>
                </a><br>

                <a href="{{route('client.shop.work.create',[$shop->id])}}">
                    i have a work for you
                </a>
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
                        <td><b>Shop Contact:</b> </td>
                        <td>
                        	<tr>
                                <td>Name</td>
                                <td>{{$shop->admin->first_name}} {{$shop->admin->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$shop->admin->email}}</td>
                            </tr> 
                            <tr>
                                <td>Phone</td>
                                <td>{{$shop->admin->phone}}</td>
                            </tr>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Alternative Shop Contact:</b> </td>
                        <td>
                            @foreach($shop->shopAdmins as $shopAdmin)
                            <tr>
                                <td>Name</td>
                                <td>{{$shopAdmin->admin->first_name}} {{$shopAdmin->admin->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$shopAdmin->admin->email}}</td>
                            </tr> 
                            <tr>
                                <td>Phone</td>
                                <td>{{$shopAdmin->admin->phone}}</td>
                            </tr>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td><b>Designs Uploaded:</b> </td>
                        <td><a href="{{route('client.shop.design.index',[$shop->id])}}" >{{count($shop->shopDesigns)}}</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection
