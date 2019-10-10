
// Other scripts
        wow = new WOW({mobile: false});
        wow.init();
        jQuery('.extended-parallax').paroller();
// Other scripts

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

jQuery('form input, form textarea').focus(function() {
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





