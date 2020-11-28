@extends('client::layouts.master')

@section('title')
    Client Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <br>
            <div class="card shadow">
                <div class="card-header btn-primary" >Available Shops Around You</div>
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
                                            {{count($shops) - count(client()->address->shops)}}
                                        </div>
                                    </div>
                                </a>
                            </div>
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
                <div class="card-header btn-primary">Available Bonus In Different Shops</div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection
