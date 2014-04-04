(function ($){
	$( document ).ready(function(){
		$( ".current_page_item a" ).click(function(e){
			var target = ($( "#site-navigation").css("position") == "absolute") ? 
							$( "#site-navigation").position().top : 
							$( "#site-branding").position().top + $( "#site-branding").outerHeight(); 
			$( "html, body" ).animate({scrollTop: target});
			e.preventDefault();
		})
	})
}(jQuery));