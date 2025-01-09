<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'TT Price Chart', 'tt-pl-textdomain' ),
        'base'        => 'tt_btc_chart',
        'icon'        => 'fa fa-area-chart',
        'category'    => esc_html__( 'TT Elements', 'tt-pl-textdomain' ),
        'description' => esc_html__( 'Displays Price Chart', 'tt-pl-textdomain' ),
        'params'      => array(

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'tt-pl-textdomain' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'tt-pl-textdomain' ),
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'tt-pl-textdomain' ),
                'param_name'  => 'el_class',
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'tt-pl-textdomain' )
            )
        )
    ));

endif; // function_exists( 'vc_map' )



function creptaam_chart_shortcodes($atts){

    $tt_atts = shortcode_atts( array(
        'css'           => '',
        'el_class'      => ''
    ), $atts, 'tt_btc_chart' );

    $css_class = vc_shortcode_custom_css_class( $tt_atts['css'], ' ');

    ob_start(); 

    wp_enqueue_script('highstock');
    wp_enqueue_script('tt-creptaam-price-chart');
    ?>
        
        <div class="creptaam-price-chart">
            <div class="top">
                <div id="chart-selection" class="buttons"><?php esc_html_e('Chart:', 'tt-pl-textdomain');?> </div>
                <div id="relation-selection" class="buttons"><?php esc_html_e('Compared to:', 'tt-pl-textdomain');?> </div>
            </div>
            <div class="top2">
                <div id="ranges" class="buttons"><?php esc_html_e('Range:', 'tt-pl-textdomain');?> </div>
                <div class="buttons">
                    <a href="#" id="average-button"><?php esc_html_e('Average', 'tt-pl-textdomain');?></a>
                </div>
            </div>
            <div id="loading">
                <?php esc_html_e('Loading ...', 'tt-pl-textdomain');?>
            </div>
            <div id="ChartContainer"></div>
        </div>
        
    <?php return ob_get_clean();
}

add_shortcode('tt_btc_chart', 'creptaam_chart_shortcodes' );