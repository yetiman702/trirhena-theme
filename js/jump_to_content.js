(function ($){
	$( document ).ready(function(){
		$( ".current_page_item a" ).click(function(e){
			$( "html, body" ).animate({scrollTop: $( "#site-navigation").position().top});
			e.preventDefault();
		})
	})
}(jQuery));