(function ($){
	$( window ).unload(function(){
		scroll = $( "html, body" ).filter(function(i){return $(this).scrollTop();}).scrollTop();
		if(scroll){
			storage.set("scrollTop", scroll);
		}
		else{
			storage.set("scrollTop", 0);
		}
	})
}(jQuery));