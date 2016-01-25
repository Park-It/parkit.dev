@extends('layouts.master')

@section('title')
	<title>{{{ 'Add a car' }}}</title>
@stop

@section('content')
	<div class="container">
		<div class="rows">
			{{ Form::open(['action' => 'CarsController@store']) }}
				<div class="form-group">
					{{ $errors->first('make', '<span class="help-block alert alert-danger">:message</span>') }}
					<label for="make">Make</label>
					<input type="text" class="form-control" placeholder="Please enter your car's make" name="make">
				</div>
				<div class="form-group">
					{{ $errors->first('model', '<span class="help-block alert alert-danger">:message</span>') }}
					<label for="model">Model</label>
					<input type="text" class="form-control" placeholder="Please enter your car's model" name="model">
				</div>
				<div class="form-group">
					{{ $errors->first('license_plate_number', '<span class="help-block alert alert-danger">:message</span>') }}
					<label for="license_plate_number">License Number</label>
					<input type="text" class="form-control" placeholder="Please enter your car's license plate number" name="license_plate_number">
				</div>
				<div class="form-group">
					{{ $errors->first('color', '<span class="help-block alert alert-danger">:message</span>') }}
					<label for="color">Color</label>
					<input type="text" class="form-control" placeholder="Please enter your car's color" name="color">
				</div>
				<button class="btn btn-primary">Submit</button>
			{{ Form::close() }}
		</div>
	</div>
@stop