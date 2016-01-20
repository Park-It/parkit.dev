@extends('layouts.master')

@section('title')
	<title>{{{ Auth::user()->first_name . '\'s Cars'}}}</title>
@stop

@section('content')
	<div class="container">
		<div class="rows">
			<a href="{{{ action('CarsController@create') }}}"><i class="fa fa-plus"></i>&nbsp;Add a Car</a>
		</div>
		<h2>Your Vehicles</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Make</th>
					<th>Model</th>
					<th>License Number</th>
					<th>Color</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{ $make }}</td>
					<td>{{ $model }}</td>
					<td>{{ $license_number }}</td>
					<td>{{ $color }}</td>
				</tr>
			</tbody>
		</table>
	</div>
@stop