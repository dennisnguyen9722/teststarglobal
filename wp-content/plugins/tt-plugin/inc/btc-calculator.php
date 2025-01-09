<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    vc_map( array(
        'name'        => esc_html__( 'TT Cryptocurrency Calculator', 'tt-pl-textdomain' ),
        'base'        => 'tt_btc_calculator',
        'icon'        => 'fa fa-calculator',
        'category'    => esc_html__( 'TT Elements', 'tt-pl-textdomain' ),
        'description' => esc_html__( 'Displays Cryptocurrency Calculator', 'tt-pl-textdomain' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Crypto Currency Limit', 'tt-pl-textdomain' ),
                'param_name'  => 'limit',
                'std'         => 20,
                'description' => esc_html__( 'Crypto Currency Limit, default is 20', 'tt-pl-textdomain' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'tt-pl-textdomain' ),
                'param_name'  => 'el_class',
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'tt-pl-textdomain' )
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'tt-pl-textdomain' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'tt-pl-textdomain' ),
            )
        )
    ));

endif; // function_exists( 'vc_map' )



function creptaam_calculator_shortcodes($atts){

    $tt_atts = shortcode_atts( array(
        'limit'         => 20,
        'css'           => '',
        'el_class'      => ''
    ), $atts, 'tt_btc_calculator' );

    $css_class = vc_shortcode_custom_css_class( $tt_atts['css'], ' ');

    ob_start(); 

    wp_enqueue_script('tt-creptaam-calculator');
    ?>
        
    <div class="creptaam-calculator">
        <?php 

        $now_ping = 'https://api.coinmarketcap.com/v1/ticker/?limit='.esc_attr($tt_atts['limit']);'';

        $now_ping_get = wp_remote_get( esc_url($now_ping), array( 'timeout' => 30 ) );

        ?>
        <form class="form-inline">
            <div class="form-group select-wrapper">
                
                <select class="tt-select" name="currencyFrom" id="currencyFrom">
                    <option value=""><?php esc_html_e('Select', 'tt-pl-textdomain'); ?></option>
                    <?php do_action('creptaam-before-calculator-from-currency'); ?>

                    <option value="BTC" selected><?php esc_html_e('BTC', 'tt-pl-textdomain'); ?></option>
                    <option value="USD"><?php esc_html_e('USD', 'tt-pl-textdomain'); ?></option>
                    <option value="HUF"><?php esc_html_e('HUF', 'tt-pl-textdomain'); ?></option>
                    <option value="THB"><?php esc_html_e('THB', 'tt-pl-textdomain'); ?></option>
                    <option value="ZAR"><?php esc_html_e('ZAR', 'tt-pl-textdomain'); ?></option>
                    <option value="NOK"><?php esc_html_e('NOK', 'tt-pl-textdomain'); ?></option>
                    <option value="EUR"><?php esc_html_e('EUR', 'tt-pl-textdomain'); ?></option>
                    <option value="TRY"><?php esc_html_e('TRY', 'tt-pl-textdomain'); ?></option>
                    <option value="CHF"><?php esc_html_e('CHF', 'tt-pl-textdomain'); ?></option>
                    <option value="RUB"><?php esc_html_e('RUB', 'tt-pl-textdomain'); ?></option>
                    <option value="MXN"><?php esc_html_e('MXN', 'tt-pl-textdomain'); ?></option>
                    <option value="ILS"><?php esc_html_e('ILS', 'tt-pl-textdomain'); ?></option>
                    <option value="CNY"><?php esc_html_e('CNY', 'tt-pl-textdomain'); ?></option>
                    <option value="PLN"><?php esc_html_e('PLN', 'tt-pl-textdomain'); ?></option>
                    <option value="PHP"><?php esc_html_e('PHP', 'tt-pl-textdomain'); ?></option>
                    <option value="AUD"><?php esc_html_e('AUD', 'tt-pl-textdomain'); ?></option>
                    <option value="IDR"><?php esc_html_e('IDR', 'tt-pl-textdomain'); ?></option>
                    <option value="INR"><?php esc_html_e('INR', 'tt-pl-textdomain'); ?></option>
                    <option value="JPY"><?php esc_html_e('JPY', 'tt-pl-textdomain'); ?></option>
                    <option value="DKK"><?php esc_html_e('DKK', 'tt-pl-textdomain'); ?></option>
                    <option value="MYR"><?php esc_html_e('MYR', 'tt-pl-textdomain'); ?></option>
                    <option value="SEK"><?php esc_html_e('SEK', 'tt-pl-textdomain'); ?></option>
                    <option value="PKR"><?php esc_html_e('PKR', 'tt-pl-textdomain'); ?></option>
                    <option value="KRW"><?php esc_html_e('KRW', 'tt-pl-textdomain'); ?></option>
                    <option value="GBP"><?php esc_html_e('GBP', 'tt-pl-textdomain'); ?></option>
                    <option value="CZK"><?php esc_html_e('CZK', 'tt-pl-textdomain'); ?></option>
                    <option value="CAD"><?php esc_html_e('CAD', 'tt-pl-textdomain'); ?></option>
                    <option value="BRL"><?php esc_html_e('BRL', 'tt-pl-textdomain'); ?></option>
                    <option value="SGD"><?php esc_html_e('SGD', 'tt-pl-textdomain'); ?></option>
                    <option value="NZD"><?php esc_html_e('NZD', 'tt-pl-textdomain'); ?></option>
                    <option value="TWD"><?php esc_html_e('TWD', 'tt-pl-textdomain'); ?></option>
                    <option value="CLP"><?php esc_html_e('CLP', 'tt-pl-textdomain'); ?></option>
                    <option value="HKD"><?php esc_html_e('HKD', 'tt-pl-textdomain'); ?></option>
                    <?php if (!is_wp_error( $now_ping_get )) :
                        $bit_coin_datas = json_decode( $now_ping_get['body'] ); ?>
                        
                        <?php foreach ($bit_coin_datas as $value) : ?>
                            <option value="<?php echo esc_attr($value->symbol); ?>"><?php echo esc_html($value->name); ?>(<?php echo esc_html($value->symbol); ?>)</option>
                        <?php endforeach; ?>

                    <?php endif; ?>
                    <?php do_action('creptaam-before-calculator-from-currency');?>
                </select>
            </div>

            <div class="form-group">
                <input type="number" name="amountFrom" id="amountFrom" value="1">
            </div>
            
            <div class="form-group select-wrapper">
                <select class="tt-select" name="currencyTo" id="currencyTo">
                    <option value=""><?php esc_html_e('Select', 'tt-pl-textdomain'); ?></option>
                    <?php do_action('creptaam-before-calculator-to-currency');?>

                    <option value="USD" selected><?php esc_html_e('USD', 'tt-pl-textdomain'); ?></option>
                    <option value="HUF"><?php esc_html_e('HUF', 'tt-pl-textdomain'); ?></option>
                    <option value="THB"><?php esc_html_e('THB', 'tt-pl-textdomain'); ?></option>
                    <option value="ZAR"><?php esc_html_e('ZAR', 'tt-pl-textdomain'); ?></option>
                    <option value="NOK"><?php esc_html_e('NOK', 'tt-pl-textdomain'); ?></option>
                    <option value="EUR"><?php esc_html_e('EUR', 'tt-pl-textdomain'); ?></option>
                    <option value="TRY"><?php esc_html_e('TRY', 'tt-pl-textdomain'); ?></option>
                    <option value="CHF"><?php esc_html_e('CHF', 'tt-pl-textdomain'); ?></option>
                    <option value="RUB"><?php esc_html_e('RUB', 'tt-pl-textdomain'); ?></option>
                    <option value="MXN"><?php esc_html_e('MXN', 'tt-pl-textdomain'); ?></option>
                    <option value="ILS"><?php esc_html_e('ILS', 'tt-pl-textdomain'); ?></option>
                    <option value="CNY"><?php esc_html_e('CNY', 'tt-pl-textdomain'); ?></option>
                    <option value="PLN"><?php esc_html_e('PLN', 'tt-pl-textdomain'); ?></option>
                    <option value="PHP"><?php esc_html_e('PHP', 'tt-pl-textdomain'); ?></option>
                    <option value="AUD"><?php esc_html_e('AUD', 'tt-pl-textdomain'); ?></option>
                    <option value="IDR"><?php esc_html_e('IDR', 'tt-pl-textdomain'); ?></option>
                    <option value="INR"><?php esc_html_e('INR', 'tt-pl-textdomain'); ?></option>
                    <option value="JPY"><?php esc_html_e('JPY', 'tt-pl-textdomain'); ?></option>
                    <option value="DKK"><?php esc_html_e('DKK', 'tt-pl-textdomain'); ?></option>
                    <option value="MYR"><?php esc_html_e('MYR', 'tt-pl-textdomain'); ?></option>
                    <option value="SEK"><?php esc_html_e('SEK', 'tt-pl-textdomain'); ?></option>
                    <option value="PKR"><?php esc_html_e('PKR', 'tt-pl-textdomain'); ?></option>
                    <option value="KRW"><?php esc_html_e('KRW', 'tt-pl-textdomain'); ?></option>
                    <option value="GBP"><?php esc_html_e('GBP', 'tt-pl-textdomain'); ?></option>
                    <option value="CZK"><?php esc_html_e('CZK', 'tt-pl-textdomain'); ?></option>
                    <option value="CAD"><?php esc_html_e('CAD', 'tt-pl-textdomain'); ?></option>
                    <option value="BRL"><?php esc_html_e('BRL', 'tt-pl-textdomain'); ?></option>
                    <option value="SGD"><?php esc_html_e('SGD', 'tt-pl-textdomain'); ?></option>
                    <option value="NZD"><?php esc_html_e('NZD', 'tt-pl-textdomain'); ?></option>
                    <option value="TWD"><?php esc_html_e('TWD', 'tt-pl-textdomain'); ?></option>
                    <option value="CLP"><?php esc_html_e('CLP', 'tt-pl-textdomain'); ?></option>
                    <option value="HKD"><?php esc_html_e('HKD', 'tt-pl-textdomain'); ?></option>

                    <?php if (!is_wp_error( $now_ping_get )) :
                        $bit_coin_data = json_decode( $now_ping_get['body'] ); ?>
                        
                        <?php foreach ($bit_coin_data as $value) : ?>
                            <option value="<?php echo esc_attr($value->symbol); ?>"><?php echo esc_html($value->name); ?>(<?php echo esc_html($value->symbol); ?>)</option>
                        <?php endforeach; ?>

                    <?php endif; ?>
                    <?php do_action('creptaam-after-calculator-to-currency');?>
                </select>
            </div>
            
            <div class="form-group">
                <p id="result"></p>
            </div>
        </form>
    </div>

    <?php return ob_get_clean();
}

add_shortcode('tt_btc_calculator', 'creptaam_calculator_shortcodes' );