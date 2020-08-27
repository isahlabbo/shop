@extends('client::layouts.master')

@section('content')
    <h1>Hello World{{client()->first_name}}</h1>

    <p>
        This view is loaded from module: {!! config('client.name') !!}
    </p>
@endsection
