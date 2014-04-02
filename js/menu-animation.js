(function ($) {
	var padding_anim_range = 150; // range of the nav-menu's padding animation in px

	$( window ).scroll(function() {
		var scroll_offset = $( window ).scrollTop();
		var nav_menu = $( "#site-navigation" );
		var branding = $( "#site-branding" );
		if(nav_menu.css("position") == "absolute" && scroll_offset > nav_menu.offset().top){
			nav_menu.css({"position": "fixed", "top": "0px"});
		}
		else if(nav_menu.css("position") == "fixed" && scroll_offset < branding.offset().top + branding.outerHeight()){
			nav_menu.css({"position": "absolute", "top": ""});
		}
		if(branding.css("position") == "fixed" && scroll_offset > nav_menu.offset().top - branding.outerHeight()){
			branding.css({"position": "absolute", "bottom": nav_menu.outerHeight() + "px"});
		}
		else if(branding.css("position") == "absolute" && scroll_offset < branding.offset().top) {
			branding.css({"position": "fixed", "bottom": ""});
		}
		if(scroll_offset < nav_menu.offset().top - padding_anim_range) {
			nav_menu.css("padding-left", 0);
		}
		else if(scroll_offset > nav_menu.offset().top){
			nav_menu.css("padding-left", parseInt($( "#site-branding" ).css("padding-left")));
		}
		else{
			var factor = (scroll_offset - nav_menu.offset().top + padding_anim_range) / padding_anim_range;
			nav_menu.css("padding-left", factor * parseInt($( "#site-branding" ).css("padding-left")));
		}
	});
}(jQuery));
