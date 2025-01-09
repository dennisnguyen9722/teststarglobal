<?php
/*
Plugin Name: TrendyTheme Core
Plugin URI: https://trendytheme.net
Description: TrendyTheme Core Plugin for creptaam
Author: TrendyTheme
Version: 1.1
Author URI: https://trendytheme.net
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

// Defining Constance
define( 'TT_PLUGIN_URL', plugin_dir_url(__FILE__) );
define( 'TT_PLUGIN_DIR', dirname(__FILE__));
define( 'TT_PLUGIN_PATH', dirname( plugin_basename(__FILE__) ) );


// Loading TextDomain
function tt_plugin_init() {
	load_plugin_textdomain( 'tt-pl-textdomain', false, TT_PLUGIN_PATH . '/languages/' );
}
add_action( 'plugins_loaded', 'tt_plugin_init' );



// Loading Admin Scripts, Stylesheets
function tt_wp_admin_scripts() {
	// Fontawesome icon
	wp_enqueue_style( 'font-awesome', TT_PLUGIN_URL . 'css/font-awesome.min.css' );
	// Select 2 CSS
	wp_enqueue_style( 'select2', TT_PLUGIN_URL . 'css/select2.min.css' );
	// Custom CSS
	wp_enqueue_style( 'tt-admin-style', TT_PLUGIN_URL . 'css/admin-style.css' );
	
	// Custom Script
	wp_enqueue_script( 'tt-post-formate', TT_PLUGIN_URL . 'js/posts-meta.js' );
	// Select 2 JS
	wp_enqueue_script( 'select2', TT_PLUGIN_URL . 'js/select2.min.js' );
	// Scripts
	wp_enqueue_script( 'tt-scripts-js', TT_PLUGIN_URL . 'js/scripts.js' );
}
add_action( 'admin_enqueue_scripts', 'tt_wp_admin_scripts' );


// Custom styles
function tt_custom_style() {
	wp_enqueue_style('bootstrap', TT_PLUGIN_URL . 'css/bootstrap.min.css', array(), NULL);
	wp_enqueue_style('tt-style', TT_PLUGIN_URL . 'css/style.css', array(), NULL);
	wp_register_style('creptaam-coin-icon', TT_PLUGIN_URL . 'css/coin-icon.css', array(), NULL);

	if (class_exists('ReduxFrameworkPlugin')) :
	    wp_enqueue_style('tt-custom-style', TT_PLUGIN_URL . 'inc/custom-style.php', array(), NULL);
	endif;

    wp_register_script( 'tt-parallax-enllax', TT_PLUGIN_URL . 'vc-parallax-addons/js/jquery.enllax.min.js', array('jquery'), NULL, true );
    wp_register_script( 'tt-parallax-scripts', TT_PLUGIN_URL . 'vc-parallax-addons/js/scripts.js', array('jquery'), NULL, true );

	wp_enqueue_script('webticker', TT_PLUGIN_URL . 'js/jquery.webticker.min.js', array('jquery'), NULL, TRUE);

	wp_register_script('highstock', TT_PLUGIN_URL . 'js/highstock.js', array('jquery'), NULL, TRUE);
	wp_register_script('tt-creptaam-price-chart', TT_PLUGIN_URL . 'js/creptaam-price-chart.js', array('jquery'), NULL, TRUE);
	wp_register_script('tt-creptaam-calculator', TT_PLUGIN_URL . 'js/creptaam-calculator.js', array('jquery'), NULL, TRUE);
	wp_enqueue_script('tt-front-scripts', TT_PLUGIN_URL . 'js/front-scripts.js', array('jquery'), NULL, TRUE);
}
add_action('wp_enqueue_scripts', 'tt_custom_style', 99);


// hide vc admin notic
function tt_hide_vc_admin_notice() {
    if(is_admin()) :
        setcookie('vchideactivationmsg', '1', strtotime('+3 years'), '/');
        setcookie('vchideactivationmsg_vc11', (defined('WPB_VC_VERSION') ? WPB_VC_VERSION : '1'), strtotime('+3 years'), '/');
    endif;
}
add_action('admin_init', 'tt_hide_vc_admin_notice');


// template tags
require_once TT_PLUGIN_DIR . "/inc/template-tags.php";
// Custom post type
require_once TT_PLUGIN_DIR . "/inc/post-types/post-types.php";
// comment widget
require_once TT_PLUGIN_DIR . "/inc/widgets/comments-widget.php";
// latest post widget
require_once TT_PLUGIN_DIR . "/inc/widgets/latest-posts.php";
// Mega Menu
require_once TT_PLUGIN_DIR . "/inc/mega-menu/admin-megamenu-walker.php";
// Fonts
require_once TT_PLUGIN_DIR . "/inc/fonts/font-awesome-icons.php";
// Google map API key
require_once TT_PLUGIN_DIR . "/inc/api-key-for-google-maps.php";
// inport process file
require_once TT_PLUGIN_DIR . "/inc/demo-import.php";


// Parallax addons file
if (class_exists('Vc_Manager')) {
    function tt_parallax_addons_include(){
        include_once( TT_PLUGIN_DIR . '/vc-parallax-addons/tt-parallax-addons.php' );
    }
    add_action('init', 'tt_parallax_addons_include');
}

// Currency lists for narrow data
function creptaam_currency_list(){

    $creptaam_currencies = array(
        esc_html__('BTC', 'creptaam') => 'BTC',
        esc_html__('CNY', 'creptaam') => 'CNY',
        esc_html__('USD', 'creptaam') => 'USD',
        esc_html__('EUR', 'creptaam') => 'EUR',
        esc_html__('GBP', 'creptaam') => 'GBP',
        esc_html__('GOLD', 'creptaam') => 'GOLD',
        esc_html__('JPY', 'creptaam') => 'JPY',
        esc_html__('RUB', 'creptaam') => 'RUB',
        esc_html__('SGD', 'creptaam') => 'SGD',
        esc_html__('KRW', 'creptaam') => 'KRW',
        esc_html__('PLN', 'creptaam') => 'PLN',
        esc_html__('AUD', 'creptaam') => 'AUD',
        esc_html__('CAD', 'creptaam') => 'CAD',
        esc_html__('ZAR', 'creptaam') => 'ZAR',
        esc_html__('SEK', 'creptaam') => 'SEK',
        esc_html__('AED', 'creptaam') => 'AED',
        esc_html__('INR', 'creptaam') => 'INR',
        esc_html__('DKK', 'creptaam') => 'DKK',
        esc_html__('MXN', 'creptaam') => 'MXN',
        esc_html__('RON', 'creptaam') => 'RON',
        esc_html__('CHF', 'creptaam') => 'CHF',
        esc_html__('NOK', 'creptaam') => 'NOK',
        esc_html__('PHP', 'creptaam') => 'PHP',
        esc_html__('HKD', 'creptaam') => 'HKD',
        esc_html__('CZK', 'creptaam') => 'CZK',
        esc_html__('BRL', 'creptaam') => 'BRL',
        esc_html__('VEF', 'creptaam') => 'VEF'
    );

    $currency_list = array();

    foreach($creptaam_currencies as $key => $currency) {
        $currency_list[] = array(
            'value' => $key,
            'label' => $currency
        );
    }
    return $currency_list;
}

	
// include vc extend file
include_once( TT_PLUGIN_DIR . '/inc/btc-market-chart.php' );
include_once( TT_PLUGIN_DIR . '/inc/btc-calculator.php' );
include_once( TT_PLUGIN_DIR . '/inc/btc-chart-widget.php' );
include_once( TT_PLUGIN_DIR . '/inc/btc-advanced-chart-widget.php' );
include_once( TT_PLUGIN_DIR . '/inc/btc-price-list-widget.php' );
include_once( TT_PLUGIN_DIR . '/inc/btc-price-summary-widget.php' );