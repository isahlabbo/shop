@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} design {{$design->id}} work requests
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-triped">
            <thead>
                <th>S/N</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Bonus</th>
                <th>Referral</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($design->shopDesignRequests as $request)
               
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{$request->client->first_name}} {{$request->client->last_name}}</td>
                    <td>{{$request->client->phone}}</td>
                    <td>{{$request->client->email}}</td>
                    <td>0</td>
                    <td>{{$request->client->refferal_code}}</td>
                    
                    <td>
                        @if($design->status == null)
                            <button class="btn-primary btn">
                                Contacted
                            </button>
                        @elseif($design->status == 'contacted')    
                            <button class="btn-secondary btn">
                                Delivered
                            </button>
                        @elseif($design->status == 'delivered')    
                            <a href="">
                                <button class="btn-primary btn">
                                Finished
                                </button>
                            </a>
                        @elseif($design->status == 'finished')
                            Request Completed
                        @endif    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection