@extends('layouts.master')

@section('title')
	<title>{{{ ucfirst($first_name) . '\'s Vehicles'}}}</title>
@stop

@section('content')
	<div class="container">
		<div class="rows">
            <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i>&nbsp;Add a Vehicle</button>
		</div>
		<h2>{{{ ucfirst($first_name) . '\'s Vehicles' }}}</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Make</th>
					<th>Model</th>
					<th>License Plate Number</th>
					<th>Color</th>
					<th></th>
                    <th></th>
                    <th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($cars as $car)
				<tr>
					<td>{{ $car->make }}</td>
					<td>{{ $car->model }}</td>
					<td>{{ $car->license_plate_number }}</td>
					<td>{{ $car->color }}</td>
					<td><a href="{{{ action('CarsController@show', $car->id) }}}" class="btn btn-primary">View This Car</a></td>
					<td><button class="btn btn-success" data-toggle="modal" data-target="#editModal{{{ $car->id }}}"><i class="fa fa-pencil-square-o"></i>&nbsp;Edit</button></td>
					<td>{{ Form::open(['action' => ['CarsController@destroy', $car->id], 'method' => 'DELETE']) }}
                	<button type="delete" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Delete</button>
                {{ Form::close() }}</td>
				</tr>
				@endforeach
			</tbody>
        </table>
        <center>
            <span>{{ $cars->links() }}</span>
        </center>
    </div>
     <!-- Edit Modal -->
     @foreach($cars as $car)
        <div class="modal fade" id="editModal{{{ $car->id }}}" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i>&nbsp;{{{'Edit ' . $first_name . '\'s Vehicle'}}}</h4>
                    </div>
                    <div class="modal-body">
                        {{ Form::model($car, array('action' => array('CarsController@update', $car->id), 'method' => 'PUT')) }}
                            <div class="form-group">
                                {{ $errors->first('new_make', '<span class="help-block alert alert-danger">:message</span>') }}
                                {{ Form::label('new_make', 'Make') }}
                                {{ Form::text('new_make', $car->make, ['class' => 'form-control', 'placeholder' => 'Please enter your make', 'id' => 'new_make'] )}}
                            </div>
                            <div class="form-group">
                                {{ $errors->first('new_model', '<span class="help-block alert alert-danger">:message</span>') }}
                                {{ Form::label('new_model', 'Model') }}
                                {{ Form::text('new_model', $car->model, ['class' => 'form-control', 'placeholder' => 'Please enter your model', 'id' => 'new_model'] )}}
                            </div>
                            <div class="form-group">
                                {{ $errors->first('new_license_plate_number', '<span class="help-block alert alert-danger">:message</span>') }}
                                {{ Form::label('new_license_plate_number', 'License Plate Number') }}
                                {{ Form::text('new_license_plate_number', $car->license_plate_number, ['class' => 'form-control', 'placeholder' => 'Please enter your license plate number', 'id' => 'new_license_plate_number'] )}}
                            </div>
                            <div class="form-group">
                                {{ $errors->first('new_color', '<span class="help-block alert alert-danger">:message</span>') }}
                                {{ Form::label('new_color', 'Color') }}
                                {{ Form::text('new_color', $car->color, ['class' => 'form-control', 'placeholder' => 'Please enter your color', 'id' => 'new_color'] )}}
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
     <!-- Add Modal -->
     
        <div class="modal fade" id="addModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;{{{'Add ' . $first_name . '\'s Vehicle'}}}</h4>
                    </div>
                {{ Form::open(['action' => 'CarsController@store']) }}
                    <div class="modal-body">
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
            
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                {{ Form::close() }}
                </div>
            </div>
        </div>
    
@stop
