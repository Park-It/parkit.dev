@extends('layouts.master')

@section('title')
	<title>{{{ ucfirst($first_name) . '\'s Preferred Parking Lots'}}}</title>
@stop

@section('content')
	<div class="container">
		<div class="rows">
			<h2>{{{ ucfirst($first_name) . '\'s Preferred Parking Lots'}}}</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Parking Lot Name:</th>
						<th>Address:</th>
						<th>Price:</th>
						<th>Maximum Spots:</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($preferred_parking_lots as $preferred_parking_lot)
					<tr>
						<td>{{ $preferred_parking_lot->name }}</td>
						<td>{{ $preferred_parking_lot->address }}</td>
						<td>{{ $preferred_parking_lot->price }}</td>
						<td>{{ $preferred_parking_lot->max_spots }}</td>
						<td>{{ Form::open(['action' => ['ParkingLotsController@destroy', $preferred_parking_lot->id], 'method' => 'DELETE']) }}
                			<button type="delete" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Delete</button>
                			{{ Form::close() }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop