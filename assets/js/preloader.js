

var preloader = {
	enabled: true,
	functions: {
		delay: function(ms) {
			var start = +new Date;
			while ((+new Date - start) < ms);
		},
		finish: function() {
			jQuery('.main-wrapper').addClass('show');
			jQuery([
				'.b-main-homescreen-bg',
				'.b-main-homescreen-text',
				'.b-main-homescreen-title p',
				'.b-landing-homescreen-text',
				'.b-landing-homescreen-title p',
				'.b-landing-homescreen-subtitle p'
			].join(',')).addClass('animate');
			setTimeout(function () {
				jQuery('.b-main-homescreen-line').addClass('show');
			}, 2000);
			setTimeout(function () {
				jQuery('.b-main-homescreen-button').addClass('show');
			}, 500);
			setTimeout(function () {
				jQuery('.b-main-homescreen-award').addClass('show');
			}, 1000);
			deluxart.functions.cookieSet('cached', '1');
		}
	}
};

jQuery(document).ready(function() {
    // if (preloader.enabled && typeof deluxart.functions.cookieGet('cached') === 'undefined') {
    if (preloader.enabled) {
		(function() {
			var block = jQuery('.b-preloader');
			var items = block.find('.b-preloader-item');
			function preloaderSetItem(n) {
				setTimeout(function() {
					items.eq(n).addClass('show').prev().removeClass('show');
					if (n === items.length - 1)
						/*
						checker = setInterval(function() {
							if (jQuery('body').hasClass('window-loaded')) {
								block.addClass('hide').removeClass('bg-black');
								clearInterval(checker);
								setTimeout(function() {
									preloader.functions.finish();
								}, 0);
							}
						}, 1800);
						*/
						setTimeout(function() {
							block.addClass('hide').removeClass('bg-black');
							preloader.functions.finish();
						}, 1800);
				}, n * 400);
			}
			if (block.length) {
				block.addClass('bg-black show');
				setTimeout(function() {
					items.not(':last-child').addClass('zoom-out');
					for (i = 0; i < items.length; i++) {
						preloaderSetItem(i);
					}
				}, 900);
			}
			else {
				preloader.functions.finish();
			}
		})();
	}
	else {
		preloader.functions.finish();
	}
});

jQuery(window).on('load', function() {
	jQuery('body').addClass('window-loaded');
});

jQuery(window).on('beforeunload', function() {});
