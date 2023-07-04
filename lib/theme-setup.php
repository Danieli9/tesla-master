<?php

//-----------------------------------------------------
// Theme and Post Support
//-----------------------------------------------------

function tesla_enable_theme_support() {

	// Add theme support for html5 markup
	$args = array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	);
	add_theme_support( 'html5', $args );

	// Add theme support for the title tag
	add_theme_support( 'title-tag' );

	// Add theme support for post thumbnails
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'tesla_enable_theme_support' );


function tesla_register_custom_nav_menus() {
	register_nav_menus(
		array(
			'tesla-master' => 'Primary',
		)
	);
}
add_action( 'after_setup_theme', 'tesla_register_custom_nav_menus' );

//-----------------------------------------------------
// Enqueue scripts and styles
//-----------------------------------------------------

function tesla_scripts() {
	wp_enqueue_style( 'tesla', get_template_directory_uri() . '/assets/css/theme.min.css', '', '1.3.10' );
	wp_enqueue_script( 'tesla', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), '1.3.10', false );

}

add_action( 'wp_enqueue_scripts', 'tesla_scripts' );


//-----------------------------------------------------
// Configure required plugins
//-----------------------------------------------------

require_once get_template_directory() . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'tesla_register_required_plugins' );

function tesla_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'CMB2',
			'slug'      => 'cmb2',
			'required'  => true,
		),

	);

	$config = array(
		'id'           => 'method',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

#-- ACF JSON Save
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf-json';

    // return
    return $path;

}

#-- ACF JSON Load
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {

    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';

    // return
    return $paths;

}

#-- Block Categories
function block_categories( $categories, $post ) {
	return array_merge(
		array(
			array(
				'slug' => 'tesla-theme-blocks',
				'title' => 'Tesla Theme Blocks',
				'icon'  => 'wordpress',
			),
		),
		$categories
	);
}
add_filter( 'block_categories', 'block_categories', 10, 2 );

// Add Option Page for ACF
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));
}

// Add subpage "Header Settings" to Option Page
if( function_exists('acf_add_options_sub_page') ) {
    acf_add_options_sub_page(array(
        'page_title'    => 'Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-options',
    ));
}

// Add subpage "Theme Settings" to Option Page
if( function_exists('acf_add_options_sub_page') ) {
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme',
        'parent_slug'   => 'theme-options',
    ));
}

// Add subpage "Footer Settings" to Option Page
if( function_exists('acf_add_options_sub_page') ) {
    acf_add_options_sub_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-options',
    ));
}
