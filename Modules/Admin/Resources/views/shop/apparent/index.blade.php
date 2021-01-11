@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} registered apparent in {{date('Y')}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-triped">
            <thead>
                <th>S/N</th>
                <th>PICTURE</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>PROGRAMME</th>
                <th>CLASS</th>
                <th></th>
                <th>PAYMENT</th>
                <th> <a href="{{route('admin.shop.apparent.create',[$shop->id])}}"> <button class="btn-secondary btn">New Apparent</button> </a></th>
            </thead>
            <tbody>
                @foreach($shop->programmes as $programme)
                    @foreach($programme->programmeClasses as $programmeClass)
                        @foreach($programmeClass->apparentProgrammeClasses as $apparentProgrammeClass)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td> <img src="{{storage_url($apparentProgrammeClass->apparent->image ?? '')}}" height="45" width="45"> </td>
                            <td> {{$apparentProgrammeClass->apparent->first_name ?? ''}} {{$apparentProgrammeClass->apparent->last_name ?? ''}}</td>
                            <td>{{$apparentProgrammeClass->apparent->email ?? ''}}</td>
                            <td>{{$apparentProgrammeClass->apparent->phone ?? ''}}</td>
                            
                            <td>{{$programme->name ?? ''}}</td>
                            <td>{{$programmeClass->name ?? ''}}</td>
                            <td>
                                 
                                <button class="btn-primary btn" data-toggle="modal" data-target="#grantor_{{$apparentProgrammeClass->apparent->id ?? 'k'}}">
                                    More...
                                </button> 
                                
                                @include('admin::shop.apparent.grantor')
                            </td>

                            <td>
                                @if($apparentProgrammeClass->pendingPayment() > 0)
                                <button class="btn-primary btn" data-toggle="modal" data-target="#pay_{{$apparentProgrammeClass->id}}">
                                    Pay #{{$apparentProgrammeClass->pendingPayment()}}
                                </button> 
                                @include('admin::shop.apparent.pay')
                                @else
                                    Payment Cleared
                                @endif
                            </td>

                            <td>
                                <a href="{{route('admin.shop.apparent.edit',[$shop->id,$apparentProgrammeClass->apparent->id ?? ''])}}" >
                                    <button class="btn-primary btn">
                                        Edit
                                    </button>
                                </a>
                                <a href="{{route('admin.shop.apparent.delete',[$shop->id,$apparentProgrammeClass->apparent->id ?? ''])}}" onclick="return confirm('Are you sure you want to delete this apparent from your shop')">
                                    <button class="btn-secondary btn">
                                        Delete
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection