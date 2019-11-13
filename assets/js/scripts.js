
// Other scripts
        wow = new WOW({mobile: false});
        wow.init();
        jQuery('.extended-parallax').paroller();
// Other scripts

// Preloader


var deluxart = {
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
        }
    }
};


(function () {
    var preloader = jQuery('.b-preloader');
    if (preloader.length) {
        deluxart.functions.cookieSet('back', location.origin + location.pathname);
    }
    else {
        var back = deluxart.functions.cookieGet('back');
        // deleted code < --- >
    }
})();
// End Preloader

// Scroll Magic
jQuery('.title').each(function(){
        var controller = new ScrollMagic.Controller();
        new ScrollMagic.Scene({
            triggerElement: this,
            duration: 650,
        })
            .setClassToggle(this,'active')
            .addTo(controller);
});
// End- Scroll Magic

// Add fixed class for header
jQuery(function(){
    jQuery(window).scroll(function() {
        var topHead = jQuery(document).scrollTop();
        if (topHead > 80) {
            jQuery('header').addClass('header-fixed');
        } else {
            jQuery('header').removeClass('header-fixed');
        }
    });
});
jQuery(window).load(function(){
     if (jQuery(document).scrollTop() > 80) {
         jQuery('header').addClass('header-fixed');
     }
});
// End - Add fixed class for header

// Personal dArt menu by delux
jQuery(document).ready(function(){
	jQuery('#nav-icon').click(function(e){
		jQuery(this).toggleClass('open');
		jQuery('body').toggleClass('dart-menu-open');
		jQuery('.dart-menu').fadeToggle(100).toggleClass('active');
        jQuery('ul.wow-links > li').addClass('animated');
        // jQuery("ul.wow-links > li").attr("style","visibility: visible; animation-name: bounceInLeft;");
        jQuery("ul.wow-links > li").css({'visibility' : 'visible', 'animation-name':'bounceInLeft'});

		e.preventDefault();
	});
});
// End - Personal dArt menu by delux

jQuery('form input.i-effect, form textarea.i-effect').focus(function() {
      jQuery(this).closest('div').addClass('input-effect');
}).
blur(function() {
    jQuery(this).closest('div').removeClass('input-effect');
});

jQuery('input[type=submit].dart-btn').click(function (event) {
    jQuery('.wpcf7').removeClass('input-effect');
});

jQuery(".wpcf7-form-control-wrap").click(function () {
    jQuery(this).children(".wpcf7-not-valid-tip").fadeOut('slow');
});

// Script for DART-menu
jQuery('.dart-menu .container .content nav ul li a[href^="#"]').click(function(event) {
    var sc = jQuery(this).attr("href"),
        dn = jQuery(sc).offset().top;
    jQuery('html, body').animate({scrollTop: dn - 80}, 1000);
        jQuery('#nav-icon').toggleClass('open');
        jQuery('body').toggleClass('dart-menu-open');
        jQuery('.dart-menu').fadeOut(100).removeClass('active');
        e.preventDefault();
});
// Script for DART-menu

jQuery('.phone-btn.call-back').click(function(e) {
    jQuery('.fullscreen-modal').addClass('active');
    jQuery('body').addClass('full-modal');
    e.preventDefault();
});

jQuery('.fullscreen-modal .close').click(function(event) {
    jQuery('.fullscreen-modal').removeClass('active');
    jQuery('body').removeClass('full-modal');
});


// wgl Extended Parallax
function extended_parallax() {
    var item = jQuery('.extended-parallax');
    if (item.length !== 0 ) {
        item.each( function() {
            jQuery(this).paroller();
        });
    }
}



jQuery('.portfolio > div:nth-child(1)').attr('data-wow-delay', '0.2s');
jQuery('.portfolio > div:nth-child(2)').attr('data-wow-delay', '0.3s');
jQuery('.portfolio > div:nth-child(3)').attr('data-wow-delay', '0.4s');
jQuery('.portfolio > div:nth-child(4)').attr('data-wow-delay', '0.5s');
jQuery('.portfolio > div:nth-child(5)').attr('data-wow-delay', '0.6s');
jQuery('.portfolio > div:nth-child(6)').attr('data-wow-delay', '0.7s');



jQuery(document).ready(function () {
    jQuery("a.dart-btn.call-back").click(function () {
        elementClick = jQuery(this).attr("href")
        destination = jQuery(elementClick).offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination - 100 }, 1100);
        return false;
    });
});



