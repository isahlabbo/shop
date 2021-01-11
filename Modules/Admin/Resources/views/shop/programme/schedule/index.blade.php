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
						@foreach($programme->programmeWeeklySchedules as $schedule)
					       <tr>
					       	   <td>{{$schedule->week}}</td>
					       	   <td>{{$schedule->topic ?? ''}}</td>
					       	   <td>{{$schedule->objective ?? ''}}</td>
					       	   <td>
					       	   	<button class="btn btn-secondary" data-toggle="modal" data-target="#schedul_{{$schedule->id}}">
					       	   	    Edit
					       	    </button>
                                
                                <a href="{{route('admin.shop.programme.schedule.delete',[$shop->id, $programme->id, $schedule->id])}}" onclick="return confirm('Are you sure you want this week schedule')">
					       	    <button class="btn btn-secondary">
					       	   	    Delete
					       	    </button>
                                 </a>
					       	   </td>
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