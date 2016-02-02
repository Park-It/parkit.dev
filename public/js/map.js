// var carsPulldown;

function initMap() {
	var customMapType = new google.maps.StyledMapType(
    [
	    {
	        "featureType": "landscape.man_made",
	        "elementType": "geometry",
	        "stylers": [
	            {
	                "color": "#f7f1df"
	            }
	        ]
	    },
	    {
	        "featureType": "landscape.natural",
	        "elementType": "geometry",
	        "stylers": [
	            {
	                "color": "#d0e3b4"
	            }
	        ]
	    },
	    {
	        "featureType": "landscape.natural.terrain",
	        "elementType": "geometry",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "featureType": "poi",
	        "elementType": "labels",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "featureType": "poi.business",
	        "elementType": "all",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "featureType": "poi.medical",
	        "elementType": "geometry",
	        "stylers": [
	            {
	                "color": "#fbd3da"
	            }
	        ]
	    },
	    {
	        "featureType": "poi.park",
	        "elementType": "geometry",
	        "stylers": [
	            {
	                "color": "#bde6ab"
	            }
	        ]
	    },
	    {
	        "featureType": "road",
	        "elementType": "geometry.stroke",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "featureType": "road",
	        "elementType": "labels",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "featureType": "road.highway",
	        "elementType": "geometry.fill",
	        "stylers": [
	            {
	                "color": "#ffe15f"
	            }
	        ]
	    },
	    {
	        "featureType": "road.highway",
	        "elementType": "geometry.stroke",
	        "stylers": [
	            {
	                "color": "#efd151"
	            }
	        ]
	    },
	    {
	        "featureType": "road.arterial",
	        "elementType": "geometry.fill",
	        "stylers": [
	            {
	                "color": "#ffffff"
	            }
	        ]
	    },
	    {
	        "featureType": "road.local",
	        "elementType": "geometry.fill",
	        "stylers": [
	            {
	                "color": "black"
	            }
	        ]
	    },
	    {
	        "featureType": "transit.station.airport",
	        "elementType": "geometry.fill",
	        "stylers": [
	            {
	                "color": "#cfb2db"
	            }
	        ]
	    },
	    {
	        "featureType": "water",
	        "elementType": "geometry",
	        "stylers": [
	            {
	                "color": "#a2daf2"
	            }
	        ]
	    }
	], {
        name: 'Apple'
    });
	var midnightMapType = new google.maps.StyledMapType([
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 13
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#144b53"
            },
            {
                "lightness": 14
            },
            {
                "weight": 1.4
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#08304b"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#0c4152"
            },
            {
                "lightness": 5
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#0b434f"
            },
            {
                "lightness": 25
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#0b3d51"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "color": "#146474"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#021019"
            }
        ]
    }
	] , {
        name: 'Midnight'
    });

	var customMapTypeId = 'custom_style';
	var customMapTypeId2 = 'custom_style2';

	map = new google.maps.Map(document.getElementById('map-canvas'), {
		zoom: 17,
	    center: {
	        lat: 29.4284595, 
	        lng: -98.492433
	    },  
	    mapTypeControlOptions: {
	        mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.TERRAIN, customMapTypeId, customMapTypeId2]
	    },
	    scrollwheel: false
	});

	map.mapTypes.set(customMapTypeId, customMapType);
	map.mapTypes.set(customMapTypeId2, midnightMapType);

	$(".find_me").click(function(e) {
		e.preventDefault();

		var infoWindow = new google.maps.InfoWindow({map: map});

		if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		      	var pos = {
		        	lat: position.coords.latitude,
		        	lng: position.coords.longitude
		      	};

		      	infoWindow.setPosition(pos);
		      	infoWindow.setContent('Location found.');
		      	map.setCenter(pos);
		    }, function() {
		      	handleLocationError(true, infoWindow, map.getCenter());
		    });
		} else {
		    // Browser doesn't support Geolocation
		    handleLocationError(false, infoWindow, map.getCenter());
		}


		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		  	infoWindow.setPosition(pos);
		  	infoWindow.setContent(browserHasGeolocation ?
		    'Error: The Geolocation service failed.' :
		    'Error: Your browser doesn\'t support geolocation.');
		}
	});

	$.getJSON('/lots/json').done(function(data) {

		var markers = [];

		// var cars = $.get('/user/cars').done(function(data) {
		// 	carsPulldown = '<select>';
		// 	console.log(data);

		// 	data.forEach(function (element, index, array){
		// 		// build html
		// 		carsPulldown += '<option value="' + element.id + '">' + element.make + '</option>';
		// 	});

		// 	carsPulldown += '</select>';
		// });
		

		// loops through data
		data.forEach(function (parking_lot, index, array){
			//creates empty object and pushes it in markers
			markers.push({});
			//creates a key of title with the parking lots name as the value 
			markers[index].title = parking_lot.name;
			//creates a empty object called position
			markers[index].position = {};
			//creates a key of lat with the parking lots lat as the value
			markers[index].position.lat = parking_lot.lat;
			//creates a key of lng with the parking lots lng as the value
			markers[index].position.lng = parking_lot.lng;
			//creates a key of content with the parking lots name, address, price, max_spots as the value
			markers[index].content = '<h3>' + parking_lot.name + '</h3>' 
			markers[index].content += '<p>' + parking_lot.address + '</p>' 
			markers[index].content += '<p>Price: $' + parking_lot.price + '</p>' 
			markers[index].content += '<p>Maximum spots: ' + parking_lot.max_spots + '</p>';

			if (parking_lot.average_rating == null) {
				markers[index].content += '<p>Average rating: No ratings available</p>';
			} else {
				markers[index].content += '<p>Average rating: ' + parking_lot.average_rating + '/5</p>';
			}
			// markers[index].content += carsPulldown;
			markers[index].content += '<p><a href="#" data-id="' + parking_lot.id + '" data-toggle="modal" data-target="#commentModal" class="comment">View comments and ratings</a></p>'
			// markers[index].content += '<button data-toggle="modal" data-target="#selectCar" class="btn btn-primary"><i class="fa fa-mouse-pointer"></i>&nbsp;Select a Car</button>'
			markers[index].content += '<button data-rating="' + parking_lot.average_rating + '" data-parkinglot-id="' + parking_lot.id + '" class="btn btn-success addCar"><i class="fa fa-plus"></i>&nbsp;Add a Car</button>'
			// markers[index].content += '<button data-key="pk_test_mWjCI2kTeACsWi4lY42JaFM7" data-amount="' + parking_lot.price + '" data-name="' + parking_lot.name + '" data-description="' + parking_lot.address + '" data-locale="auto" class="submitStripe btn btn-primary"><i class="fa fa-credit-card"></i>&nbsp;Pay Now</button>';
    		markers[index].marker = null;

			var myLatLng = {lat: parseFloat(markers[index].position.lat), lng: parseFloat(markers[index].position.lng)};

			var marker = new google.maps.Marker({
			    map: map,
			    position: myLatLng,
			    title: markers[index].title
			});

			marker.info = new google.maps.InfoWindow({
				content: markers[index].content
			});

			google.maps.event.addListener(marker, 'click', function() {
				marker.info.close();
				marker.info.open(map, marker);
			});
			
		});

	});

	var directionsService = new google.maps.DirectionsService;
  	var directionsDisplay = new google.maps.DirectionsRenderer;

  	directionsDisplay.setMap(map);

	var submitHandler = function() {
		calculateAndDisplayRoute(directionsService, directionsDisplay);
	};
	  
	document.getElementById('submit').addEventListener('click', submitHandler);
	

	function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  		directionsService.route({
    		origin: document.getElementById('address').value,
    		destination: document.getElementById('destination').value,
    		travelMode: google.maps.TravelMode.DRIVING
  		}, function(response, status) {
	    	if (status === google.maps.DirectionsStatus.OK) {
	      		directionsDisplay.setDirections(response);
	    	} else {
	      		window.alert('Directions request failed due to ' + status);
	    	}
  		});
	}

	// Stripe.setPublishableKey('pk_test_mWjCI2kTeACsWi4lY42JaFM7');

	// var stripeResponseHandler = function(status, response) {
 //    	var $form = $('#payment-form');
 //      	if (response.error) {
 //        	// Show the errors on the form
 //        	$form.find('.payment-errors').text(response.error.message);
 //        	$form.find('button').prop('disabled', false);
 //        	alert('Error');
 //      	} else {
 //      		alert('Success');
 //        	// token contains id, last4, and card type
 //        	var token = response.id;
 //        	// Insert the token into the form so it gets submitted to the server
 //        	$form.append($('<input type="hidden" name="stripeToken" />').val(token));
 //        	// and re-submit
 //        	$form.get(0).submit();

 //      	}
 //    };

    // jQuery(function($) {
    //   	$('#payment-form').submit(function(e) {
    //     	var $form = $(this);
    //     	// Disable the submit button to prevent repeated clicks
    //     	$form.find('button').prop('disabled', true);
    //     	Stripe.card.createToken($form, stripeResponseHandler);
    //     	// Prevent the form from submitting with the default action
    //     	return false;
    //   	});
    // });

	$(document).on('click', '.comment', function() {
		var id = $('.comment').data('id');
		// console.log(id);
		var comments = $.get('/comments/json/' + id, function(data) {
			if(data.length == 0) {
				$('.newComments').html('No comments and ratings');
				$('.newComments').addClass('text-center');
				$('.newButton').html('<a href="/orders" class="btn btn-primary">Add a comment or rating</a>');
			} else {
				$('.newComments').removeClass('text-center');
				var newComments = 	'<div class="table-responsive">\
										<table class="table table-striped">\
											<thead>\
												<tr>\
													<th>User</th>\
													<th>Stars</th>\
													<th>Comment</th>\
													<th>Recommended</th>\
												</tr>\
											</thead>\
											<tbody>';

				for(var i=0; i<data.length; i++){
					newComments += 				'<tr>\
													<td>' + data[i].username + '</td>\
													<td>' + data[i].stars + '</td>\
													<td>' + data[i].comment + '</td>\
													<td>' + (data[i].recommended ? '<i class="fa fa-lg fa-check"></i>' : '<i class="fa fa-lg fa-times"></i>') + '</td>\
												</tr>';

				}
						newComments += 		'</tbody>\
										</table>\
									</div>';
				$('.newComments').html(newComments);
			}
		});
	});

	var handler = StripeCheckout.configure({
	    key: 'pk_test_mWjCI2kTeACsWi4lY42JaFM7',
	    locale: 'auto',
	    token: function(token) {
	    	$("#stripeSuccess").modal('show');
	    }
	});

    // Bind the click event on your button here
	$(document).on('click', '.submitStripe', function(e) {
		var btn_amount = $(this).data('amount');// button data
		var btn_name = $(this).data('name');
		var btn_description = $(this).data('description');
		var btn_locale = $(this).data('locale');
		var parking_lot_id = $(this).data('parking-lot-id');
		var car_id = $(this).data('car-id');
		var add_car = $('#addCarForm').data('add-car');
		// console.log(parking_lot_id, car_id);
		// console.log($(this).data('parking_lot_id'));
		$('#hiddenParkingLot').attr('value', parking_lot_id);
		var hiddenParkingLot = $('#hiddenParkingLot').val();
		// var carId;
		// console.log(hiddenParkingLot);
		// $("#addCarForm").submit();
		
		// Find the token value from the page using jQuery
    	var token = $("meta[name=csrf-token]").attr("content");

    	if(add_car){
	    	console.log($("#addCarForm").serialize());

			$.post('user/car', $("#addCarForm").serialize()).done( function(data){
				console.log(data);
				$('#error-make').html('');
				$('#error-model').html('');
				$('#error-license-number').html('');
				$('#error-color').html('');


				if (!data.success) {		
					$('#make').parent().removeClass('has-error');
					$('#model').parent().removeClass('has-error');
					$('#license_plate_number').parent().removeClass('has-error');
					$('#color').parent().removeClass('has-error');
		
					// validator has failed

					// console.log('<span class="alert alert-danger">' + data.make[0] + '</span>');

					// $('#make').after('<p id="make-form" class="red-text">' + data.make[0] + '</p>');
					$('#error-make').html( '<p class="red-text">' + data.make[0] + '</p>');
					$('#error-model').html( '<p class="red-text">' + data.model[0] + '</p>');
					$('#error-license').html( '<p class="red-text">' + data.license_plate_number[0] + '</p>');
					$('#error-color').html( '<p class="red-text">' + data.color[0] + '</p>');

					// $('#model').after('<p id="model" class="red-text">' + data.model[0] + '</p>');
					// $('#license_plate_number').after('<p id="license_plate_number" class="red-text">' + data.license_plate_number[0] + '</p>');
					// $('#color').after('<p id="color" class="red-text">' + data.color[0] + '</p>');

					$('#make').parent().addClass('has-error');
					$('#model').parent().addClass('has-error');
					$('#license_plate_number').parent().addClass('has-error');
					$('#color').parent().addClass('has-error');
					if('.has-error') {
						$('small').addClass('red-text');
					}
				} else {
					$('#addCar').modal('hide');
					handler.open({
				    	name: btn_name,
				      	description: btn_description,
				      	amount: btn_amount * 100,
				      	locale: btn_locale
				    });
				    e.preventDefault();
				}
			});
    		
    	} else {
			//create object
			var submittedData = {parking_lot_id: '' + parking_lot_id + '', car_id: '' + car_id + '', _token: token};
			
			// console.log(submittedData);
			$.post('/orders', submittedData);

			$('#addCar').modal('hide');
			handler.open({
		    	name: btn_name,
		      	description: btn_description,
		      	amount: btn_amount * 100,
		      	locale: btn_locale
		    });
		    e.preventDefault();
    	}
    	

		// console.log(btn_amount, btn_name, btn_description, btn_locale);
		

	});

	// Close Checkout on page navigation
  	$(window).on('popstate', function() {
	    handler.close();
  	});
};

