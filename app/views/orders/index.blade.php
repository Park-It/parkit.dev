@extends('layouts.master')
	
@section('title')
	<title>{{{ ucfirst($first_name) . '\'s Orders' }}}</title>
@stop

@section('top-script')
	<link rel="stylesheet" type="text/css" href="/css/rating.css">
@stop

@section('content')
<div class="container">
	<div class="rows">
		<h2>{{{ ucfirst($first_name) . '\'s Orders' }}}</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Order Number</th>
					<th>Car Model</th>
					<th>Car Make</th>
					<th>Car License Plate Number</th>
					<th>Parking Lot</th>
					<th>Address</th>
					<th>Date</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<div class="hidden">
					{{{ $timestamp = strtotime($order->created_at) }}}
				</div>
				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ $order->model }}</td>
					<td>{{ $order->make }}</td>
					<td>{{ $order->license_plate }}</td>
					<td>{{ $order->name }}</td>
					<td>{{ $order->address }}</td>
					<td>{{ date('F d, Y', $timestamp) }}</td>
					<td><a href="{{{ action('OrdersController@show', $order->id) }}}" class="btn btn-primary">View This Order</a></td>
					<td><a href="#" data-toggle="modal" data-target="#ratingModal" class="btn btn-success"><i class="fa fa-plus"></i> Rate</a></td>
					<td>
					{{ Form::open(['action' => 'ParkingLotsController@store']) }}
						<div class="hidden">
	                    	<input type="text" name="parking-lot-id" id="parking-lot-id" value="{{{ $order->parking_lot_id }}}">
	                    </div>
						<button type="submit" class="btn btn-warning">Prefer this Parking Lot</button>
					{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<center>
			<span>{{ $orders->links() }}</span>
		</center>
	</div>
</div>

<!-- Add Car Modal -->
    <div class="modal fade" id="ratingModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> {{{ 'Add A Rating' }}}</h4>
                </div>
            {{ Form::open(['action' => 'RatingsController@store']) }}
                <div class="modal-body">
                	<p><b>Parking Lot: </b><em>{{{ $order->name }}}</em></p>
                    <div class="form-group">
                        <label for="stars">Stars</label>
                        <input type="text" class="form-control" placeholder="Please enter your rating" name="stars" id="stars">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <input type="text" class="form-control" placeholder="Please enter a comment" name="comment" id="comment">
                    </div>
                    <div class="form-group">
                        <label for="recommended">Recommended</label>
                        <div class="hidden">
                        	<input type="text" name="recommended" id="recommended">
                        	<input type="text" name="parking_lot_id" id="parking_lot_id" value="{{{ $order->parking_lot_id }}}">
                        </div>
                        <div>
	                        <a href="#" id="true" value="1"><i class="fa fa-lg fa-check"></i></a>
	                        <a href="#" id="false" value="0"><i class="fa fa-lg fa-times"></i></a>
                        </div>
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

@section('bottom-script')
	<script src="/js/orders.js"></script>
@stop