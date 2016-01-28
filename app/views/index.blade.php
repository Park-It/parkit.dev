@extends('layouts.master')

@section('title')
	<title>Park It</title>
@stop

@section('top-script')
	<link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
    <!-- Map Icons -->
	<link rel="stylesheet" type="text/css" href="/css/map-icons.css">
	<script type="text/javascript" src="/js/map-icons.js"></script>
@stop

@section('content')
	<!-- Header -->
    <header>
        <div class="container">
            <div class="col-lg-12">
            	<form>
            		<a href="#map-canvas" class="btn btn-success find_me scrollToDiv"><i class="fa fa-map-marker"></i>&nbsp;Find Me</a>
            		<div class="row control-group">
	            		<div class="form-group col-xs-12 floating-label-form-group controls">
	            			<label for="address">Address</label>
	            			<input type="text" placeholder="Enter your address" class="form-control" id="address">
	            		</div>
	            	</div>
	            	<div class="row control-group">
	            		<div class="form-group col-xs-12 floating-label-form-group controls">
	            			<label for="destination">Destination</label>
	            			<input type="text" placeholder="Enter your destination" class="form-control" id="destination">
	            		</div>
	            	</div>
            	</form>
            	<center>
	            	<a href="#map-canvas" type="submit" class="btn btn-primary submit scrollToDiv" id="submit"><i class="fa fa-check"></i>&nbsp;Submit</a>
	            </center>
            	<center>
	            	<a href="#map-canvas" class="circle scrollToDiv"><i class="fa fa-2x fa-arrow-down"></i></a>
            	</center>
            </div>
        </div>
    </header>
    
   	<div id="map-canvas"></div>
 
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
        <ol class="carousel-indicators"> 
            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li> 
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li> 
        </ol> 
        <div class="carousel-inner" role="listbox"> 
            <div class="item">
                <img data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide [900x500]" src="/img/background2.jpg" data-holder-rendered="true">
            </div> 
            <div class="item">
                <img data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide [900x500]" src="/img/parking2.jpg" data-holder-rendered="true">
            </div> 
            <div class="item active"> 
                <img data-src="holder.js/900x500/auto/#555:#333/text:Third slide" alt="Third slide [900x500]" src="/img/parking3.jpg" data-holder-rendered="true"> 
            </div> 
        </div> 
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 
            <span class="sr-only">Previous</span> 
        </a> 
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> 
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> 
            <span class="sr-only">Next</span> </a> 
    </div>
    <div class="hidden">
	    <form id="stripe" action="" method="POST">
		  <script
		    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		    data-key="pk_test_mWjCI2kTeACsWi4lY42JaFM7"
		    data-amount="2000"
		    data-name="Demo Site"
		    data-description="2 widgets ($20.00)"
		    data-locale="auto">
		  </script>
		</form>
	</div>

	
    <!-- Add Car Modal -->
    <div class="modal fade" id="addCar" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
			@if(!Auth::check() || count(Auth::user()->cars()) === 0)
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> {{{ 'Add A Car' }}}</h4>
                </div>
            {{ Form::open(['action' => 'CarsController@store']) }}
            	<div class="add-Car"></div>
                <div class="modal-body">
                    <div class="form-group">
                        {{ $errors->first('make', '<span class="help-block alert alert-danger">:message</span>') }}
                        <label for="make">Make</label>
                        <input type="text" class="form-control" placeholder="Please enter your car's make" name="make">
                    </div>
                    <div class="form-group">
                        {{ $errors->first('model', '<span class="help-block alert alert-danger">:message</span>') }}
                        <label for="model">Model</label>
                        <input type="text" class="form-control" placeholder="Please enter your car's model" name="model">
                    </div>
                    <div class="form-group">
                        {{ $errors->first('license_plate_number', '<span class="help-block alert alert-danger">:message</span>') }}
                        <label for="license_plate_number">License Number</label>
                        <input type="text" class="form-control" placeholder="Please enter your car's license plate number" name="license_plate_number">
                    </div>
                    <div class="form-group">
                        {{ $errors->first('color', '<span class="help-block alert alert-danger">:message</span>') }}
                        <label for="color">Color</label>
                        <input type="text" class="form-control" placeholder="Please enter your car's color" name="color">
                    </div>
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
@stop

@section('bottom-script')
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb0ttOlTfxWFBvkLFiAh37EVNdwBA0xyM&callback=initMap"></script>
	<script src="/js/map.js"></script>
	<script src="/js/parking_lot_form.js"></script>
	<script src="/js/form-effect.js"></script>
	<script src="/js/parking_lots.js"></script>
	<script src="/js/find_me.js"></script>
@stop