/* =============================================================================
 * revolution slider scroll to content
 * ========================================================================== */
 
jQuery("#linkToContent").click(function(){
	jQuery("html, body").animate({
    	scrollTop: jQuery( jQuery.attr(this, "href") ).offset().top -160
	}, 500);
	return false;
});

/* =============================================================================
 * megamenu
 * ========================================================================== */
	
function megamenuWidth() {
	var elWidth = jQuery(window).width() - 300;
	jQuery(".mainmenu ul .megamenu-wrapper").css('width', elWidth);
};