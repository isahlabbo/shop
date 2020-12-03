@extends('layouts.app')

@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('client.measurement.index') }}">My Measurement</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('client.shop.create') }}">shops</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('client.connection.index') }}">{{count(connections(client()))}} connections</a>
    </li>
@endsection