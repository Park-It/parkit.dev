@extends('layouts.master')

@section('title')
	<title></title>
@stop

@section('content')
	<div class="container">
		<div class="rows">
			<h2>Order Number: {{{ $order->id }}}</h2>
			<h2>Make: {{{ $order->make }}}</h2>
			<h2>Model: {{{ $order->model }}}</h2>
			<h2>License Number: {{{ $order->license_plate }}}</h2>
			<h2>Parking Lot: {{{ $order->name }}}</h2>
			<h2>Address: {{{ $order->address }}}</h2>
		</div>
	</div>
@stop