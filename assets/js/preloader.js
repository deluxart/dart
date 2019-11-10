var jQuery( = {
    cursorPosition: {
        x: Math.ceil(jQuery(window).width() / 2),
        y: Math.ceil(jQuery(window).height() / 2)
    },
    isMobile: (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)),
    isTouch: Modernizr.touchevents,
    scrollWidth: window.innerWidth - document.documentElement.clientWidth,
    sliders: {
        homescreenCases: { // DEPRECATED
            current: 0,
            offset: 0,
            slideDelta: 300,
            updateInfo: function () {
                var slide = jQuery('.b-main-cases-slide.active');
                var info = jQuery('.b-main-cases-slide-content');
                //var logo = info.find('.b-main-cases-slide-logo');
                info.addClass('animate');
                setTimeout(function () {
                    //logo.empty();
                    //slide.find('.b-main-cases-slide-logo img').clone().appendTo(logo);
                    info.find('.b-main-cases-slide-title').text(slide.data('title'));
                    info.find('.b-main-cases-slide-text').text(slide.data('text'));
                    info.attr('href', slide.attr('href'));
                }, 450);
                setTimeout(function () {
                    info.removeClass('animate');
                }, 900);
            }
        },
        portfolio: {

        }
    },
    functions: {
        cookieSet: function (name, value, options) {
            options = options || {};
            var expires = options.expires;
            if (typeof expires === 'number' && expires) {
                var d = new Date();
                d.setTime(d.getTime() + expires * 1000);
                expires = options.expires = d;
            }
            if (expires && expires.toUTCString) {
                options.expires = expires.toUTCString();
            }
            value = encodeURIComponent(value);
            var updatedCookie = name + "=" + value;
            for (var propName in options) {
                updatedCookie += "; " + propName;
                var propValue = options[propName];
                if (propValue !== true) {
                    updatedCookie += "=" + propValue;
                }
            }
            document.cookie = updatedCookie;
        },
        cookieDelete: function (name) {
            this.cookieSet(name, '', {
                expires: -1
            });
        },
        cookieGet: function (name) {
            var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        },
        scrollLock: function () {
            jQuery('html').addClass('scroll-lock');
            jQuery('.main-wrapper, .b-fixed-content, .b-header').css('padding-right', jQuery(.scrollWidth + 'px');
        },
        scrollUnlock: function () {
            jQuery('html').removeClass('scroll-lock');
            jQuery('.main-wrapper, .b-fixed-content, .b-header').css('padding-right', '0');
        },
        scrollPageTo: function (anchor) {
            var target = jQuery(anchor);
            if (target.length) {
                jQuery('html, body').animate({
                    scrollTop: target.offset().top
                }, 1500);
                jQuery('body').removeClass('menu-active');
            }
        },
        getCursorCenterOffset: function () {
            var windowCenterX = jQuery(window).width() / 2;
            var windowCenterY = jQuery(window).height() / 2;
            return {
                x: Math.ceil(jQuery(.cursorPosition.x - windowCenterX),
                y: Math.ceil(jQuery(.cursorPosition.y - windowCenterY)
            };
        },
        getBlockScrollProgress: function (block, bottom) {
            var result = 0;
            var windowScrollPosition = jQuery(window).scrollTop();
            var blockOffsetTop = block.offset().top;
            var blockHeight = block.outerHeight();
            var blockOffsetBottom = blockOffsetTop + blockHeight;
            if (bottom)
                windowScrollPosition += jQuery(window).outerHeight();
            if (windowScrollPosition >= blockOffsetTop && windowScrollPosition <= blockOffsetBottom)
                result = Math.ceil(((windowScrollPosition - blockOffsetTop) / blockHeight) * 100);
            if (windowScrollPosition > blockOffsetBottom)
                result = 100;
            return result;
        },
        getBlockViewportProgress: function (block) {
            var windowScrollPositionTop = jQuery(window).scrollTop();
            var windowScrollPositionBottom = windowScrollPositionTop + jQuery(window).outerHeight();
            var blockOffsetTop = block.offset().top;
            var blockOffsetBottom = blockOffsetTop + block.outerHeight();
            if (this.checkBlockIsInViewport(block))
                return Math.ceil((Math.ceil((blockOffsetBottom + blockOffsetTop) / 2) - windowScrollPositionTop) / (windowScrollPositionBottom - windowScrollPositionTop) * 100);
            else
                return 0;
        },
        checkBlockIsInViewport: function (block) {
            if (block.length)
                return (this.getBlockScrollProgress(block, true) > 0 && this.getBlockScrollProgress(block) < 100);
            else
                return false;
        },
        addZeroes: function (number, length) {
            var result = '' + number;
            while (result.length < length)
                result = '0' + result;
            return result;
        },
        fixedPlaceholder: function () {
            jQuery('.b-fixed').each(function () {
                var content = jQuery(this).find('.b-fixed-content');
                jQuery(this).css('height', content.height() + 'px');
            });
        },
        portfolioFixUp: function () {
            var arrow = jQuery('.b-portfolio-up');
            var firstItem = jQuery('.b-portfolio-item-image:visible').first();
            if (firstItem.length) {
                arrow.css('top', firstItem.height() + 60 + 'px');
            }
        }
    }
};

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
			jQuery(.functions.cookieSet('cached', '1');
		}
	}
};

jQuery(document).ready(function() {
	if (preloader.enabled && typeof jQuery(.functions.cookieGet('cached') === 'undefined') {
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
