$( document ).ready(function() {
	$('.nav').find('.universal-font-size').on('click', function(e){
		$(this).toggleClass('clicked-resize');
		if ($(this).hasClass('clicked-resize')) {
			$('body').css('zoom', "120%");
		} else {
			$('body').css('zoom', "100%");
		}
	})

	if(typeof exercice !== 'undefined' && exercice === true)
	{

		$('.exercice').on('keyup keypress', function(e) {
		  var keyCode = e.keyCode || e.which;
		  if (keyCode === 13) {
		    e.preventDefault();
		    return false;
		  }
		});

		$('.exercice').find('.box').eq(0).show();
		$('.exercice').find('.button-next').on('click', function(e){
			$(this).parent('.box').hide().nextAll('.box').first().show();
		})

		$('.exercice').find('.button-sound').on('click', function(e){
			responsiveVoice.speak($(this).parent('.box').data('audio'),"French Female", {rate: 0.5});
		})

		$('.exercice').find('.button-validate').on('click', function(e){
			var $box = $(this).closest('.box');
			$(this).parent('.box').find('.button-validate').hide();
			$(this).parent('.box').find('.button-next').show();
			$(this).parent('.box').find('.answer').show();
			if($(this).parent('.box').find('.input-answer').val() == $(this).parent('.box').data('answer'))
			{
				$(this).parent('.box').find('.success').show();
				$box.find('.input-is-success').val(1);
			} else {
				$(this).parent('.box').find('.fail').show();
			}
		})

		$('.box.box-2').each(function (index, element) {
			var $box = $(element);
			var proposals = $box.data('proposals');
			var tips = $box.data('tips');

			var buttonCave = $box.find('.button-cave')

			for(var i = 0; i < proposals.length; i++) {
				var button = $('<button></button>')
								.addClass('button-proposals-success page__container--list')
								.data('answer', proposals[i])
								.attr('type', 'button')
								.text(proposals[i]);
				buttonCave.append(button);
			}

			var $questionTips = $box.find('.question-tips');

			for(var i = 0; i < tips.length; i++) {
				$questionTips.append($('<p></p>').text(tips[i]));
			}

			$box.find('.button-proposals-success').on('click', function(e){
				var $box = $(this).closest('.box')
				var inputAnswer = $(this).data('answer');
				var rightAnswer = $box.data('answer');
				$box.find('.input-answer').val(inputAnswer);
				if (inputAnswer === rightAnswer){
					console.log('Bonne réponse');
					$box.find('.success').show();
					$box.find('.button-validate').hide();
					$box.find('.button-next').show();
					$(this).css({"background-color":"green"});
					$(this).removeClass('test');
					$box.find('.input-is-success').val(1)
					$box.find('.button-proposals-success').unbind();
				} else {
					console.log('Mauvaise réponse');
					$box.find('.fail').show();
					$box.find('.button-validate').hide();
					$box.find('.button-next').show();
					$(this).css({"background-color":"red"});
					$(this).removeClass('test');
					$box.find('.button-proposals-success').unbind();
					console.log(rightAnswer);

				}
			})

		})

	}

});