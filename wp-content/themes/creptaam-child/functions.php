<?php if (! defined('ABSPATH')) :
	exit; // Exit if accessed directly
endif;

function creptaam_childtheme_scripts(){
	$parent_style = 'creptaam-parent-style'; // This is creptaam parent theme style.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    
    wp_enqueue_style( 'creptaam-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'creptaam_childtheme_scripts', 98);