<?php 

function tt_import_files() {
    return array(
        array(
            'import_file_name'           => 'multipage',
            'categories'                 => array( 'Multipage'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/multipage/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/multipage/theme-options.json',
                    'option_name' => 'creptaam_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/default.jpg'
        ),

        array(
            'import_file_name'           => 'ico-landing',
            'categories'                 => array( 'Landing'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/onepage/ico-landing/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/onepage/ico-landing/theme-options.json',
                    'option_name' => 'creptaam_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/ico-landing.jpg'
        ),

        array(
            'import_file_name'           => 'ico-landing-creative',
            'categories'                 => array( 'Landing'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/onepage/ico-landing-creative/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/onepage/ico-landing-creative/theme-options.json',
                    'option_name' => 'creptaam_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/ico-landing-creative.jpg'
        ),

        array(
            'import_file_name'           => 'ico-landing-dark',
            'categories'                 => array( 'Landing'),
            'import_file_url'            => TT_PLUGIN_URL.'inc/demo-data/onepage/ico-landing-dark/contents.xml',
            'import_widget_file_url'     => TT_PLUGIN_URL.'inc/demo-data/multipage/widgets-data.wie',
            'import_redux'               => array(
                array(
                    'file_url'    => TT_PLUGIN_URL.'inc/demo-data/onepage/ico-landing-dark/theme-options.json',
                    'option_name' => 'creptaam_theme_option',
                )
            ),
            'import_preview_image_url'   => TT_PLUGIN_URL. 'images/ico-landing-dark.jpg'
        )
    );
}
add_filter( 'pt-ocdi/import_files', 'tt_import_files' );


// set primary menu front page and blog page
function tt_after_import( $selected_import ) {
    if ('multipage' === $selected_import['import_file_name']) {
        //Set Menu
        $primary_menu = get_term_by('name', 'Main Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array(
              'primary' => $primary_menu->term_id
            ) 
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );
        $blog_page_id  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

    } elseif ( 'ico-landing' === $selected_import['import_file_name'] ) {

        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array(
              'primary' => $primary_menu->term_id
            ) 
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'ICO Landing' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'ico-landing-creative' === $selected_import['import_file_name'] ) {

        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array(
              'primary' => $primary_menu->term_id
            ) 
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

    } elseif ( 'ico-landing-dark' === $selected_import['import_file_name'] ) {

        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array(
              'primary' => $primary_menu->term_id
            ) 
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'ICO Landing Dark' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
    }
}

add_action( 'pt-ocdi/after_import', 'tt_after_import' );


// disable notice
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


function tt_plugin_intro_text( $default_text ) {
    $default_text .= '<div class="ocdi__intro-notice  notice  notice-warning"><p><strong>Before install the demo you need to increase those limits to a minimum as follows:</strong><br>
	<code>max_execution_time=300, max_input_time=600, max_input_vars=5000, memory_limit=256M, post_max_size=48M, upload_max_filesize=48M.</code><br><span>You can verify your PHP configuration limits by installing a simple plugin found <a href="http://wordpress.org/extend/plugins/wordpress-php-info/" target="_blank">here</a>. In addition, you can always contact your host and ask them what the current settings are and have them adjust them if needed</span></p></div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'tt_plugin_intro_text' );