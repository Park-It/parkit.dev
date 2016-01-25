$(document).ready(function() {
	"use strict";

	var directionsService = new google.maps.DirectionsService;
  	var directionsDisplay = new google.maps.DirectionsRenderer;

  	directionsDisplay.setMap(map);

	var onChangeHandler = function() {
		calculateAndDisplayRoute(directionsService, directionsDisplay);
	};
	  
	document.getElementById('address').addEventListener('change', onChangeHandler);
	document.getElementById('destination').addEventListener('change', onChangeHandler);
	

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
	// $("form").submit(function(e) {
	//     e.preventDefault();
	//     var address = $("#address").val();
	//     var destination = $("#destination").val();
	//     var geocoder = new google.maps.Geocoder();

	//     geocoder.geocode({ "address": address }, function(results, status) {
	//         if(status == google.maps.GeocoderStatus.OK) {
	//             var latitude = results[0].geometry.location.lat();
	//             var longitude = results[0].geometry.location.lng();
	//             weather(latitude, longitude);
	//         }
	//         else {
	//             alert("Try again!");
	//         }
	//     });

	//     geocoder.geocode({ "destination": destination }, function(results, status) {
	//         if(status == google.maps.GeocoderStatus.OK) {
	//             var latitude = results[0].geometry.location.lat();
	//             var longitude = results[0].geometry.location.lng();
	//             weather(latitude, longitude);
	//         }
	//         else {
	//             alert("Try again!");
	//         }
	//     });
	// });