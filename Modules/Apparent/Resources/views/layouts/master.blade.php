@extends('layouts.app')

@section('navbar')
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.shop.customer.referral',['direct']) }}">Time Table</a>
    </li>
      
      
@endsection