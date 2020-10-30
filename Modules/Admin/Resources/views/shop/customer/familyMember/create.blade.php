@extends('admin::layouts.master')

@section('title')
    {{$client->first_name}} {{$client->last_name}} family member registration page
@endsection

@section('content')
    @include('client::auth.clientRegistrationForm')
@endsection

@section('scripts')
    <script src="{{asset('js/Ajax/address.js')}}"></script>
@endsection

