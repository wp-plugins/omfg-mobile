<?php
/*-------------------------------------------------------------------------
Sets Up Admin jQuery
-------------------------------------------------------------------------*/

function omfg_mobile_pro_theme_select_script() {
	
	global $post, $wp_query, $wpdb, $current_screen;

	$post_id 	= $wp_query->post->ID;
	$post_type 	= get_post_type_object( get_post_type($post_id) );
	
	$post_type = get_post_type_object(get_post_type($post));
	
	// Adds Admin jQuery to OMFG Mobile Pro post type, and ALL Post Types with the OMFG Mobile Pro icon	
	if( ($current_screen->post_type == 'omfg-mobile-pro') || ( $post_type->menu_icon == OMFGMOBILEPRO . '/images/omfgwp-posttypes-icon.png' )  ) {

		wp_register_script('omfg-mobile-pro-admin', OMFGMOBILEPRO . 'js/omfg-mobile-pro-admin.js', 'jquery');
		wp_enqueue_script('omfg-mobile-pro-admin');

	}
}

add_action('admin_print_scripts', 'omfg_mobile_pro_theme_select_script',1);

/*-------------------------------------------------------------------------
Sets Up Groove Theme Admin jQuery
-------------------------------------------------------------------------*/

function omfg_mobile_pro_groovetheme_admin_script() {

	$posttypes = get_post_types( array( 'description' => 'OMFG Mobile Site - Omfg Mobile Groove Theme' ) );
    
    foreach ( $posttypes as $posttype ) {
    
		wp_register_script('omfg-mobile-pro-groove-admin', OMFGMOBILEPRO . 'includes/template/groove-theme/js/admin.js', 'jquery');
		wp_enqueue_script('omfg-mobile-pro-groove-admin');   
    
    }

}
    
add_action('admin_print_scripts', 'omfg_mobile_pro_groovetheme_admin_script');

/*-------------------------------------------------------------------------
Get Current Post Type In Admin Pages
-------------------------------------------------------------------------*/

function get_current_post_type() {
  global $post, $typenow, $current_screen;

  //we have a post so we can just get the post type from that
  if ( $post && $post->post_type )
    return $post->post_type;
    
  //check the global $typenow - set in admin.php
  elseif( $typenow )
    return $typenow;
    
  //check the global $current_screen object - set in sceen.php
  elseif( $current_screen && $current_screen->post_type )
    return $current_screen->post_type;
  
  //lastly check the post_type querystring
  elseif( isset( $_REQUEST['post_type'] ) )
    return sanitize_key( $_REQUEST['post_type'] );

  //we do not know the post type!
  return null;
} 

/*-------------------------------------------------------------------------
Registers OMFG Theme Taxonomy
-------------------------------------------------------------------------*/

add_action( 'init', 'register_taxonomy_omfg_mobile_pro_themes' );
add_action( 'init', 'register_taxonomy_omfg_mobile_pro_sites' );

