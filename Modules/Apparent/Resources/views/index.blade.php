@extends('apparent::layouts.master')

@section('title')
    SEWMYCLOTH Apparent Dashboard
@endsection

@section('content')
    <div class="row">

    <div class="col-md-1"></div>
    <div class="col-md-10">
    <br>
    @foreach(apparent()->apparentProgrammeClasses as $apparentProgrammeClass)
    <div class="card shadow">
        <div class="card-header btn-primary">Your Training Schedule  of {{$apparentProgrammeClass->programmeClass->programme->name}} / {{$apparentProgrammeClass->programmeClass->name}} class for {{$apparentProgrammeClass->programmeClass->present()->week}} @ {{$apparentProgrammeClass->programmeClass->programme->shop->name}} Shop</div>
        <div class="card-body">
            <div class="row">
                <table class="table bordered">
                	<thead>
                		<tr>
                			<th>Topic</th>
                			<th>Objective</th>
                		</tr>
                	</thead>
                	<tbody>
                		<tr>
                			<td>{{$apparentProgrammeClass->programmeClass->present()->topic}}</td>
                			<td>{{$apparentProgrammeClass->programmeClass->present()->objective}}</td>
                		</tr>
                	</tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
    </div>    
</div>
@endsection
