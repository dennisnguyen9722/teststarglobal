<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'BTC Chart Widget', 'tt-pl-textdomain' ),
        'base'        => 'tt_chart_widget',
        'icon'        => 'fa fa-area-chart',
        'category'    => esc_html__( 'TT Elements', 'tt-pl-textdomain' ),
        'description' => esc_html__( 'Displays BTC Chart Widget', 'tt-pl-textdomain' ),
        'params'      => array(

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Chart Period', 'creptaam'),
                'param_name' => 'chart_period',
                'value' => array(
                    esc_html__('1 Day', 'creptaam') => '1D',
                    esc_html__('1 Week', 'creptaam') => '1W',
                    esc_html__('2 Week', 'creptaam') => '2W',
                    esc_html__('1 Month', 'creptaam') => '1M',
                    esc_html__('3 Month', 'creptaam') => '3M',
                    esc_html__('6 Month', 'creptaam') => '6M',
                    esc_html__('1 Year', 'creptaam') => '1Y'
                ),
                'std'         => '1D',
                'admin_label' => true,
                'description' => esc_html__('Select chart period', 'creptaam'),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Coin name', 'creptaam'),
                'param_name' => 'coin_name',
                'value' => array(
                    esc_html__('Bitcoin', 'creptaam') => 'BTC',
                    esc_html__('Ethereum', 'creptaam') => 'ETH',
                    esc_html__('Ripple', 'creptaam') => 'XRP',
                    esc_html__('Bitcoin Cash', 'creptaam') => 'BCH',
                    esc_html__('Litecoin', 'creptaam') => 'LTC',
                    esc_html__('Stellar', 'creptaam') => 'XLM',
                    esc_html__('NEO', 'creptaam') => 'NEO',
                    esc_html__('EOS', 'creptaam') => 'EOS',
                    esc_html__('NEM', 'creptaam') => 'NEM',
                    esc_html__('IOTA', 'creptaam') => 'IOT',
                    esc_html__('Dash', 'creptaam') => 'DASH',
                    esc_html__('Monero', 'creptaam') => 'XMR',
                    esc_html__('Tronix', 'creptaam') => 'TRX',
                    esc_html__('Lisk', 'creptaam') => 'LSK',
                ),
                'std'         => 'BTC',
                'admin_label' => true,
                'description' => esc_html__('Select chart period', 'creptaam'),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Currency', 'creptaam'),
                'param_name' => 'currency',
                'value' => array(
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
                    esc_html__('VEF', 'creptaam') => 'VEF',
                ),
                'std'         => 'USD',
                'admin_label' => true,
                'description' => esc_html__('Select chart currency', 'creptaam'),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Choose theme', 'creptaam'),
                'param_name' => 'theme',
                'value' => array(
                    esc_html__('Default', 'creptaam') => '',
                    esc_html__('Dark', 'creptaam') => 'dark'
                ),
                'admin_label' => true,
                'description' => esc_html__('Select a theme', 'creptaam'),
            ),

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



function creptaam_chart_widget_shortcodes($atts){

    $tt_atts = shortcode_atts( array(
        'chart_period'  => '1D',
        'coin_name'     => 'BTC',
        'currency'      => 'USD',
        'theme'         => '',
        'css'           => '',
        'el_class'      => ''
    ), $atts, 'tt_chart_widget' );

    $css_class = vc_shortcode_custom_css_class( $tt_atts['css'], ' ');

    ob_start(); 

    ?>
        
        <div class="creptaam-chart-widget <?php echo esc_attr($css_class.' '.$tt_atts['el_class']); ?>">
            <script data-cfasync="false" type="text/javascript">
                baseUrl = "https://widgets.cryptocompare.com/";
                var scripts = document.getElementsByTagName("script");
                var embedder = scripts[ scripts.length - 1 ];
                <?php if ($tt_atts['theme'] == 'dark') { ?>
                    var cccTheme = {"General":{"background":"#333","borderColor":"#545454","borderRadius":"4px 4px 0 0"},"Header":{"background":"#000","color":"#FFF"},"Followers":{"background":"#f7931a","color":"#FFF","borderColor":"#e0bd93","counterBorderColor":"#fdab48","counterColor":"#f5d7b2"},"Data":{"priceColor":"#FFF","infoLabelColor":"#CCC","infoValueColor":"#CCC"},"Chart":{"fillColor":"rgba(86,202,158,0.5)","borderColor":"#56ca9e"},"Conversion":{"background":"#000","color":"#999"}};
                <?php } ?>
                (function (){
                var appName = encodeURIComponent(window.location.hostname);
                if(appName==""){appName="local";}
                var s = document.createElement("script");
                s.type = "text/javascript";
                s.async = true;
                var theUrl = baseUrl+'serve/v2/coin/chart?fsym=<?php echo esc_attr($tt_atts['coin_name']); ?>&tsym=<?php echo esc_attr($tt_atts['currency']); ?>&period=<?php echo esc_attr($tt_atts['chart_period']); ?>';
                s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                embedder.parentNode.appendChild(s);
                })();
            </script>
        </div>
        
    <?php return ob_get_clean();
}

add_shortcode('tt_chart_widget', 'creptaam_chart_widget_shortcodes' );