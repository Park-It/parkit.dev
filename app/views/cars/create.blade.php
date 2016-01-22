@extends('layouts.master')

@section('title')
	<title>{{{ 'Add a car' }}}</title>
@stop

@section('content')
	<div class="container">
		<div class="rows">
			{{ Form::open(['action' => 'CarsController@store']) }}
				<div class="form-group">
					<label for="make">Make</label>
					<input type="text" class="form-control" placeholder="Please enter your car's make">
				</div>
				<div class="form-group">
					<label for="model">Model</label>
					<input type="text" class="form-control" placeholder="Please enter your car's model">
				</div>
				<div class="form-group">
					<label for="license_number">License Number</label>
					<input type="text" class="form-control" placeholder="Please enter your car's license number">
				</div>
				<div class="form-group">
					<label for="color">Color</label>
					<input type="text" class="form-control" placeholder="Please enter your car's color">
				</div>
				<button class="btn btn-primary">Submit</button>
			{{ Form::close() }}
		</div>
	</div>
@stop