function register_taxonomy_omfg_mobile_pro_themes() {
	
	// CREATES THE OMFG MOBILE PRO THEMES TAXONOMY 
	// USED TO CONNECT A SITE WITH A SELECTED THEME
	// ============================================ -->
    $labels = array( 
        'name' => _x( 'OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
        'singular_name' => _x( 'OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'search_items' => _x( 'Search OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
        'popular_items' => _x( 'Popular OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
        'all_items' => _x( 'All OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
        'parent_item' => _x( 'Parent OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'parent_item_colon' => _x( 'Parent OMFG Mobile Pro Page Theme:', 'omfg_mobile_pro_themes' ),
        'edit_item' => _x( 'Edit OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'update_item' => _x( 'Update OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'add_new_item' => _x( 'Add New OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'new_item_name' => _x( 'New OMFG Mobile Pro Page Theme Name', 'omfg_mobile_pro_themes' ),
        'separate_items_with_commas' => _x( 'Separate omfg mobile pro page themes with commas', 'omfg_mobile_pro_themes' ),
        'add_or_remove_items' => _x( 'Add or remove omfg mobile pro page themes', 'omfg_mobile_pro_themes' ),
        'choose_from_most_used' => _x( 'Choose from the most used omfg mobile pro page themes', 'omfg_mobile_pro_themes' ),
        'menu_name' => _x( 'OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,
        'rewrite' => false,
        'query_var' => true
    );
	
	register_taxonomy( 'omfg_mobile_pro_themes', /*array('omfg-mobile-pro'),*/ $args );

} 

function register_taxonomy_omfg_mobile_pro_sites() {
	
	// CREATES THE OMFG MOBILE PRO THEMES TAXONOMY 
	// USED TO CONNECT A SITE WITH A SELECTED THEME
	// ============================================ -->
    $labels = array( 
        'name' => _x( 'OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
        'singular_name' => _x( 'OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'search_items' => _x( 'Search OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
        'popular_items' => _x( 'Popular OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
        'all_items' => _x( 'All OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
        'parent_item' => _x( 'Parent OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'parent_item_colon' => _x( 'Parent OMFG Mobile Pro Page Site:', 'omfg_mobile_pro_sites' ),
        'edit_item' => _x( 'Edit OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'update_item' => _x( 'Update OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'add_new_item' => _x( 'Add New OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'new_item_name' => _x( 'New OMFG Mobile Pro Page Site Name', 'omfg_mobile_pro_sites' ),
        'separate_items_with_commas' => _x( 'Separate omfg mobile pro page sites with commas', 'omfg_mobile_pro_sites' ),
        'add_or_remove_items' => _x( 'Add or remove omfg mobile pro page sites', 'omfg_mobile_pro_sites' ),
        'choose_from_most_used' => _x( 'Choose from the most used omfg mobile pro page sites', 'omfg_mobile_pro_sites' ),
        'menu_name' => _x( 'OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,
        'rewrite' => false,
        'query_var' => true
    );

    register_taxonomy( 'omfg_mobile_pro_sites', /*array('omfg-mobile-pro'),*/ $args );
}

/*-------------------------------------------------------------------------
REGISTERS OMFG MOBILE THEME TAXONOMY ON ACTIVATION
-------------------------------------------------------------------------*/

// GROOVE THEME
// ============================ -->
function omfg_mobile_groove_add_theme_taxonomy() {

	wp_insert_term(
  		'Groove Theme', 				// the term
   		'omfg_mobile_pro_themes', 		// the taxonomy
  		array(
    		'description' => 'Groove Theme for the OMFG Mobile Landing Page Plugin.',
    		'slug' => 'omfg-mobile-groove-theme'
  		)
	);

}

add_action('init','omfg_mobile_groove_add_theme_taxonomy');

/*-------------------------------------------------------------------------
Sets Up Action Hooks
-------------------------------------------------------------------------*/

// Header
function omfg_mobile_pro_header() {
	do_action('omfg_mobile_pro_header');
}

// Styles
function omfg_mobile_pro_styles() {
	do_action('omfg_mobile_pro_styles');
}

// JS
function omfg_mobile_pro_js() {
	do_action('omfg_mobile_pro_js');
}

// Pre Content
function omfg_mobile_pro_pre_content() {
	do_action('omfg_mobile_pro_pre_content');
}

// Page Content
function omfg_mobile_pro_page_content() {
	do_action('omfg_mobile_pro_page_content');
}

// Post Content
function omfg_mobile_pro_post_content() {
	do_action('omfg_mobile_pro_post_content');
}

// Footer
function omfg_mobile_pro_footer() {
	do_action('omfg_mobile_pro_footer');
}

// Create Site Post Types
function omfg_mobile_pro_create_site_posttypes() {
	do_action('omfg_mobile_pro_create_site_posttypes');
}

/*-------------------------------------------------------------------------
Sets Up The Page Content
-------------------------------------------------------------------------*/

function omfg_mobile_pro_pagecontent () {

	global $post, $wp_query;
	
	// Post ID
	$postid = $wp_query->post->ID;
	$page_content = get_post_meta($postid, '_omfg_page_content', true);
	$page_content = do_shortcode($page_content);
	$page_content = wpautop($page_content, 1);
	
	echo $page_content;

}

add_action('omfg_mobile_pro_page_content','omfg_mobile_pro_pagecontent');

/*-------------------------------------------------------------------------
FUNCTION TO GET THE OMFG MOBILE THEME TAXONOMY ID
-------------------------------------------------------------------------*/

function get_omfg_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'omfg_mobile_pro_themes');
	return $term->term_id;
}

/*-------------------------------------------------------------------------
FUNCTION TO LIMIT THE TITLE OF OMFG MOBILE PRO POSTS (20 Character Max)
-------------------------------------------------------------------------*/

function omfg_mobile_pro_max_title_length($title){

    global $post;

    $title = $post->post_title;

    if (strlen($title) > 15 ) //set this to the maximum number of words
        wp_die( __('Error: your post title is over the 15 character limit for OMFG Mobile sites.') );

}

add_action('publish_omfg-mobile-pro', 'omfg_mobile_pro_max_title_length');
add_action('new_to_publish_omfg-mobile-pro', 'omfg_mobile_pro_max_title_length');		
add_action('draft_to_publish_omfg-mobile-pro', 'omfg_mobile_pro_max_title_length');		
add_action('pending_to_publish_omfg-mobile-pro', 'omfg_mobile_pro_max_title_length');

/*-------------------------------------------------------------------------
OMFG Mobile Menu
-------------------------------------------------------------------------*/

function omfg_mobile_pro_menu() {

	global $post, $wpdb, $wp_query, $omfgmobilepro_pluginroot;
	
	// Plugin Root & Site Root
	$pluginroot = plugin_dir_url(__FILE__);
	$plugin_dir_root = get_bloginfo('url');
	
	// Post ID
	$postid = $wp_query->post->ID;
	
	// Post Type
	$posttype = get_post_type($postid);
	
	// Post type without first 5 characters (omfg-)
	$posttype = substr($posttype, 5);
	
	$the_permalink = get_permalink($postid);
	
	// THEME VARIABLES
	// ======================================== -->
	// Get Theme Settings
	query_posts( "post_type=omfg-mobile-pro&posts_per_page=1&name=".$posttype."" );
	while ( have_posts() ) : the_post();
		
		global $post; 
		
		$count = 0;
		$omfg_menu = get_post_meta($post->ID, '_omfg_menu', true);
		
		foreach($omfg_menu as $key => $item) {
									 
			$title 	= get_the_title($item);
			$link 	= get_permalink($item);
			
			if ($postid == $item) { $current = ' current-page'; } else { }
										
			$output .= '<li id="list_items_' . $item . '" class="list_item menuitem'.$current.'">';
				$output .= '<a href="'.$link.'">'. $title .'</a>';
				//$output .= '' . $postid . '';
			$output .= '</li>';
			$count++;
									
		}

	// END THEME VARIABLES
	// ======================================== -->
	endwhile; 			// End Query
	wp_reset_query(); 	// Reset Query
	
	echo '<div class="omfg-menu">'.$output.'</div>';

}