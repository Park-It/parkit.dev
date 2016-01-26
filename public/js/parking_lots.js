$(document).ready(function() {
	"use strict";

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

});