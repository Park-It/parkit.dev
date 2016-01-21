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
					<th>Stars</th>
					<th>Comment</th>
					<th>Recommended</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ratings as $rating)
				<tr>
					<td>{{ $rating->stars }}</td>
					<td>{{ $rating->comment }}</td>
					<td>{{ $rating->recommended }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop