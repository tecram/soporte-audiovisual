var initPage = (function () {

	'use strict';

	var morphSearch = $('#morphsearch'),
		input = $('input.morphsearch-input'),
		ctrlClose = $('span.morphsearch-close'),
		isOpen = false;

	function asd() {
		var asd = 1;
	};

	function toggleSearch(evt){
		if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;
		var offsets = morphsearch.getBoundingClientRect();
		if( isOpen ) {
			morphSearch.removeClass( 'open' );
			if( input.value !== '' ) {
				setTimeout(function() {
					morphSearch.addClass( 'hideInput' );
					setTimeout(function() {
						morphSearch.removeClass( 'hideInput' );
						input.value = '';
					}, 300 );
				}, 500);
			}
			
			input.blur();
		}
		else {
			morphSearch.addClass( 'open' );
		}
		isOpen = !isOpen;
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

	input.on( 'focus', toggleSearch );
	ctrlClose.on( 'click', toggleSearch );
	$(document).on( 'keydown', function( ev ) {
		var keyCode = ev.keyCode || ev.which;
		if( keyCode === 27 && isOpen ) {
			toggleSearch(ev);
		}
	} );

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