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
			$(this).parent('.box').hide().nextAll('.box').first().show();
		})

		$('.exercise').find('.button-sound').on('click', function(e){
			responsiveVoice.speak($(this).parent('.box').data('audio'),"French Female", {rate: 0.5});
		})

		$('.exercise').find('.button-validate').on('click', function(e){
			$(this).parent('.box').find('.button-validate').hide();
			$(this).parent('.box').find('.button-next').show();
			$(this).parent('.box').find('.answer').show();
			if($(this).parent('.box').find('.input-answer').val() == $(this).parent('.box').data('answer'))
			{
				$(this).parent('.box').find('.success').show();
			} else {
				$(this).parent('.box').find('.fail').show();
			}
		})

		var proposals = $('.box.box-2').data('proposals');
		var button = '';
		$('.button-cave').parent('.box-2')
			for(var i = 0, l = proposals.length; i < l; i++) {
				button += '<button class="button-proposals-success" type="button">'+proposals[i]+'</button>';
			}

		$('.button-cave').append($(button));

		$('.box.box-2').find('.button-proposals-success').on('click', function(e){
			$(this).addClass('test');
			var checkedAnswer = $('.test').text();
			var rightAnswer = $('.box.box-2').data('answer');

			if (String(checkedAnswer) === String(rightAnswer)){
				console.log('Bonne réponse');
				$(this).removeClass('test');
			} else {
				console.log('Mauvaise réponse');
				$(this).removeClass('test');
			}
		
		// console.log($('.box.box-2').find('test').data('answer'));
		// console.log($('.box.box-2').data('proposals'));
		// console.log($('.box.box-2').data('answer'));
		})
		
		// $(this).parent('.box-2').find('.button-proposals-success').css({"background-color":"red"});
	}

});