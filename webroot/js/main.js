/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point,
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});




$('.panel').on({
	mouseenter: function () {
		var price = $(this).find('p > span');
		price.html(price.html() * 0.9);
		var currentFontSizeNum = parseFloat(price.css('fontSize'));
		var newFontSize = currentFontSizeNum * 1.5;
		price.css('fontSize', newFontSize);
		(price.css('color', 'blue'));
	},
	mouseleave: function () {
		var price = $(this).find('p > span');
		price.html(price.html() / 0.9);
		price.css('fontSize', '');
		price.css('color', '');
	}
});



// =========================================================================  go_order

// //фкнкция вызова формы обратной связи
// $('#callback').click(function(){
// 	//появление окна обратной связи
// 	$('#popup').fadeIn();
// 	//добавляем к окну иконку закрытия
// 	$('#popup').append('<a id="popup_close"></a>');
// 	//расчитываем высоту и ширину всплывающего окна что бы вывести окно прямо по центру экрана
// 	q_width = $('#popup').outerWidth()/-2;
// 	q_height = $('#popup').outerHeight()/-2;
// 	$('#popup').css({
// 		'margin-left': q_width,
// 		'margin-top': q_height
// 	});
// 	//выводим затемение страницы и делаем полупрозрачным
// 	$('body').append('<div id="fade"></div>');
// 	$('#fade').css({'filter' : 'alpha(opacity=40)'}).fadeIn();
// 	return false;
// });
//
// //функция закрытия окна
// $('#close').click(function(){
// 	//появление окна обратной связи
// 	$('#popup').fadeOut();
// 	//выводим затемение страницы и делаем полупрозрачным
// 	$('body').append('<div id="fade"></div>');
// 	$('#fade').css({'filter' : 'alpha(opacity=40)'}).fadeOut();
// 	return false;
// });



$(document).on("ready", function (){
	//появление окна обратной связи
	$('#popup').delay( 15000 ).fadeIn();
	//добавляем к окну иконку закрытия
	$('#popup').append('<a id="popup_close"></a>');
	//расчитываем высоту и ширину всплывающего окна что бы вывести окно прямо по центру экрана
	q_width = $('#popup').outerWidth()/-2;
	q_height = $('#popup').outerHeight()/-2;
	$('#popup').css({
		'margin-left': q_width,
		'margin-top': q_height
	});
	//выводим затемение страницы и делаем полупрозрачным
	$('body').delay( 15000 ).append('<div id="fade"></div>');
	$('#fade').delay( 15000 ).css({'filter' : 'alpha(opacity=40)'}).fadeIn();
	return false;
});


$('#close, #close2').click(function(){
	//появление окна обратной связи
	$('#popup').fadeOut();
	//выводим затемение страницы и делаем полупрозрачным
	$('body').append('<div id="fade"></div>');
	$('#fade').css({'filter' : 'alpha(opacity=40)'}).fadeOut();

});

//функция закрытия окна
	$(window).on('beforeunload', function () {
		return true;
	});

	$('a').click(function (selector) {

		if (!($(selector.target).hasClass('reject-subscription'))) {
			$(window).off('beforeunload');
		}
	});

$(function(){
	$("#search").keyup(function(){
		var search = $("#search").val();
		$.ajax({
			type: "POST",
			url: "/search",
			data: {"search": search},
			cache: false,
			success: function(response){
				$("#resSearch").html(response);
			}
		});
		return false;
	});
});



$(document).ready(function () {
	$("#comment_form").submit(function (event) {

		event.preventDefault();
		var $form = $(this).prev();
		var id_parent = $form.find('#id_comment').val();
		if(id_parent == undefined){
			id_parent = 0;
		}
		var id_news = $(this).find('#id_news').val();
		var comment = $(this).find('textarea').val();

		$.post("/ajax/list", {comment: comment, id_parent: id_parent, id_news: id_news},
		function (data) {
			var $cnt = parseInt($('.badge').text());
			$('.badge').html($cnt + 1);
			var data = $(data);

			  $('.panel2').remove();
			$('#comment_form textarea').val('');

			$('#comment_form').after(data);
		}
		);
	});
});



$(document).on('click', '.panel-footer #answer', function () {
	var panel_info = $(this).closest('.panel2');
	$(panel_info).after($('#comment_form'));
	$("button:reset").click(function () {
		$('.panel2').eq(0).before($('#comment_form'));
	});
});

$(document).ready(function () {
	$(document).on('click', 'button#like', function () {
		setVote('like', $(this));
	});

	$(document).on('click', 'button#dislike', function () {
		setVote('dislike', $(this));
	});

});


// type - тип голоса. Лайк или дизлайк
// element - кнопка, по которой кликнули
function setVote(type, element) {
	// получение данных из полей
	//var id_user = $('#id_user').val();
	var temp = element.parent();

	var id_comment = temp.find('#id_comment').val();

	var id_parent = temp.find('#id_parent').val();

	$.ajax({
		// метод отправки
		type: "POST",
		// путь до скрипта-обработчика
		url: "/ajax/list",
		// какие данные будут переданы
		data: {
			'id_comment': id_comment,
			'type': type
		},

		// тип передачи данных
		dataType: "json",
		// действие, при ответе с сервера
		success: function (data) {

			// в случае, когда пришло success. Отработало без ошибок
			if (data.result == 'success') {
				// Выводим сообщение
				alert('Голос засчитан');
				// увеличим визуальный счетчик
				var count = parseInt(element.find('span').html());
				element.find('span').html(count + 1);
			} else {
				// вывод сообщения об ошибке
				alert(data.result);
			}
		}
	});
}

$(document).ready(function () {
	$('#read').text(randomInteger(1, 5));
	setInterval(function () {
		$('#read').text(randomInteger(1, 5));
	}, 3000);
});

function randomInteger(min, max) {
	var rand = min + Math.random() * (max + 1 - min);
	rand = Math.floor(rand);
	return rand;}



