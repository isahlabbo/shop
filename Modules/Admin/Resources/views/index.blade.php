@extends('admin::layouts.master')

@section('content')
<div class="row">

    <div class="col-md-1"></div>
    <div class="col-md-10">
    <br>
    <h4>Hi {{admin()->first_name}} this is ur administrative account where 
    you can manage the information of your shops and other related informations</h4>
    </div>    
</div>    
@endsection
