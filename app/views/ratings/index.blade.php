@extends('layouts.master')

@section('title')
	<title>{{{ $first_name . '\'s Ratings'}}}</title>
@stop


@section('content')
<div class="container">
	<div class="rows">
		<h2>{{{ $first_name . '\'s Ratings' }}}</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Parking&nbsp;Lot:</th>
					<th>Stars:</th>
					<th>Comment:</th>
					<th>Recommended:</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($parking_lots as $parking_lot)
				<tr>
					<td>{{ $parking_lot->name }}</td>
					<td>{{ $parking_lot->stars }}</td>
					<td>{{ $parking_lot->comment }}</td>
					<td>{{ $parking_lot->recommended }}</td>
					<td><button class="btn btn-success" data-toggle="modal" data-target="#editModal{{{ $parking_lot->id }}}"><i class="fa fa-pencil-square-o"></i>&nbsp;Edit</button></td>
					<td>{{ Form::open(['action' => ['RatingsController@destroy', $parking_lot->id], 'method' => 'DELETE']) }}
                	<button type="delete" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Delete</button>
                {{ Form::close() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<center>
			<span>{{ $parking_lots->links() }}</span>
		</center>
	</div>
</div>
@stop