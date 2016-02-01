$(document).ready(function() {
	$(document).on('click', '#editRating', function() {
		var rec = $('#new_recommended').attr('value');
		console.log(rec);
	});

	$(document).on('click', '#true', function() {
		$('.fa-check.fa-2x').removeClass('clicked');
		var trueValue = $(this).attr('value');
		$('#new_recommended').attr('value', trueValue);
		console.log($('#new_recommended').attr('value'));
		$('.fa-times.fa-2x').addClass('clicked');
	});

	$(document).on('click', '#false', function() {
		$('.fa-times.fa-2x').removeClass('clicked');
		var trueValue = $(this).attr('value');
		$('#new_recommended').attr('value', trueValue);
		console.log($('#new_recommended').attr('value'));
		$('.fa-check.fa-2x').addClass('clicked');
	});
});