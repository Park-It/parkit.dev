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
				markers[index].content += '<p>Average rating: ' + parking_lot.average_rating + '/10</p>';
			}
			// markers[index].content += carsPulldown;

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

	var handler = StripeCheckout.configure({
	    key: 'pk_test_mWjCI2kTeACsWi4lY42JaFM7',
	    locale: 'auto',
	    token: function(token) {
	      // Use the token to create the charge with a server-side script.
	      // You can access the token ID with `token.id`
	    }
	});

    // Bind the click event on your button here
	$(document).on('click', '.submitStripe', function() {
		var btn_amount = $(this).data('amount');// button data
		var btn_name = $(this).data('name');
		var btn_description = $(this).data('description');
		var btn_locale = $(this).data('locale');
		var parking_lot_id = $(this).data('parking-lot-id');
		var car_id = $(this).data('car-id');
		// console.log(parking_lot_id, car_id);
		// console.log($(this).data('parking_lot_id'));
		$('#hiddenParkingLot').attr('value', parking_lot_id);
		var hiddenParkingLot = $('#hiddenParkingLot').val();
		// console.log(hiddenParkingLot);
		$("#addCarForm").submit();

		$.get('/cars', function(data){
			console.log(data);
		});
		// Find the token value from the page using jQuery
    	var token = $("meta[name=csrf-token]").attr("content");
		//create object
		var submittedData = {parking_lot_id: '' + parking_lot_id + '', car_id: '' + car_id + '', _token: token};
		// console.log(submittedData);
		$.post('/orders', submittedData);

		// console.log(btn_amount, btn_name, btn_description, btn_locale);
		$('#addCar').modal('hide');
		handler.open({
	    	name: btn_name,
	      	description: btn_description,
	      	amount: btn_amount * 100,
	      	locale: btn_locale
	    });

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
		var parking_info = '<h4>Parking Lot Information</h4>';
		var parking_lot = $.get('/parkinglot/' + id , function(data) {
			// console.log(data);
			parking_info += '<p>Name: ' + data[0].name + '</p>';
			parking_info += '<p>Address: ' + data[0].address + '</p>';
			parking_info += '<p>Price: ' + data[0].price + '</p>';
			parking_info += '<p>Maximum spots: ' + data[0].max_spots + '</p>';
			if (data[0].average_rating == null) {
				parking_info += '<p>Average rating: No ratings available</p>';
			} else {
				parking_info += '<p>Average rating: ' + data[0].average_rating + '/10</p>';
			}
			// console.log(data);
			var submitButton = '<button id="payButton" type="submit" data-key="pk_test_mWjCI2kTeACsWi4lY42JaFM7" data-amount="' + data[0].price + '" data-name="' + data[0].name + '" data-description="' + data[0].address + '" data-parking-lot-id="' + data[0].id + '" data-locale="auto" class="submitStripe btn btn-primary"><i class="fa fa-credit-card"></i>&nbsp;Pay Now</button>';
			// console.log(data);
			$('.add-Car').html(parking_info);
			$('.addFooter').html(submitButton);
		});

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
		
		// console.log($(this).data('parkinglot-id'));
		$("#addCar").modal();
	});
});

