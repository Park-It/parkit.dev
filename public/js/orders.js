$(document).ready(function() {
	$(document).on('click', '#true', function() {
		var trueValue = $(this).attr('value');
		$('#recommended').attr('value', trueValue);
		console.log($('#recommended').attr('value'));
	});

	$(document).on('click', '#false', function() {
		var trueValue = $(this).attr('value');
		$('#recommended').attr('value', trueValue);
		console.log($('#recommended').attr('value'));
	});
});