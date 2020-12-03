@extends('client::layouts.master')

@section('title')
    {{client()->CIN}} Client Connection registration
@endsection

@section('content')
     @include('client::auth.clientRegistrationForm')
@endsection

@section('scripts')
    <script src="{{asset('js/Ajax/address.js')}}"></script>
@endsection