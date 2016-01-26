@extends('layouts.master')

@section('title')
	<title></title>
@stop

@section('content')
	<div class="container">
		<div class="rows">
			<h2>Make: {{{ $car->make }}}</h2>
			<h2>Model: {{{ $car->model }}}</h2>
			<h2>License Number: {{{ $car->license_plate_number }}}</h2>
			<h2>Color: {{{ $car->color }}}</h2>
		</div>
	</div>
@stop