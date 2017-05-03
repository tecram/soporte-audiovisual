var initPage = (function () {

	'use strict';

	var SoporteAudio = {
		wowInit: function() {
			var wow = new WOW({
				boxClass: 'wow',
				animateClass: 'animated',
				offset: 200,
				mobile: true,
				live: true
			})
			wow.init();
		},
		panelFiltrosInit: function(){
			var panelContainer = $('.filter-container'),
				panelContent = $('.filter-container .content'),
				panelBtn = $('.show-filter'),
				panelOverlay = $('.overlay-filter'),
				flag = 1;
			if(panelContainer.length) {
				if(flag===1){
					panelContent.nanoScroller();
					flag = 2;
				}
				panelBtn.click( function (e) {
					e.preventDefault();
					panelContainer.toggleClass('active');
					panelContent.toggleClass('active');
					panelOverlay.toggleClass('active');
				});
				panelOverlay.click( function (e) {
					e.preventDefault();
					panelContainer.removeClass('active');
					panelContent.removeClass('active');
					panelOverlay.removeClass('active');
				});
			};
		},
		tabsDescription: function(element){
			$('.nav-tabs a, .nav-tabs li, .tab-pane').removeClass('active');
			var tabToShow = $(element).attr('href');
			$(element).parent().addClass('active');
			$(tabToShow).addClass('active');
		},
		getFiltersParams: function () {
			var filters = [],
				id;

			$.each($('.filter-container input:checked'), function () {
				id = $(this).attr('id');
				filters.push(id);
			});
			
			$.ajax({
  				method: "POST",
				url: path + "/getProducts.php",
				data: { products: filters.join() }
	        })
			.done(function( response ) {
			    $('.main-content').html(response);
			    $('.overlay-filter').trigger('click');
		  	});
		}
	}
	
	SoporteAudio.panelFiltrosInit();

	SoporteAudio.wowInit();

	if($('.nav-tabs').length){
		$('.nav-tabs a').click( function (e) {
			e.preventDefault();
			SoporteAudio.tabsDescription(this);
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
	};

	$('.content-buttons .apply').on('click', function (e) {
		e.preventDefault();
		SoporteAudio.getFiltersParams();
	})
});

$(window).load( function() {
	'use strict';
	$('section.loader').delay(1000).fadeOut('fast');
});