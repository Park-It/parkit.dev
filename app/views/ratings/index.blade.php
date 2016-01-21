@extends('layouts.master')

@section('title')
	<title>{{{ Auth::user()->first_name . '\'s Ratings'}}}</title>
@stop

@section('content')
<div class="container">
	<div class="rows">
		<h2>{{{ Auth::user()->first_name . '\'s Ratings' }}}</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Rating</th>
					<th>Parking Lot</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@stop