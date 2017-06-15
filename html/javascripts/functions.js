var SoporteAudio = {
	wowInit: function() {
		'use strict';
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
		'use strict';
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
		'use strict';
		$('.nav-tabs a, .nav-tabs li, .tab-pane').removeClass('active');
		var tabToShow = $(element).attr('href');
		$(element).parent().addClass('active');
		$(tabToShow).addClass('active');
	},
	getFiltersParams: function () {
		'use strict';
		var filters = [],
			id;

		$.each($('.filter-container input:checked'), function () {
			id = $(this).attr('id');
			filters.push(id);
		});
		var filtersId = filters.join();
		if ( filtersId.length > 0 ) {
			SoporteAudio.loading('show');
			$.ajax({
				method: "POST",
				url: path + "/getProducts.php",
				data: { products: filtersId }
			})
			.done(function( response ) {
			    $('.main-content').html(response).addClass('margin-v');
			    $('.active-filter .list').html(SoporteAudio.showFiltersActive(filters));
			    SoporteAudio.loading('hide');
			    $('.show-filter').trigger('click');
		  	});
	  	}
	},
	showFiltersActive: function(filters) {
		'use strict';
		var string="";
		string += "<ul>";
		$.each(filters, function(index, val) {
			var element = $('.filter-container input[value="'+val+'"]');
			if(parent){
				string += "<li><a href='#' data-id='"+val+"'>"+element.attr('data-name')+"</a></li>";
			}
		});
		string += "</ul>";
		return string;
	},
	loading: function(status){
		'use strict';
		var $loadContent = $('section.loader');
		if(status==='show'){
			$loadContent.fadeIn('fast');
		}else if(status==='hide'){
			$loadContent.fadeOut('fast');
		}else{
			return('Loading Error: pasar parametro "show/hide"');
		}
	}
};

var initPage = (function () {

	'use strict';
	
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

	$('.filter-container').on('click', '.active-filter a', function(){
		var id = $(this).attr('data-id');
		$('.filter-container input[value="'+id+'"]').removeAttr('checked');
		SoporteAudio.getFiltersParams();
	})
	$('.content-buttons .reset').on('click', function (e) {
		e.preventDefault();
		location.reload();
	})

	$('.content-buttons .apply').on('click', function (e) {
		e.preventDefault();
		SoporteAudio.getFiltersParams();
	})
});

$(window).load( function() {
	'use strict';
	SoporteAudio.loading('hide');
});