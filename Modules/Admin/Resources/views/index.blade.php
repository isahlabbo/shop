@extends('admin::layouts.master')

@section('content')
    <h1>Hi {{admin()->first_name}} {{admin()->last_name}}</h1>
@endsection
