@extends('apparent::layouts.master')

@section('title')
    {{$class->programme->shop->name}} {{$class->programme->name}} weekly schedule
@endsection

@section('content')
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<br>
		<div class="card">
			<div class="card-header card-header-primary">
				{{$class->programme->shop->name}} {{strtoupper($class->programme->name)}} WEEKLY SCHEDULES
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Week No</th>
							<th>Topic</th>
							<th>Objective</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($class->programme->programmeWeeklySchedules as $schedule)
					       <tr>
					       	   <td>{{$schedule->week}}</td>
					       	   <td>{{$schedule->topic ?? ''}}</td>
					       	   <td>{{$schedule->objective ?? ''}}</td>
					       	   <td>
					       	   </td>
					       </tr>
					    @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
   
@endsection