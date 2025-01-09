<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register work post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_work_post_type() {

        $labels = array(
            'name'               => _x('Works', 'tt-pl-textdomain'),
            'singular_name'      => _x('Work', 'tt-pl-textdomain'),
            'menu_name'          => __('Works', 'tt-pl-textdomain'),
            'parent_item_colon'  => __('Parent Work:', 'tt-pl-textdomain'),
            'all_items'          => __('All Work', 'tt-pl-textdomain'),
            'view_item'          => __('View Work', 'tt-pl-textdomain'),
            'add_new_item'       => __('Add New Work', 'tt-pl-textdomain'),
            'add_new'            => __('Add New', 'tt-pl-textdomain'),
            'edit_item'          => __('Edit Work', 'tt-pl-textdomain'),
            'update_item'        => __('Update Work', 'tt-pl-textdomain'),
            'search_items'       => __('Search Work', 'tt-pl-textdomain'),
            'not_found'          => __('No Work found', 'tt-pl-textdomain'),
            'not_found_in_trash' => __('No Work found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => __('Work', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array('tt-work-cat'),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-schedule',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'work' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-work', $args);
    }

    add_action('init', 'tt_work_post_type');



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register taxonomy for work 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_register_taxonomy_work_cat() {

        $labels = array(
            'name'                          => _x( 'Category', 'tt-pl-textdomain' ),
            'singular_name'                 => _x( 'Category', 'tt-pl-textdomain' ),
            'search_items'                  => _x( 'Search Category', 'tt-pl-textdomain' ),
            'popular_items'                 => _x( 'Popular Category', 'tt-pl-textdomain' ),
            'all_items'                     => _x( 'All Categories', 'tt-pl-textdomain' ),
            'parent_item'                   => _x( 'Parent Category', 'tt-pl-textdomain' ),
            'parent_item_colon'             => _x( 'Parent Category:', 'tt-pl-textdomain' ),
            'edit_item'                     => _x( 'Edit Category', 'tt-pl-textdomain' ),
            'update_item'                   => _x( 'Update Category', 'tt-pl-textdomain' ),
            'add_new_item'                  => _x( 'Add New Category', 'tt-pl-textdomain' ),
            'new_item_name'                 => _x( 'New Category', 'tt-pl-textdomain' ),
            'separate_items_with_commas'    => _x( 'Separate categories with commas', 'tt-pl-textdomain' ),
            'add_or_remove_items'           => _x( 'Add or remove categories', 'tt-pl-textdomain' ),
            'choose_from_most_used'         => _x( 'Choose from most used categories', 'tt-pl-textdomain' ),
            'menu_name'                     => _x( 'Categories', 'tt-pl-textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_tagcloud'     => false,
            'show_admin_column' => true,
            'hierarchical'      => true,
            'rewrite'           => array( 'slug' => 'work-category' ),
            'query_var'         => true
        );

        register_taxonomy( 'tt-work-cat', array('tt-work'), $args );
    }

    add_action( 'init', 'tt_register_taxonomy_work_cat' );



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register service post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_service_post_type() {

        $labels = array(
            'name'               => _x('Service', 'tt-pl-textdomain'),
            'singular_name'      => _x('Service', 'tt-pl-textdomain'),
            'menu_name'          => __('Services', 'tt-pl-textdomain'),
            'parent_item_colon'  => __('Parent Service:', 'tt-pl-textdomain'),
            'all_items'          => __('All Service', 'tt-pl-textdomain'),
            'view_item'          => __('View Service', 'tt-pl-textdomain'),
            'add_new_item'       => __('Add New Service', 'tt-pl-textdomain'),
            'add_new'            => __('Add New', 'tt-pl-textdomain'),
            'edit_item'          => __('Edit Service', 'tt-pl-textdomain'),
            'update_item'        => __('Update Service', 'tt-pl-textdomain'),
            'search_items'       => __('Search Service', 'tt-pl-textdomain'),
            'not_found'          => __('No Service found', 'tt-pl-textdomain'),
            'not_found_in_trash' => __('No Service found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => __('Service', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'excerpt'),
            'taxonomies'          => array(),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-lightbulb',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'service' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-service', $args);
    }

    add_action('init', 'tt_service_post_type');