@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} uploaded designs
@endsection
@section('content')
<div class="row">
   
    @foreach($shop->shopDesigns as $design)
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <img src="{{storage_url($design->design_image)}}" alt="" height="200">
                    <table>
                        <tr>
                            <td><b>Description:</b> </td>
                            <td>{{$design->description}}</td>
                        </tr>
                        <tr>
                            <td><b>Fee:</b> </td>
                            <td><b>#</b>{{$design->shopClientWork->fee ?? $design->fee}}</td>
                        </tr>
                        <tr>
                            <td><b>Status:</b> </td>
                            <td>{{$design->prove_image ? 'Trusted' : 'Not Trusted'}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="#" ><b>Make Request:</b> </a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    @endforeach      
</div>    
@endsection
