<?php 

/*-----------------------------------------------------------------------*/
/* ADDS STYLES AND JS TO THE PAGE HEADER
/*-----------------------------------------------------------------------*/

function omfg_mobile_pro_groove_theme_shortcode_styles() {

	global $post, $omfgmobilepro_pluginroot;
	
	$post_type = get_post_type_object( get_post_type($post) );
	
	if ($post_type->description == 'OMFG Mobile Site - Omfg Mobile Groove Theme') {

		echo '<link rel="stylesheet" href="'.$omfgmobilepro_pluginroot.'includes/template/groove-theme/groove-theme-shortcodes/shortcodes.css">';
	
	}

}

add_action('omfg_mobile_pro_styles','omfg_mobile_pro_groove_theme_shortcode_styles');

function omfg_mobile_pro_groove_theme_shortcode_js() {

	global $post, $omfgmobilepro_pluginroot;
	
	$post_type = get_post_type_object( get_post_type($post) );
	
	if ($post_type->description == 'OMFG Mobile Site - Omfg Mobile Groove Theme') {
	
		$output .= '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>';
		
		$output .= '<script type="text/javascript" src="'.$omfgmobilepro_pluginroot.'includes/template/groove-theme/groove-theme-shortcodes/shortcodes.js"></script>';
		
		echo $output;
	
	}

}

add_action('omfg_mobile_pro_js','omfg_mobile_pro_groove_theme_shortcode_js');

/*-----------------------------------------------------------------------*/
/* SETS UP THEME SHORTCODES
/*-----------------------------------------------------------------------*/
require_once('modules/modules-shortcode.php');
require_once('tweets/tweets-shortcode.php');
require_once('contact-form/contact-shortcode.php');
require_once('blog-list/blog-list-shortcode.php');