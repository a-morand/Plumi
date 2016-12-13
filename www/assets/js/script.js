$( document ).ready(function() {
	
	if(typeof exercise !== 'undefined' && exercise === true)
	{
		$('.exercise').on('keyup keypress', function(e) {
		  var keyCode = e.keyCode || e.which;
		  if (keyCode === 13) { 
		    e.preventDefault();
		    return false;
		  }
		});
		$('.exercise').find('.box').eq(0).show();
		$('.exercise').find('.button-next').on('click', function(e){
			console.log($(this).parent('.box').find('.input-answer').val());
			console.log($(this).parent('.box').data('answer'));
			$(this).parent('.box').hide().nextAll('.box').first().show();
		})
	}
});