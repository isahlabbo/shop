@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} registered apparent in {{date('Y')}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card shadow">
        <div class="card-header btn btn-primary">{{strtoupper($shopClient->client->first_name)}} {{strtoupper($shopClient->client->last_name)}} REGISTERED WORKS IN {{$shop->name}}</div>
        <div class="card-body">
            <table class="table table-triped">
                <thead>
                    <th>S/N</th>
                    <th>Description</th>
                    <th>Registered At</th>
                    <th>Status</th>
                    <th> <a href="{{route('admin.shop.customer.work.create',[$shop->id,$shopClient->id])}}"> <button class="btn-secondary btn">Add Work</button> </a></th>
                </thead>
                <tbody>
                    @foreach($shopClient->shopClientWorks as $work)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td> {{$work->description}}</td>
                        <td>{{$work->created_at}}</td>
                        <td>{{$work->status == 0 ? 'Processing...' : 'Finished'}}</td>
                        <td>
                            <button class="btn-primary btn">
                                Done
                            </button>  
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