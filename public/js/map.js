function initMap() {
	map = new google.maps.Map(document.getElementById('map-canvas'), {
		zoom: 17,
	    center: {
	        lat: 29.4284595, 
	        lng: -98.492433
	    },  
	    mapTypeControlOptions: {
	        mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.TERRAIN]
	    }
	});

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
			markers[index].content += '<p> Price: $' + parking_lot.price + '</p>' 
			markers[index].content += '<p>Maximum spots: ' + parking_lot.max_spots + '</p>';

			if (parking_lot.average_rating == null) {
				markers[index].content += '<p>Average rating: No ratings available</p>';
			} else {
			markers[index].content += '<p>Average rating: ' + parking_lot.average_rating + '/10</p>';
			}
			markers[index].content += '<button class="btn btn-primary"><i class="fa fa-credit-card"></i>&nbsp;Pay now';
			markers[index].content += '<form action="" method="POST">';
			markers[index].content += '<script';
			markers[index].content += 'src="https://checkout.stripe.com/checkout.js" class="stripe-button"';
			markers[index].content += 'data-key="pk_test_mWjCI2kTeACsWi4lY42JaFM7"';
  			markers[index].content += 'data-amount="2000"';
   			markers[index].content += 'data-name="Demo Site"';
   			markers[index].content += 'data-description="2 widgets ($20.00)"';
   			markers[index].content += 'data-image="/128x128.png"';
   			markers[index].content += 'data-locale="auto">';
   			markers[index].content += '</script>';
   			markers[index].content += '</form>';
   			markers[index].content += '</button>';
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
};