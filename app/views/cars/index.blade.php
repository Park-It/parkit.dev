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
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($cars as $car)
				<tr>
					<td>{{ $car->make }}</td>
					<td>{{ $car->model }}</td>
					<td>{{ $car->license_number }}</td>
					<td>{{ $car->color }}</td>
					<td><a href="{{{ action('CarsController@show', $car->id) }}}" class="btn btn-primary">View This Car</a></td>
					<td> <button class="btn btn secondary" data-toggle="modal" data-target="#editModal">Edit</button></td>
					<td>{{ Form::open(['action' => ['CarsController@destroy', $car->id], 'method' => 'DELETE']) }}
                	<button type="delete" class="btn btn-danger">Delete</button>
                {{ Form::close() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<center>
			<span>{{ $cars->links() }}</span>
		</center>
	</div>
@stop

 <!-- Login Modal -->
    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    {{ Form::model($car, array('action' => array('CarsController@update', $car->id), 'method' => 'PUT')) }}
                        <div class="form-group">
                            {{ Form::label('make', 'Make') }}
                            {{ Form::text('make', null, ['class' => 'form-control', 'placeholder' => 'Please enter your make', 'id' => 'make'] )}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('model', 'Model') }}
                            {{ Form::password('model', ['class' => 'form-control', 'placeholder' => 'Please enter your model', 'id' => 'model'] )}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('license_number', 'License Number') }}
                            {{ Form::password('license_number', ['class' => 'form-control', 'placeholder' => 'Please enter your license number', 'id' => 'license_number'] )}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('color', 'Color') }}
                            {{ Form::password('color', ['class' => 'form-control', 'placeholder' => 'Please enter your color', 'id' => 'color'] )}}
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>