@extends('client::layouts.master')

@section('content')
    <h1>Welcome {{client()->first_name}} {{client()->last_name}}</h1>

@endsection
