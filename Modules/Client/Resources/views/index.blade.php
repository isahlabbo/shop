@extends('client::layouts.master')

@section('title')
    Client Dashboard
@endsection

@section('content')

<!-- client bonus dashboard -->
    <br>
    <div class="row">   
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header btn-secondary">Works </div>
                <div class="card-body">
                    <div class="row">
                        @if(empty(client()->availableWorks()))
                            <div class=" col-md-12 alert alert-danger">No work register pls ask you tailor to add your work if any</div>
                        @else
                        @foreach(client()->availableWorks() as $work)
                            <div class="col-md-3">
                                <div class="card shadow">
                                    <div class="card-header btn-primary" >
                                        {{$work->shopClient->shop->name}} SHOP
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <td>About Work</td>
                                                <td>{{$work->description}}</td>
                                            </tr>
                                            @if($work->fee > 0)
                                            <tr>
                                                <td>Total Work Fee</td>
                                                <td><b>#</b> {{$work->fee}}</td>
                                            </tr>
                                            <tr>
                                                <td>Advance Given</td>
                                                <td><b>#</b> {{$work->paid_fee}}</td>
                                            </tr>
                                            <tr>
                                                <td>Remaining Work Balance</td>
                                                <td><b>#</b> {{$work->pendingPayment()}}</td>
                                            </tr>
                                            @else
                                                <a href="{{route('client.shop.work.bargain.index',[$work->shopClient->shop->id,$work->id])}}"><i class="fa fa-inbox"></i> Let Bargain Now</a>
                                            @endif
                                            <tr>
                                                <td>Work Progress</td>
                                                <td>
                                                    {{$work->progress()}}
                                                    @if($work->status == 1)
                                                        and waiting for you to collect
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- client bonus dashboard -->
    <br>
    <div class="row">   
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header btn-secondary">Bonus </div>
                <div class="card-body">
                    <div class="">
                        @foreach(client()->shopClients as $shopClient)
                            <div class="col-md-3">
                                
                                    <div class="card shadow">
                                        <div class="card-header btn-primary" >
                                            {{$shopClient->shop->name}} SHOP
                                        </div>
                                        <div class="card-body">
                                            <table>
                                                <tr>
                                                    <td>Bonus: </td>
                                                    <td><b>#</b>{{$shopClient->Bonus()}}</td>
                                                </tr>

                                                <tr>
                                                    <td>Pending payment: </td>
                                                    <td><b>#</b>{{$shopClient->pendingPayment()}}</td>
                                                </tr>

                                                <tr>
                                                    <td>Works: </td>
                                                    <td>{{count($shopClient->shopClientWorks)}}</td>
                                                </tr>

                                            </table>
                                            
                                        </div>
                                    </div>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <br>
            <div class="card shadow">
                <div class="card-header btn-primary" >Shops</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{route('client.shop.state',[client()->address->area->town->lga->state->id])}}">
                                    <div class="card shadow">
                                        <div class="card-header btn-secondary" >
                                            Shops In {{client()->address->area->town->lga->state->name}} State
                                        </div>
                                        <div class="card-body">
                                            {{count(client()->address->area->town->lga->state->shops('all'))}}
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3">
                                <a href="{{route('client.shop.lga',[client()->address->area->town->lga->id])}}">
                                    <div class="card shadow">
                                        <div class="card-header btn-secondary" >
                                            Shops In {{client()->address->area->town->lga->name}} LGA
                                        </div>
                                        <div class="card-body">
                                            {{count(client()->address->area->town->lga->shops('all'))}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('client.shop.town',[client()->address->area->town->id])}}">
                                    <div class="card shadow">
                                        <div class="card-header btn-secondary" >
                                            Shops In {{client()->address->area->town->name}} Town
                                        </div>
                                        <div class="card-body">
                                            {{count(client()->address->area->town->shops('all'))}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('client.shop.area',[client()->address->area->id])}}">
                                    <div class="card shadow">
                                        <div class="card-header btn-secondary" >
                                            Shops In {{client()->address->area->name}} Area
                                        </div>
                                        <div class="card-body">
                                            {{count(client()->address->area->shops('all'))}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{route('client.shop.address',[client()->address_id])}}">
                                    <div class="card shadow">
                                        <div class="card-header btn-secondary" >
                                            Shops In {{client()->address->name}} Street
                                        </div>
                                        <div class="card-body">
                                            {{count(client()->address->shops)}}
                                        </div>
                                    </div>
                                </a>  
                            </div>

                            <div class="col-md-3">
                                <a href="{{route('client.shop.create')}}">
                                    <div class="card shadow">
                                        <div class="card-header btn-secondary" >
                                            Shops Available In Different Location
                                        </div>
                                        <div class="card-body">
                                            {{count($shops ?? '') - count(client()->address->shops)}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    
    
@endsection
