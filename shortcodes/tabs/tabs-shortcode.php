<?php

/*
Tabs
============================*/

function vz_tab_group( $atts, $content ){
	
	$GLOBALS['tab_count'] = 0;

	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
	
		foreach( $GLOBALS['tabs'] as $tab ){
			
			// Converts Tab Title into Lowercase with No Spaces
			$tabtitle = $tab['title'];
			$tabtitle = $pagelink = str_replace(" ","_",$tabtitle);
			$tabtitle = strtolower($tabtitle);
		
			$tabs[] = '<li><a class="" href="#'.$tabtitle.'">'.$tab['title'].'</a></li>';
			$panes[] = '<div id="'.$tabtitle.'">'.do_shortcode($tab['content']).'</div>';
		
		}
		
		$return = '<div class="tabcontainer"><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'.implode( "\n", $panes ).'</div>'	;
	}
	
	return $return;
}

add_shortcode( 'omfg_tabgroup', 'vz_tab_group' );


function vz_tab( $atts, $content ){
	
	extract(shortcode_atts(array(
		'title' => 'Tab %d'
	), $atts));	

	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

	$GLOBALS['tab_count']++;
}

add_shortcode( 'omfg_tab', 'vz_tab' );