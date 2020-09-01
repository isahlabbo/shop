@extends('layouts.app')

@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.shop.create')}}">New Shop</a>
    </li>
@endsection