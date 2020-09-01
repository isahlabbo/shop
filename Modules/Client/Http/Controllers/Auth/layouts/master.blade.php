@extends('layouts.app')

@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('client.measurement.index') }}">My Measurement</a>
    </li>
@endsection