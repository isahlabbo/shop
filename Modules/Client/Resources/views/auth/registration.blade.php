@extends('client::layouts.master')

@section('title')
 Client registration page
@endsection

@section('content')
    @include('client::auth.clientRegistrationForm')
@endsection

@section('scripts')
    <script src="{{asset('js/Ajax/address.js')}}"></script>
@endsection

