// $(document).ready(function() {
// 	"use strict";

// 	function findMe() {
// 		$(".find_me").click(function(e) {
// 			e.preventDefault();

// 			var infoWindow = new google.maps.InfoWindow({map: map});

// 			if (navigator.geolocation) {
// 			    navigator.geolocation.getCurrentPosition(function(position) {
// 			      	var pos = {
// 			        	lat: position.coords.latitude,
// 			        	lng: position.coords.longitude
// 			      	};

// 			      	infoWindow.setPosition(pos);
// 			      	infoWindow.setContent('Location found.');
// 			      	map.setCenter(pos);
// 			    }, function() {
// 			      	handleLocationError(true, infoWindow, map.getCenter());
// 			    });
// 			} else {
// 			    // Browser doesn't support Geolocation
// 			    handleLocationError(false, infoWindow, map.getCenter());
// 			}


// 			function handleLocationError(browserHasGeolocation, infoWindow, pos) {
// 			  	infoWindow.setPosition(pos);
// 			  	infoWindow.setContent(browserHasGeolocation ?
// 			    'Error: The Geolocation service failed.' :
// 			    'Error: Your browser doesn\'t support geolocation.');
// 			}
// 		});
// 	}

// });