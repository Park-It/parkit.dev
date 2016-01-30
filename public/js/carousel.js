$(document).ready(function() {

	/* VEGAS Home Slider */
	
	$('#page-welcome').vegas({
	    slides: [
	        { src: '/img/background2.jpg' },
	        { src: '/img/parking2.jpg' },
	        { src: '/img/parking3.jpg' }
	    ]
	});

    $("#vegas-next").click(function() {
        $('#page-welcome').vegas('next');
    });
    $("#vegas-prev").click(function() {
       $('#page-welcome').vegas('previous');
    });

    $('.next').on('vegaspause', function (e, index, slideSettings) {
    	console.log("Pause on Slide index " + index);
	});

});
