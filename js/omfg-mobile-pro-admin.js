jQuery(document).ready(function($){
	
	/* ------------------------------------------------------------------------- */
	/* Initialize jQuery Tabs
	/* ------------------------------------------------------------------------- */
	if ( $('.tabs').length ) {
		
		$(".tabs").tabs();
	
	}
	
	/* ------------------------------------------------------------------------- */ 
	/* SETS UP THE SHOW-HIDE FEATURE
	/* ------------------------------------------------------------------------- */ 
		
	$('#omfg-mobile-groove-theme-options').hide();
	$('#' + $('#_omfg_theme_select').val() + '-options').show();
	
	$('#_omfg_theme_select').change(function(){
	
		$('#omfg-mobile-groove-theme-options').hide();
		$('#' + $('#_omfg_theme_select').val() + '-options').show();
	
	});
	
	/* ------------------------------------------------------------------------- */
	/* Validate Title Field (Not REAL Validation, but a visual warning)
	/* ------------------------------------------------------------------------- */
	
	$('#title').change(function(){
	
		var value = $('#title').val();
		if ( value.length > 15 ) {
    	
    		$('#title').css('border', '1px solid #cc3333');
    		$('#title').css('color', '#cc3333');
    		$('#title').css('background', '#fffccc');
    		$('#titlewrap').prepend('<p class="errornotice">OMFG Mobile Site Titles Must be Less than 15 Characters</p>');
    	
    	} else {
    	
    		$('#title').css('border', '1px solid #cccccc');
    		$('#title').css('color', '#666');
    		$('#title').css('background', '#fff');
    		$('.errornotice').html('');
    	
    	}
	
	}); 	
		
}); // END JQUERY READY FUNCTION