@extends('admin::layouts.master')

@section('title')
    {{config('name')}} Edit Customer information
@endsection

@section('content')
    @include('client::auth.clientRegistrationForm')
@endsection

@section('scripts')
    <script src="{{asset('js/Ajax/address.js')}}"></script>
@endsection

