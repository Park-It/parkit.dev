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
                        <h4 class="modal-title">Edit</h4>
                    </div>
                    <div class="modal-body">
                        {{ Form::model($car, array('action' => array('CarsController@update', $car->id), 'method' => 'PUT')) }}
                            <div class="form-group">
                                {{ Form::label('new_make', 'Make') }}
                                {{ Form::text('new_make', $car->make, ['class' => 'form-control', 'placeholder' => 'Please enter your make', 'id' => 'new_make'] )}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('new_model', 'Model') }}
                                {{ Form::text('new_model', $car->model, ['class' => 'form-control', 'placeholder' => 'Please enter your model', 'id' => 'new_model'] )}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('new_license_plate_number', 'License Plate Number') }}
                                {{ Form::text('new_license_plate_number', $car->license_plate_number, ['class' => 'form-control', 'placeholder' => 'Please enter your license plate number', 'id' => 'new_license_plate_number'] )}}
                            </div>
                            <div class="form-group">
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
@stop
