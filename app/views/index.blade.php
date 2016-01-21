@extends('layouts.master')

@section('title')
	<title>Park It</title>
@stop

@section('top-script')
	<link rel="stylesheet" type="text/css" href="/css/index.css">
@stop

@section('content')
	<!-- Header -->
    <header>
        <div class="container">
            <div class="col-lg-12">
            	<form>
            		<button class="btn btn-success">Find Me</button>
            		<div class="row control-group">
	            		<div class="form-group col-xs-12 floating-label-form-group controls">
	            			<label for="address">Address</label>
	            			<input type="text" placeholder="Enter your address" class="form-control">
	            		</div>
	            	</div>
	            	<div class="row control-group">
	            		<div class="form-group col-xs-12 floating-label-form-group controls">
	            			<label for="destination">Destination</label>
	            			<input type="text" placeholder="Enter your destination" class="form-control">
	            		</div>
	            	</div>
	            	<button type="submit" class="btn btn-primary submit">Submit</button>
            	</form>
            </div>
        </div>
    </header>
        <center>
	   <div id="map-canvas"></div>
       </center>
@stop

@section('bottom-script')
	<script src="/js/map.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb0ttOlTfxWFBvkLFiAh37EVNdwBA0xyM&callback=initMap"></script>
	<script src="/js/form-effect.js"></script>
	<script src="/js/modal.js"></script>
@stop