$(document).ready(function() {
	$("#map-canvas").on('click', '.addCar', function() {
		// do an ajax request to get parking lot information
		var id = $(this).data('parkinglot-id');
		var add_car = $('#addCarForm').data('add-car');
		var parking_info = '<h4>Parking Lot Information</h4>';
		var parking_lot = $.get('/parkinglot/' + id , function(data) {
			// console.log(data);
			parking_info += '<p>Name: ' + data[0].name + '</p>';
			parking_info += '<p>Address: ' + data[0].address + '</p>';
			parking_info += '<p>Price: $' + data[0].price + '</p>';
			parking_info += '<p>Maximum spots: ' + data[0].max_spots + '</p>';
			if (data[0].average_rating == null) {
				parking_info += '<p>Average rating: No ratings available</p>';
			} else {
				parking_info += '<p>Average rating: ' + data[0].average_rating + '/5</p>';
			}
			// console.log(data);
			var submitButton = '<button id="payButton" type="submit" data-key="pk_test_mWjCI2kTeACsWi4lY42JaFM7" data-amount="' + data[0].price + '" data-name="' + data[0].name + '" data-description="' + data[0].address + '" data-parking-lot-id="' + data[0].id + '" data-locale="auto" class="submitStripe btn btn-primary"><i class="fa fa-credit-card"></i>&nbsp;Pay Now</button>';
			// console.log(data);
			$('.add-Car').html(parking_info);
			$('.add-Order').html(parking_info);
			$('.addFooter').html(submitButton);
		});
		if(!add_car) {
			var cars = $.get('/user/cars', function(data) {
				carsPulldown = '<select id="selectCar" class="form-control">';
				carsPulldown += '<option selected disable>Select a car</option>';
				// console.log(data);
				data.forEach(function (element, index, array) {
					carsPulldown += '<option value="' + element.id + '">' + element.model + ' ' + element.make + '</option>';
				});
				carsPulldown += '</select>';
				$('.add-Car').append(carsPulldown);
				$('#selectCar').on('change', function() {
					var carId = $(this).find('option:selected').val();
					// console.log(carId);
	  				$('#payButton').attr('data-car-id', carId);

				});
			});
		}
		
		// console.log($(this).data('parkinglot-id'));
		$("#addCar").modal();
	});
});

