function initMap() {
	var map = new google.maps.Map(document.getElementById('map-canvas'), {
		zoom: 17,
	    center: {
	        lat: 29.4284595, 
	        lng: -98.492433
	    },  
	    mapTypeControlOptions: {
	        mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.TERRAIN]
	    }
	});
};