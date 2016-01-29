@extends('layouts.master')

@section('title')
	<title>{{{ ucfirst($first_name) . '\'s Ratings'}}}</title>
@stop

@section('top-script')
	<link rel="stylesheet" type="text/css" href="/css/parking_lot_index.css">
	<link rel="stylesheet" type="text/css" href="/css/rating.css">
@stop


@section('content')
<div class="container">
	<div class="rows">
		<h2>{{{ ucfirst($first_name) . '\'s Ratings' }}}</h2>
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
					<td class="text-center">{{ $parking_lot->recommended ? '<i class="fa fa-lg fa-check"></i>' : '<i class="fa fa-lg fa-times"></i>' }}</td>
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
	                    <h4 class="modal-title">{{{'Edit ' . $first_name . '\'s Rating'}}}</h4>
	                </div>
	                <div class="modal-body">
	                	<h4 class="parking_lot">{{ 'Parking Lot: ' . $parking_lot->name }}</h4>
	                    {{ Form::model($parking_lot, array('action' => array('RatingsController@update', $parking_lot->id), 'method' => 'PUT')) }}
                        <div class="form-group">
                        	{{ $errors->first('new_stars', '<span class="help-block alert alert-danger">:message</span>') }}
                            {{ Form::label('new_stars', 'Stars') }}
                            {{ Form::text('new_stars', $parking_lot->stars, ['class' => 'form-control', 'placeholder' => 'Please enter new value for stars', 'id' => 'new_stars'] )}}
                        </div>
                        <div class="form-group">
                        	{{ $errors->first('new_comment', '<span class="help-block alert alert-danger">:message</span>') }}
                            {{ Form::label('new_comment', 'Comment') }}
                            {{ Form::text('new_comment', $parking_lot->comment, ['class' => 'form-control', 'placeholder' => 'Please enter new value for the comment', 'id' => 'new_model'] )}}
                        </div>
                        <div class="form-group">
                        	{{ $errors->first('new_recommended', '<span class="help-block alert alert-danger">:message</span>') }}
                            {{ Form::label('new_recommended', 'Recommended') }}
                            {{ Form::text('new_recommended', $parking_lot->recommended, ['class' => 'form-control', 'placeholder' => 'Please enter new value for recommended', 'id' => 'new_recommended'] )}}
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
@section('bottom-script')
	<script src="/js/ratings.js"></script>
@stop