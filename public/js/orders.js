$(document).ready(function() {
	$(document).on('click', '#true', function() {
		$('.fa-check.fa-lg').removeClass('clicked');
		var trueValue = $(this).attr('value');
		$('#recommended').attr('value', trueValue);
		console.log($('#recommended').attr('value'));
		$('.fa-times.fa-lg').addClass('clicked');
	});

	$(document).on('click', '#false', function() {
		$('.fa-times.fa-lg').removeClass('clicked');
		var trueValue = $(this).attr('value');
		$('#recommended').attr('value', trueValue);
		console.log($('#recommended').attr('value'));
		$('.fa-check.fa-lg').addClass('clicked');
	});
});