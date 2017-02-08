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
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
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

$(document).ready(function () {
    $(window).on('beforeunload', function () {
        return true;
    });

    $('a').click(function () {
        $(window).off('beforeunload');
    });
});

