@extends('admin::layouts.master')

@section('title')
   {{$shop->name}} {{$programme->name}} weekly schedule
@endsection

@section('content')
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<br>
		<div class="card">
			<div class="card-header card-header-primary">
				{{$shop->name}} {{strtoupper($programme->name)}} WEEKLY SCHEDULES
			</div>
			<div class="card-body">
				<table class="table bordered">
					<thead>
						<tr>
							<th>Week No</th>
							<th>Topic</th>
							<th>Objective</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($programme->programmeWeeklySchedules as $schedule)
					       <tr>
					       	   <td>{{$schedule->week}}</td>
					       	   <td>{{$schedule->topic ?? ''}}</td>
					       	   <td>{{$schedule->objective ?? ''}}</td>
					       	   <td><button class="btn btn-secondary" data-toggle="modal" data-target="#schedul_{{$schedule->id}}">Edit</button></td>
					       </tr>
					       @include('admin::shop.programme.schedule.edit')
					    @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
   
@endsection