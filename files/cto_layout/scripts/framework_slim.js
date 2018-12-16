/* =============================================================================
 * Set viewport meta tag
 * ========================================================================== */
jQuery(document).ready(function() 
{
	if( jQuery('body').hasClass('mobile') )
	{
		jQuery('head').append('<meta name="viewport" content="width=device-width,initial-scale=1.0">');	
	}
});

/* =============================================================================
 * doubleTapToGo scripts/doubletaptogo/
 * ========================================================================== */
jQuery(document).ready(function(){
	if(jQuery('body').hasClass('android') || jQuery('body').hasClass('win') || jQuery('body').hasClass('ios')) {
		jQuery('nav.mainmenu li.submenu:not(.level_2 .megamenu)').doubleTapToGo();
	}
});

/* =============================================================================
 * megamenu
 * ========================================================================== */
jQuery(document).ready(function(){
	jQuery('li.megamenu .level_2').wrap('<div class="megamenu-wrapper"></div>');
	jQuery('li.megamenu.remove-link a.a-level_2').removeAttr("href");
});
	
function megamenuWidth() {
	var elWidth = jQuery("#header .inside").width();
	jQuery(".mainmenu ul .megamenu-wrapper").css('width', elWidth);
};
	
jQuery(window).on("resize", function(){ 
	megamenuWidth(); 
});

jQuery(document).ready(function(){ 
	megamenuWidth();
});

/* =============================================================================
 * mainmenu menuheader (deactivate link)
 * ========================================================================== */
jQuery(document).ready(function(){
	jQuery('.mainmenu .menuheader').removeAttr("href");
});

/* =============================================================================
 * ce_table responsive 
 * ========================================================================== */
function respTables() {
	jQuery('.ce_table').each(function() {
	 	var tableWidth = jQuery(this).find('table').width();
	 	var ce_tableWidth = jQuery(this).width();
	 	if (tableWidth > ce_tableWidth) {
		 	jQuery(this).addClass('overflow');
	 	} else {
		 	jQuery(this).removeClass('overflow');
	 	}
	});	
};

jQuery(document).ready(function(){
	respTables();
});

jQuery(window).on("resize", function(){ 
	respTables(); 
});

/* =============================================================================
 * css3 animation (css/animate.css)
 * ========================================================================== */
var el = jQuery("body");
var animationClasses = ["fadeIn", "flipInX", "flipInY", "fadeInDown","fadeInDownBig","fadeInLeft","fadeInLeftBig","fadeInRight","fadeInRightBig","fadeInUp","fadeInUpBig","rotateIn","zoomIn","slideInDown","slideInLeft","slideInRight","slideInUp","bounceIn","bounceInDown","bounceInLeft","bounceInRight","bounceInUp"];
jQuery.each(animationClasses, function(key, value){
	el.find("." + value).each(function(){
		jQuery(this).removeClass(value).attr("data-animate", value);
		
	});
});
	
jQuery(document).ready(function() {
	var animate_start = function(element) {
		element.find('.animate').each(function() {
			var item = jQuery(this);
		    var animation = item.data("animate");
		    if(jQuery('body').hasClass('ios') || jQuery('body').hasClass('android')) {
		    	item.removeClass('animate');
		    	return true;
		    	
		    } else {
			    
	            item.waypoint(function(direction) {
	    			item.removeClass('animate').addClass('animated '+animation).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
	    				item.removeClass(animation+' animated');
	    			});
	            },{offset: '70%',triggerOnce: true});
	        }
		});
	};
	
	setTimeout(function() {
		jQuery('.mod_article').each(function() {
	        animate_start( jQuery(this) );
	    });
	},500);
	
});


/* =============================================================================
 * scrollToTop
 * ========================================================================== */
jQuery(document).ready(function(){
	jQuery(".totop").click(function(){
    	jQuery("html, body").animate({
        	scrollTop: jQuery( jQuery.attr(this, "href") ).offset().top
		},380);
		return false;
	});
});

/* =============================================================================
 * smint / jquery.nav.js
 * ========================================================================== */
jQuery('.onepagenav').onePageNav({
    currentClass: 'active',
    changeHash: false,
    scrollSpeed: 350,
    scrollThreshold: 0.1,
    filter: '',
    easing: 'swing'
});

/* =============================================================================
 * mmenu // jquery.mmenu.min.all.js
 * ========================================================================== */
jQuery(document).ready(function(){
	jQuery("#mobnav").mmenu({extensions: ["theme-dark"]});
});

/* =============================================================================
 * module background-image workaround if content height > viewport-height
 * ========================================================================== */
function bgImageFullscreen() {
	jQuery(".ce_bgimage.fullscreen-image").each(function() {
		var viewportHeight = jQuery(window).height();
		var contentHeight = jQuery(this).find('.ce_bgimage-inside').height();
		if (contentHeight > viewportHeight) {
			jQuery(this).height('auto');
			jQuery(this).find('.ce_bgimage-inside').css('transform', 'translateY(0)');
			jQuery(this).find('.ce_bgimage-inside').css('-webkit-transform', 'translateY(0)');
		} else {
			jQuery(this).height('');
			jQuery(this).find('.ce_bgimage-inside').css('transform', 'translateY(-50%)');
			jQuery(this).find('.ce_bgimage-inside').css('-webkit-transform', 'translateY(-50%)');
		}
	});
};

jQuery(document).ready(function(){
	bgImageFullscreen();
});

jQuery(window).on("resize", function(){ 
	bgImageFullscreen(); 
});

/* =============================================================================
 * imagebox workaround if content height > fix height
 * ========================================================================== */
function imageboxHeight() {
	jQuery(".ce_text_imagebox").each(function() {
		var fixHeight = jQuery(this).height();
		var contentHeight = jQuery(this).find(".inside").outerHeight();
		if (contentHeight > fixHeight) {
			jQuery(this).addClass("oversize");
		} else {
			jQuery(this).removeClass("oversize");
		}
	});
};

jQuery(document).ready(function(){
	imageboxHeight();
});


/* =============================================================================
* parallax
* ========================================================================== */
jQuery(document).ready(function() {
	var parallax = jQuery(".ce_bgimage.parallax .ce_bgimage-image");
	if(parallax == undefined || parallax.length < 1) {
		return false;
	}
	jQuery(".ce_bgimage.parallax .ce_bgimage-image").attr('data-stellar-background-ratio', '0.1');
	jQuery(".ce_bgimage.parallax .ce_bgimage-image").attr('data-stellar-offset-parent', 'true');

	jQuery(".ce_text_imagebox.parallax .ce_text_imagebox_image").attr('data-stellar-background-ratio', '0.1');
	jQuery(".ce_text_imagebox.parallax .ce_text_imagebox_image").attr('data-stellar-offset-parent', 'true');

	setTimeout(function() {
		jQuery(window).stellar({
			horizontalScrolling: false,
			responsive:true
	});
	},500);
});