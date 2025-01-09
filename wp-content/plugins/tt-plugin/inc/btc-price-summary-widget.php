<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'BTC Price Summary Widget', 'tt-pl-textdomain' ),
        'base'        => 'tt_price_summary_widget',
        'icon'        => 'fa fa-area-chart',
        'category'    => esc_html__( 'TT Elements', 'tt-pl-textdomain' ),
        'description' => esc_html__( 'Displays BTC Price Summary Widget', 'tt-pl-textdomain' ),
        'params'      => array(

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
                'type' => 'autocomplete',
                'heading' => esc_html__('Select currency', 'creptaam'),
                'param_name' => 'currency',
                'settings' => array(
                    'multiple' => true,
                    'values' => creptaam_currency_list(),
                    'unique_values' => true,
                    'display_inline' => true,
                ),
                'param_holder_class' => 'vc_not-for-custom',
                'description' => esc_html__('Type the currency name, eg: USD, EUR, BTC, GBP, JPY, CNY, multiple tag allowed', 'creptaam')
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



function creptaam_price_summary_widget_shortcodes($atts){

    $tt_atts = shortcode_atts( array(
        'coin_name'     => 'BTC',
        'currency'      => '',
        'theme'         => '',
        'css'           => '',
        'el_class'      => ''
    ), $atts, 'tt_price_summary_widget' );

    $css_class = vc_shortcode_custom_css_class( $tt_atts['css'], ' ');

    ob_start();

    ?>
        
    <div class="creptaam-price-list-widget <?php echo esc_attr($css_class.' '.$tt_atts['el_class']); ?>">
        
        <?php $creptaam_currencies = str_replace(' ', '', $tt_atts['currency']); ?>

        <script data-cfasync="false" type="text/javascript">
            baseUrl = "https://widgets.cryptocompare.com/";
            var scripts = document.getElementsByTagName("script");
            var embedder = scripts[ scripts.length - 1 ];
            <?php if ($tt_atts['theme'] == 'dark') { ?>
            var cccTheme = {"General":{"background":"#000","borderColor":"#333","textColor":"#FFF"}};
            <?php } ?>
            (function (){
            var appName = encodeURIComponent(window.location.hostname);
            if(appName==""){appName="local";}
            var s = document.createElement("script");
            s.type = "text/javascript";
            s.async = true;
            var theUrl = baseUrl+'serve/v1/coin/summary?fsym=<?php echo esc_attr($tt_atts['coin_name']); ?>&tsyms=<?php echo esc_attr($creptaam_currencies); ?>';
            s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
            embedder.parentNode.appendChild(s);
            })();
        </script>

    </div>
        
<?php return ob_get_clean();
}

add_shortcode('tt_price_summary_widget', 'creptaam_price_summary_widget_shortcodes' );