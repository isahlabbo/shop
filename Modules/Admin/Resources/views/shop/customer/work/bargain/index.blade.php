@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} request works for bargaining
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <br>
        <div class="card shadow">
        <div class="card-header btn btn-primary">{{$shop->name}} REQUESTED WORKS</div>
        <div class="card-body">
            <table class="table table-triped">
                <thead>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Fee</th>
                    <th>paid</th>
                    <th>Finishing Date</th>
                    <th>Finishing Time</th>
                    <th>Registered At</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($shop->availableWorksToBargain() as $work)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td> {{$work->shopClient->client->first_name}} {{$work->shopClient->client->last_name}}</td>
                        <td> {{$work->description}}</td>
                        <td> #{{$work->fee}}</td>
                        <td> #{{$work->paid_fee}}</td>
                        <td> {{date('1-M-Y',strtotime($work->finishing_date))}}</td>
                        <td> {{$work->finishing_time}}</td>
                        <td>{{$work->created_at}}</td>
                        <td>{{$work->progress()}}</td>
                        <td>
                           <a href="#" data-toggle="modal" data-target="#update_{{$work->id}}">Am done with the bargaining and collected the cloth lets add work fee</a>
                           @include('admin::shop.customer.work.bargain.update')  
                        </td>
                        <td>
                            <a href="{{route('admin.shop.customer.work.bargain.comments',[$shop->id,$work->id])}}"><i class="fa fa-inbox"></i> Okay lets bargain</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection