@extends('layouts.master')

@section('title')
	<title></title>
@stop

@section('content')
<div class="container">
	<div class="rows">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Order Number</th>
					<th>Car Model</th>
					<th>Car Make</th>
					<th>Car License Plate Number</th>
					<th>Parking Lot</th>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ $order->model }}</td>
					<td>{{ $order->make }}</td>
					<td>{{ $order->license_plate }}</td>
					<td>{{ $order->name }}</td>
					<td>{{ $order->address }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<center>
			<span>{{ $orders->links() }}</span>
		</center>
	</div>
</div>
@stop