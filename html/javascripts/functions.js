var initPage = (function () {

	'use strict';

	var asdAfd;
	function asd() {
		var asd = 1;
	};

	$(document).ready( function () {
		asd();
		$('.mobileToggle').on('click', function(e){ 
			e.preventDefault();
			$(this).toggleClass('active');
			$('.main-nav').toggleClass('hidden-xs hidden-sm');
		})
	})
});