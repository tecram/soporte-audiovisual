var initPage = (function () {

	'use strict';

	function asd() {
		var asd = 1;
	};


	if($('.nav-tabs').length){
		$('.nav-tabs a').click( function (e) {
			e.preventDefault();
			$('.nav-tabs a, .nav-tabs li, .tab-pane').removeClass('active');
			var tabToShow = $(this).attr('href');
			$(this).parent().addClass('active');
			$(tabToShow).addClass('active');
		})
	}

	$('.mobileToggle').on('click', function(e){ 
		e.preventDefault();
		$(this).toggleClass('active');
		$('.main-nav').toggleClass('hidden-xs hidden-sm');
	});

	if($('.slick-slider').length){
		$('.slick-slider').slick({
			dots: true
		});
	}
	
});

$(window).load( function() {
	'use strict';
	$('section.loader').delay(1000).fadeOut('fast');
});