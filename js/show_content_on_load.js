(function ($){
	$( document ).ready(function(){
		if(storage.get("scrollTop") && parseInt(storage.get("scrollTop")) < $( "#site-navigation").position().top){
			$( "html, body" ).scrollTop(parseInt(storage.get("scrollTop")));
			$( ".current_page_item a" ).click();
		}
		else{
			$( "html, body" ).scrollTop($( "#site-navigation").position().top);
		}
	})
}(jQuery));