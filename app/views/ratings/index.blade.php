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
				</tr>
			</thead>
			<tbody>
				@foreach($parking_lots as $parking_lot)
				<tr>
					<td>{{ $parking_lot->name }}</td>
					<td>{{ $parking_lot->stars }}</td>
					<td>{{ $parking_lot->comment }}</td>
					<td>{{ $parking_lot->recommended }}</td>
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