@extends('layouts.master')

@section('title')
	<title>{{{ $first_name . '\'s Cars'}}}</title>
@stop

@section('content')
	<div class="container">
		<div class="rows">
			<a href="{{{ action('CarsController@create') }}}"><i class="fa fa-plus"></i>&nbsp;Add a Car</a>
		</div>
		<h2>{{{ $first_name . '\'s Vehicles' }}}</h2>
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
				@foreach($cars as $car)
				<tr>
					<td>{{ $car->make }}</td>
					<td>{{ $car->model }}</td>
					<td>{{ $car->license_number }}</td>
					<td>{{ $car->color }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop