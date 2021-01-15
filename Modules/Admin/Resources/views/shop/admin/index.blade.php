@extends('admin::layouts.master')

@section('title')
   {{admin()->first_name}} registered shops admin
@endsection

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-triped">
            <thead>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADDRESS</th>
                <th>GENDER</th>
                <th>SHOP</th>
                <th>WARLET</th>
                <th></th>
                <th> <a href="{{route('admin.shop.admin.create')}}"> <button class="btn-secondary btn">New Admin</button> </a></th>
            </thead>
            <tbody>
                @foreach(admin()->shops as $shop)
	                @foreach($shop->shopAdmins as $shopAdmin)
	                <tr>
	                    <td>{{$loop->index+1}}</td>
	                    <td> {{$shopAdmin->admin->first_name}} {{$shopAdmin->admin->last_name}}</td>
	                    <td>{{$shopAdmin->admin->email}}</td>
	                    <td>{{$shopAdmin->admin->phone}}</td>
	                    <td>{{$shopAdmin->admin->address->name}}</td>
	                    <td>{{$shopAdmin->admin->gender->name}}</td>
	                    <td>
	                        {{$shop->name}}
	                    </td>
	                    <td>
	                    	<button class="btn btn-primary" data-toggle="modal" data-target="#warlet_{{$shopAdmin->id}}">WARLET</button>
	                    	@include('admin::shop.admin.warlet')
	                    </td>
	                    <td>
	                        <button class="btn-primary btn">
	                            Edit
	                        </button>
	                        <button class="btn-secondary btn">
	                            Delete
	                        </button>
	                    </td>
	                </tr>
	                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection