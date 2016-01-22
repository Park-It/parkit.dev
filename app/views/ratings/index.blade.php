@extends('layouts.master')

@section('title')
	<title>{{{ $first_name . '\'s Ratings'}}}</title>
@stop

@section('top-script')
	<link rel="stylesheet" type="text/css" href="/css/parking_lot_index.css">
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
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($parking_lots as $parking_lot)
				<tr>
					<td>{{ $parking_lot->name }}</td>
					<td>{{ $parking_lot->stars }}</td>
					<td>{{ $parking_lot->comment }}</td>
					<td>{{ $parking_lot->recommended }}</td>
					<td><button class="btn btn-success" data-toggle="modal" data-target="#editModal{{{ $parking_lot->id }}}"><i class="fa fa-pencil-square-o"></i>&nbsp;Edit</button></td>
					<td>{{ Form::open(['action' => ['RatingsController@destroy', $parking_lot->id], 'method' => 'DELETE']) }}
                	<button type="delete" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Delete</button>
                {{ Form::close() }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<center>
			<span>{{ $parking_lots->links() }}</span>
		</center>
	</div>
</div>
	<!-- Edit Modal -->
	 @foreach($parking_lots as $parking_lot)
	    <div class="modal fade" id="editModal{{{ $parking_lot->id }}}" role="dialog">
	        <div class="modal-dialog modal-sm">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal">&times;</button>
	                    <h4 class="modal-title">Edit Rating</h4>
	                </div>
	                <div class="modal-body">
	                	<h4 class="parking_lot">{{ 'Parking Lot: ' . $parking_lot->name }}</h4>
	                    {{ Form::model($parking_lot, array('action' => array('RatingsController@update', $parking_lot->id), 'method' => 'PUT')) }}
                        <div class="form-group">
                            {{ Form::label('new_stars', 'Stars') }}
                            {{ Form::text('new_stars', $parking_lot->stars, ['class' => 'form-control', 'placeholder' => 'Please enter your make', 'id' => 'new_stars'] )}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('new_comment', 'Comment') }}
                            {{ Form::text('new_comment', $parking_lot->comment, ['class' => 'form-control', 'placeholder' => 'Please enter your model', 'id' => 'new_model'] )}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('new_recommended', 'Recommended') }}
                            {{ Form::text('new_recommended', $parking_lot->recommended, ['class' => 'form-control', 'placeholder' => 'Please enter your license number', 'id' => 'new_recommended'] )}}
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