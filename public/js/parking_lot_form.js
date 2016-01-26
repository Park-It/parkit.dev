$(document).ready(function() {
	"use strict";

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

});
