@extends('layouts.master')
	
@section('title')
	<title>Park It</title>
@stop

@section('top-script')
	<link rel="stylesheet" type="text/css" href="/css/vegas.min.css">
	<link rel="stylesheet" type="text/css" href="/css/index.css"> 
@stop

@section('content')
    <div id="page-welcome"> 
        <div class="login-form">
            <form autocomplete="off">
                <a href="#map-canvas" class="btn btn-success find_me scrollToDiv"><i class="fa fa-map-marker"></i> Find Me</a>
                <div class="row control-group">
                    <div class="form-group col-xs-12 col-md-12 floating-label-form-group controls">
                        <label for="address">Address</label>
                        <input type="text" placeholder="Enter your address" class="form-control" id="address">
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 col-md-12 floating-label-form-group controls">
                        <label for="destination">Destination</label>
                        <input type="text" placeholder="Enter your destination" class="form-control" id="destination">
                    </div>
                </div>
                <div class="text-center">
                    <a href="#map-canvas" type="submit" class="btn btn-primary submit scrollToDiv" id="submit"><i class="fa fa-check"></i> Submit</a>
                </div>
                <i class="fa fa-2x fa-pause pause"></i> 
                <a href="#map-canvas" class="down scrollToDiv"></a>
            </form>
        </div>
    	<div>
            <ul class="slider-controls">
                <li>
                    <a id="vegas-next" class="next" href="javascript:void(0)"></a>
                </li>
                <li>
                    <a id="vegas-prev" class="prev" href="javascript:void(0)"></a>
                </li>
            </ul>
        </div>
    </div>
    
    <div id="map-canvas"></div>

    <!-- Add Car Modal -->
    <div class="modal fade" id="addCar" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
			@if(!Auth::check() || count(Auth::user()->cars()) === 0)
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> {{{ 'Add A Car' }}}</h4>
                </div>
            {{ Form::open(['action' => 'HomeController@storeCar', 'id' => 'addCarForm', 'data-add-car'=> 'addedCar']) }}
            	<div class="add-Car"></div>
                <div class="modal-body">
                    <div class="form-group">
	                	<div id="error-make"></div>
                        <label for="make">Make</label>
                        <input type="text" class="form-control" placeholder="Please enter your car's make" name="make" id="make">
                    </div>
                    <div class="form-group">
                    	<div id="error-model"></div>
                        <label for="model">Model</label>
                        <input type="text" class="form-control" placeholder="Please enter your car's model" name="model" id="model">
                    </div>
                    <div class="form-group">
                    	<div id="error-license"></div>
                        <label for="license_plate_number">License Number</label>
                        <input type="text" class="form-control" placeholder="Please enter your car's license plate number" name="license_plate_number" id="license_plate_number">
                    </div>
                    <div class="form-group">
                    	<div id="error-color"></div>
                        <label for="color">Color</label>
                        <input type="text" class="form-control" placeholder="Please enter your car's color" name="color" id="color">
                    </div>
                    <input type="hidden" id="hiddenParkingLot" name="hiddenParkingLot">
                	<small>All fields required</small>
                </div>
            {{ Form::close() }}    
                <div class="modal-footer addFooter"></div>
            @else
            	<div class="modal-header">
                	<button type="button" class="close" data-dismiss="modal">&times;</button>
                	<h4 class="modal-title"><i class="fa fa-mouse-pointer"></i>&nbsp;Select a Car</h4>
            	</div>
            {{ Form::open(['action' => 'CarsController@store']) }}
            	<div class="modal-body add-Car"></div>
           	{{ Form::close() }}
            	<div class="modal-footer addFooter"></div>
            @endif
            </div>
        </div>
    </div> 

    
    <div class="modal fade" id="stripeSuccess" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title green-text"><i class="fa fa-check"></i> Purchase completed successsfully</h4>
                </div>
                <div class="modal-body add-Order text-center"></div>
                @if(Auth::check())
                <div class="modal-footer">
                    <a href="{{{ action('OrdersController@index') }}}" class="btn btn-primary">View All Orders</a>
                </div>
                @endif
            </div>
        </div>
    </div>

@stop

@section('bottom-script')
	<script src="https://checkout.stripe.com/checkout.js"></script>
	<script src="/js/map.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb0ttOlTfxWFBvkLFiAh37EVNdwBA0xyM&callback=initMap"></script>
	<script src="/js/form-effect.js"></script>
	<script src="https://js.stripe.com/v2/"></script>
	<script src="/js/vegas.min.js"></script>
	<script src="/js/carousel.js"></script>
@stop

