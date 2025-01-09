<?php
    header('Content-type: text/css');
    $parse_uri = explode('wp-content', $_SERVER[ 'SCRIPT_FILENAME' ]);
    $wp_load = $parse_uri[ 0 ] . 'wp-load.php';
    require_once($wp_load);

    // color options
    $accent_color = creptaam_option('accent-color', false, '#ffc100');
    $link_color = creptaam_option('link-color', false, '#ffc100 ');

    // background color options
    $body_bg_color = creptaam_option('body-bg-color', false, '#fff');
    
    //footer background color 
    $footer_bg = creptaam_option('footer-bg', false, '#1a242e');

    // accent color darken
    $accent_lighten = creptaam_modify_color( $accent_color, 50 );
    $accent_darken = creptaam_modify_color( $accent_color, -20 );
    $accent_darken2 = creptaam_modify_color( $accent_color, -20 );
    $footer_bg_darken = creptaam_modify_color( $footer_bg, -10 );
    $link_darken = creptaam_modify_color( $link_color, -20 );

    // accent color lighten
    $footer_bg_lighten = creptaam_modify_color( $footer_bg, 40 );

    // body typography
    $font_color = creptaam_option('body-typography', 'color');
    $font_size = creptaam_option('body-typography', 'font-size');
    $font_family = creptaam_option('body-typography', 'font-family');
    $font_weight = creptaam_option('body-typography', 'font-weight');
    $line_height = creptaam_option('body-typography', 'line-height');

    // heading typography
    $heading_color = creptaam_option('heading-typography', 'color');
    $heading_font_family = creptaam_option('heading-typography', 'font-family');
    $heading_font_weight = creptaam_option('heading-typography', 'font-weight');

    // specific title size and it's line height

    // for H1
    $h1_font_size = creptaam_option('h1-typography', 'font-size');
    $h1_line_height = creptaam_option('h1-typography', 'line-height');

    // for H2
    $h2_font_size = creptaam_option('h2-typography', 'font-size');
    $h2_line_height = creptaam_option('h2-typography', 'line-height');

    // for H3
    $h3_font_size = creptaam_option('h3-typography', 'font-size');
    $h3_line_height = creptaam_option('h3-typography', 'line-height');

    // for H4
    $h4_font_size = creptaam_option('h4-typography', 'font-size');
    $h4_line_height = creptaam_option('h4-typography', 'line-height'); 

    // for H5
    $h5_font_size = creptaam_option('h5-typography', 'font-size');
    $h5_line_height = creptaam_option('h5-typography', 'line-height');

    // for H6
    $h6_font_size = creptaam_option('h6-typography', 'font-size');
    $h6_line_height = creptaam_option('h6-typography', 'line-height');

    // section title typography
    $section_title_color = creptaam_option('section-title', 'color');
    $section_title_size = creptaam_option('section-title', 'font-size');
    $section_title_family = creptaam_option('section-title', 'font-family');
    $section_title_weight = creptaam_option('section-title', 'font-weight');
    $section_title_line_height = creptaam_option('section-title', 'line-height');

    // section title intro typography
    $section_title_intro_color = creptaam_option('section-title-intro', 'color');
    $section_title_intro_size = creptaam_option('section-title-intro', 'font-size');
    $section_title_intro_family = creptaam_option('section-title-intro', 'font-family');
    $section_title_intro_weight = creptaam_option('section-title-intro', 'font-weight');
    $section_title_intro_line_height = creptaam_option('section-title-intro', 'line-height');

    // header title typography
    $header_title_color = creptaam_option('header-title', 'color');
    $header_title_size = creptaam_option('header-title', 'font-size');
    $header_title_family = creptaam_option('header-title', 'font-family');
    $header_title_weight = creptaam_option('header-title', 'font-weight');
    $header_title_line_height = creptaam_option('header-title', 'line-height');
    
    // menu background
    $menu_bg_color = creptaam_option('menu-bg-color', false, false);
    if ($menu_bg_color) :
        $menu_bg_color = 'background-color:' .$menu_bg_color. '';
    endif;

    // default menu color
    $default_font_color = creptaam_option('menu-color', false, false);
    if ($default_font_color) :
        $default_font_color = 'color:' .$default_font_color. '';
    endif;

    // default menu hover color
    $menu_hover_color = creptaam_option('menu-hover-color', false, false);
    $menu_after_hover_color = "";
    if ($menu_hover_color) :
        $menu_after_hover_color = 'background-color:' .$menu_hover_color. '';
        $menu_hover_color = 'color:' .$menu_hover_color. '';
    endif;

    // mobile menu background
    $mobile_menu_bg_color = creptaam_option('mobile-menu-bg-color', false, false);
    if ($mobile_menu_bg_color) :
        $mobile_menu_bg_color = 'background-color:' .$mobile_menu_bg_color. '';
    endif;

    // mobile menu color
    $mobile_menu_font_color = creptaam_option('mobile-menu-color', false, false);
    if ($mobile_menu_font_color) :
        $mobile_menu_font_color = 'color:' .$mobile_menu_font_color. '';
    endif;

    // sticky menu background
    $sticky_menu_bg_color = creptaam_option('sticky-menu-bg-color', false, false);
    if ($sticky_menu_bg_color) :
        $sticky_menu_bg_color = 'background-color:' .$sticky_menu_bg_color. '';
    endif;

    // sticky menu color
    $sticky_font_color = creptaam_option('sticky-menu-color', false, false);
    if ($sticky_font_color) :
        $sticky_font_color = 'color:' .$sticky_font_color. '';
    endif;

    // sticky menu hover color
    $sticky_font_hover_color = creptaam_option('sticky-menu-hover-color', false, false);
    if ($sticky_font_hover_color) :
        $sticky_font_hover_color = 'color:' .$sticky_font_hover_color. '';
    endif;


    // page header option
    if (creptaam_option('page-header-bg-option') == 'header-background-color'):
        // page header gradient
        $page_header_gradient_color = creptaam_option('page-header-gradient');
    endif;
?>

body{
    background-color: <?php echo esc_attr($body_bg_color) ?>;
    color: <?php echo esc_attr($font_color) ?>;
    font-size: <?php echo esc_attr($font_size) ?>;
    font-family: <?php echo esc_attr($font_family) ?>, sans-serif;
    font-weight: <?php echo esc_attr($font_weight) ?>;
    line-height: <?php echo esc_attr($line_height) ?>;
}

h1, 
h2, 
h3, 
h4, 
h5, 
h6{
    color: <?php echo esc_attr($heading_color) ?>;
    font-family: <?php echo esc_attr($heading_font_family) ?>, sans-serif;
    font-weight: <?php echo esc_attr($heading_font_weight) ?>;
}
h1{
    font-size: <?php echo esc_attr($h1_font_size) ?>;
    line-height: <?php echo esc_attr($h1_line_height) ?>;
}
h2{
    font-size: <?php echo esc_attr($h2_font_size) ?>;
    line-height: <?php echo esc_attr($h2_line_height) ?>;
}
h3{
    font-size: <?php echo esc_attr($h3_font_size) ?>;
    line-height: <?php echo esc_attr($h3_line_height) ?>;
}
h4{
    font-size: <?php echo esc_attr($h4_font_size) ?>;
    line-height: <?php echo esc_attr($h4_line_height) ?>;
}
h5{
    font-size: <?php echo esc_attr($h5_font_size) ?>;
    line-height: <?php echo esc_attr($h5_line_height) ?>;
}
h6{
    font-size: <?php echo esc_attr($h6_font_size) ?>;
    line-height: <?php echo esc_attr($h6_line_height) ?>;
}
.woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a{
    font-family: <?php echo esc_attr($heading_font_family) ?>, sans-serif;
}

<?php 
/**
* Link color
*/
?>
a{
    color: <?php echo esc_attr($link_color) ?>;
}


<?php 
/**
* Color darken
*/
?>
a:focus,
a:hover{
    color: <?php echo esc_attr($link_darken) ?>;
}
.post-wrapper .entry-content .more-link:hover,
.contact-info ul li a:hover{
    color: <?php echo esc_attr($accent_darken) ?>;
}

<?php 
/**
*
* Background color
*/
?>

.btn-primary,
.woocommerce a.button,
.woocommerce button.button.alt,
.woocommerce input.button,
.woocommerce input.button.alt,
.woocommerce #respond input#submit,
.woocommerce .product .entry-summary a.single_add_to_cart_button,
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary:active:focus,
.woocommerce button.button.alt:hover,
.woocommerce button.button.alt:focus,
.woocommerce button.button.alt:active,
.woocommerce input.button:hover,
.woocommerce input.button:focus,
.woocommerce input.button:active,
.woocommerce input.button.alt:hover,
.woocommerce input.button.alt:focus,
.woocommerce input.button.alt:active,
.woocommerce #respond input#submit:hover,
.woocommerce #respond input#submit:focus,
.woocommerce #respond input#submit:active,
.woocommerce .product .entry-summary a.single_add_to_cart_button:hover,
.woocommerce .product .entry-summary a.single_add_to_cart_button:focus,
.woocommerce .product .entry-summary a.single_add_to_cart_button:active,
.theme-bg,
.header-top-wrapper,
.dropdown>li>a::before,
.header-light .navbar-default .navbar-toggle .icon-bar,
.navbar-default .navbar-toggle:hover .icon-bar,
.navbar-default .navbar-toggle:focus .icon-bar,
.pricing-table-wrapper:hover .purchase-button a,
.icon-block:hover .tt-icon.icon-hover-default i,
.hover-block .icon-block:hover,
.border-plusbox.hover-block .icon-block-grid:hover,
.animated-block.hover-block .icon-block-grid:hover,
.blog-gallery-carousel .carousel-control:focus, 
.blog-gallery-carousel .carousel-control:hover,
.blog-navigation a:hover,
.page-pagination a:hover span,
.page-pagination > span,
.widget.widget_mc4wp_form_widget,
.widget_tag_cloud a:hover,
.pager.comment-navigation li a:hover,
.comments-wrapper .form-submit input,
.vc_tta-color-theme_default_color .vc_tta-panel .vc_tta-panel-heading,
.woocommerce ul li.product a.button:hover,
.woocommerce a.added_to_cart,
.woocommerce span.onsale,
.woocommerce ul.products li.product .onsale,
.woocommerce .quantity .btn-quantity:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active > a,
#add_payment_method .wc-proceed-to-checkout a.checkout-button, 
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, 
.woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.filter-nav ul li:after,
.widget_calendar #today,
.pagination .current,
.post-wrapper .post-overlay a:hover:before,
.post-wrapper .entry-content .more-link:after,
.footer-section .scroll-top i,
.tt-wishlist-count span, 
.tt-cart-count .cart-contents .cart-count,
.team-thumb span.contact-no,
.blog-btn:hover,
#tribe-events .tribe-events-button, 
#tribe-events .tribe-events-button:hover, 
#tribe_events_filters_wrapper input[type=submit], 
.tribe-events-button, 
.tribe-events-button.tribe-active:hover, 
.tribe-events-button.tribe-inactive, 
.tribe-events-button:hover, 
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], 
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a,
.navbar-default .side .navbar-nav > li.current-menu-ancestor>a:after,
.navbar-default .side .navbar-nav > li.current-menu-parent>a:after,
.navbar-default .side .navbar-nav > li.current-menu-item>a:after,
.side .nav > li a::after,
.tribe-events-widget-link a,
.post-overlay,
.process-in > li:hover .process-dot::after,
.process-desc .process-info,
.work-external-link li a:hover,
.service-content a.read-more::after, 
.tribe-events-read-more::after, 
.post-wrapper .entry-content .more-link::after,
.tribe-events-list-widget .tribe-events-widget-link a,
.wpcf7-form .wpcf7-form-control.wpcf7-submit,
.topbar-info .download-link a:hover{
    background-color: <?php echo esc_attr($accent_color) ?>;
}


.vc_tta-color-theme_default_color .vc_tta-panel.vc_active .vc_tta-panel-heading,
.tribe-events-widget-link a:hover{
    background-color: <?php echo esc_attr($accent_darken) ?>;
}

<?php 
/**
*
* Color
*/
?>

.woocommerce ul.products li.product h2.woocommerce-loop-product__title:hover,
.check-circle-list li:hover i,
.theme-color,
.contact-info ul li i,
.footer-nav ul.sub-menu li a:hover,
.icon-block.icon-default:hover .tt-icon i,
.icon-block:hover .tt-icon.icon-hover-white i,
.icon-block .tt-icon a.theme-color, 
.icon-block h3.theme-color,
.icon-block h3 a.theme-color,
.icon-wrapper .mail a:hover,
.entry-header .entry-meta span a:hover,
.single-post .entry-footer .post-tags a:hover,
.authors-post a:hover,
.author-social ul li a:hover,
.tt-sidebar-wrapper .widget_product_categories ul li a:hover:before,
.tt-sidebar-wrapper .widget_layered_nav ul li a:hover:before,
.tt-sidebar-wrapper .widget_categories ul li a:hover:before,
.tt-sidebar-wrapper .widget_archive ul li a:hover:before,
.tt-sidebar-wrapper .widget_meta ul li a:hover:before,
.tt-sidebar-wrapper .widget_pages ul li a:hover:before,
.tt-sidebar-wrapper .widget_nav_menu ul li a:hover:before,
.tt-sidebar-wrapper .widget_recent_entries ul li a:hover:before,
.tt-sidebar-wrapper .widget_recent_comments ul li:hover:before,
.tt-sidebar-wrapper .widget_product_categories ul li a:hover,
.tt-sidebar-wrapper .widget_layered_nav ul li a:hover,
.tt-sidebar-wrapper .widget_categories ul li a:hover,
.tt-sidebar-wrapper .widget_archive ul li a:hover,
.tt-sidebar-wrapper .widget_meta ul li a:hover,
.tt-sidebar-wrapper .widget_pages ul li a:hover,
.tt-sidebar-wrapper .widget_nav_menu ul li a:hover,
.tt-sidebar-wrapper .widget_recent_comments ul li a:hover,
.tt-sidebar-wrapper .widget_recent_entries ul li a:hover,
.author-social-links ul li a:hover,
.widget_mc4wp_form_widget .btn,
.widget_mc4wp_form_widget .btn:hover,
.widget_mc4wp_form_widget .btn:focus,
.comment-meta-wrapper a:hover,
.primary-footer a:hover,
.shop-category-wrapper h2 i,
.shop-category-wrapper ul li a:hover,
.entry-summary .yith-wcwl-add-to-wishlist .add_to_wishlist::before,
.entry-summary .yith-wcwl-add-to-wishlist a,
a.compare:hover:before,
.product_meta span a:hover,
.woocommerce .woocommerce-MyAccount-navigation ul li a:hover,
.woocommerce .woocommerce-MyAccount-navigation ul li.is-active a,
.shop-category-wrapper ul li a:hover,
.entry-header span a:hover,
.comment-reply-link:hover,
.attr-nav > ul > li > a:hover,
.header-wrap ul li a:hover,
.entry-content table a:hover,
.comments-wrapper li.pingback a:hover,
.woocommerce-message::before,
.woocommerce ul.cart_list li a:hover, 
.woocommerce ul.product_list_widget li a:hover,
.navbar-default .side .mobile-menu ul li a:hover,
.social-links ul li a:hover,
.widget .form-group button:after,
.single-post-navigation a:hover,
.tribe-events-list-widget h4 a:hover,
.ie .entry-title a:hover,
.ie .home-blog-content h3 a:hover,
.ie .tt-popular-post .media-body h4 a:hover,
.ie .tt-latest-post .media-body h4 a:hover,
.ie .tt-recent-comments .media-body h4 a:hover,
.ie .home-blog-wrapper .entry-title a:hover,
.ie .post-wrapper .entry-title a:hover,
.ie .tribe-events-list .type-tribe_events h2 a:hover,
.document-block .icon-block .btn.custom,
.popup-wrapper .popup-play,
.tt-time-lines .swiper-button-next::after, .tt-time-lines .swiper-button-prev::before,
.service-body .service-title a:hover,
.service-content a:hover,
.topbar-info .download-link a,
.single-tribe_events .tribe-events-event-meta a:hover,
.tt-popular-post .entry-meta li a:hover,
.tt-latest-post .entry-meta li a:hover,
.tt-recent-comments .entry-meta li a:hover,
.navbar-default .navbar-nav .dropdown-wrapper li.current-menu-ancestor>a,
.navbar-default .navbar-nav .dropdown-wrapper li.current-menu-parent>a,
.navbar-default .navbar-nav .dropdown-wrapper li.current-menu-item>a{
    color: <?php echo esc_attr($accent_color) ?>;
}

.tt-time-lines .swiper-slide h3{
    color: <?php echo esc_attr($accent_darken) ?>;
}

<?php 
/**
*
* Border color
*/
?>

.page-numbers .current,
.pagination .current,
.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus,
.tt-popular-post .nav-tabs>li.active>a, 
.tt-popular-post .nav-tabs.nav-justified>li.active>a,
.icon-block.icon-square:hover .tt-icon.icon-hover-default i.theme-color,
.icon-block.icon-round:hover .tt-icon.icon-hover-default i.theme-color,
.icon-block.icon-circle:hover .tt-icon.icon-hover-default i.theme-color,
.blog-navigation a:hover,
.widget select:focus,
.vc_tta.vc_general.vc_tta-color-theme_default_color.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-heading,
.woocommerce #review_form #respond textarea:focus,
.woocommerce #reviews input:focus,
.woocommerce #reviews textarea:focus,
.woocommerce .select2-choice:focus,
.woocommerce .input-text:focus,
.widget .widget-subscription input[type="email"]:focus,
.topbar-info .download-link a,
.form-control:focus{
    border-color: <?php echo esc_attr($accent_color) ?>;
}

.woocommerce ul.products li.product .onsale::before{
    border-color: transparent <?php echo esc_attr($accent_color) ?>;
}

.woocommerce-message {
    border-top-color: <?php echo esc_attr($accent_color) ?>;
}
.nav>li a:before{
    border-color: transparent transparent <?php echo esc_attr($accent_color) ?>;
}
.navbar-default .navbar-nav>li>a:before {
    border-color: transparent transparent <?php echo esc_attr($accent_color) ?>;
}


<?php 
/**
*
* Important color and background-color
*/
?>

.vc_tta-color-white.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.vc_tta-color-theme_default_color.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a{
    color: <?php echo esc_attr($accent_color) ?> !important;
}

.featured-carousel.owl-theme .owl-dots .owl-dot.active span, 
.featured-carousel.owl-theme .owl-dots .owl-dot:hover span,
.page-numbers>li>a:hover, 
.page-numbers>li>span:hover, 
.page-numbers>li>a:focus, 
.page-numbers>li>span:focus,
.pagination>li>a:hover, 
.pagination>li>span:hover, 
.pagination>li>a:focus, 
.pagination>li>span:focus,
.page-numbers .current,
.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus,
.vc_tta-color-theme_default_color.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-heading,
.vc_tta-color-theme_default_color.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-body, 
.vc_tta-color-theme_default_color.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta.vc_tta-accordion.vc_tta-color-grey .vc_tta-controls-icon.vc_tta-controls-icon-plus,
.vc_btn3-color-theme_primary_color,
.tt-filter-wrap.default-color ul li button:hover, 
.tt-filter-wrap.default-color ul li button.active{
    background-color: <?php echo esc_attr($accent_color) ?> !important;
}

.vc_gitem-animate .vc_gitem-zone-b{
    background-color: rgba(<?php echo creptaam_hex2rgb($accent_color) ?>, .85) !important;
}
.vc_tta-tab.vc_active a,
.process-desc .process-info::before{
    border-bottom-color: <?php echo esc_attr($accent_color) ?> !important;
}


<?php
/**
*
* Menu styles
*/
?>
<?php if ($menu_bg_color): ?>
    .header-transparent .navbar-default,
    .navbar-default {
        <?php echo esc_attr($menu_bg_color) ?>;
    }
<?php endif;

if ($sticky_menu_bg_color): ?>
    .header-transparent .header-wrapper.sticky .navbar-default,
    .header-wrapper.sticky .navbar-default {
        <?php echo esc_attr($sticky_menu_bg_color) ?>;
    }
<?php endif;

if ($default_font_color): ?>
    .header-transparent .navbar-default .navbar-nav>li>a,
    .header-wrapper.sticky .navbar-default .navbar-nav > li > a,
    .navbar-default .navbar-nav>li>a,
    .attr-nav > ul > li > a,
    .tt-wishlist-count > a, .tt-cart-count .cart-contents{
        <?php echo esc_attr($default_font_color) ?>;
    }
<?php endif;

if ($sticky_font_color): ?>
    .header-wrapper.sticky .attr-nav > ul > li a i,
    .header-transparent .header-wrapper.sticky .navbar-default .navbar-nav > li > a,
    .header-wrapper.sticky .navbar-default .navbar-nav > li > a{
        <?php echo esc_attr($sticky_font_color) ?>;
    }
<?php endif;

if ($sticky_font_hover_color): ?>
    .header-wrapper.sticky .attr-nav > ul > li a i:hover,
    .header-transparent .header-wrapper.sticky .nav > li a::after,
    .header-wrapper.sticky .navbar-default .navbar-nav li.current-menu-ancestor>a, 
    .header-wrapper.sticky .navbar-default .navbar-nav li.current-menu-parent>a, 
    .header-wrapper.sticky .navbar-default .navbar-nav li.current-menu-item>a,
    .header-wrapper.sticky .navbar-default .navbar-nav > li > a:hover{
        <?php echo esc_attr($sticky_font_hover_color) ?>;
    }
<?php endif;

if ($menu_hover_color): ?>
    .navbar-default .navbar-nav>li>a:focus,
    .navbar-default .navbar-nav>li>a:hover,
    .navbar-default .navbar-nav>.active>a, 
    .navbar-default .navbar-nav>.active>a:focus, 
    .navbar-default .navbar-nav>.active>a:hover,
    .navbar-default .navbar-nav>.open>a, 
    .navbar-default .navbar-nav>.open>a:focus, 
    .navbar-default .navbar-nav>.open>a:hover,
    .dropdown-menu>.active>a, 
    .dropdown-menu>.active>a:focus, 
    .dropdown-menu>.active>a:hover,
    .navbar-default .navbar-nav li.current-menu-ancestor>a,
    .navbar-default .navbar-nav li.current-menu-parent>a,
    .navbar-default .navbar-nav li.current-menu-item>a,
    .dropdown-menu>li>a:focus, 
    .dropdown-menu>li>a:hover,
    .navbar-default .navbar-nav li.current-menu-ancestor.has-mega-menu-child>a:hover,
    .navbar-default .navbar-nav li.current-menu-parent.has-mega-menu-child>a:hover{
        <?php echo esc_attr($menu_hover_color) ?>;
    }
    .header-transparent .header-wrapper:not(.sticky) .navbar-default .navbar-nav > li.current-menu-ancestor>a:after, .header-transparent .header-wrapper:not(.sticky) .navbar-default .navbar-nav > li.current-menu-parent>a:after, .header-transparent .header-wrapper:not(.sticky) .navbar-default .navbar-nav > li.current-menu-item>a:after{
        <?php echo esc_attr($menu_after_hover_color) ?>;
    }

    .navbar-default .navbar-nav > li.current-menu-ancestor>a:after, 
    .navbar-default .navbar-nav > li.current-menu-parent>a:after, 
    .navbar-default .navbar-nav > li.current-menu-item>a:after,
    .nav > li a::after{
        background-color: <?php echo esc_attr(creptaam_option('menu-hover-color', false, false)); ?>
    }
<?php endif;

if ($sticky_font_hover_color): ?>
    .header-transparent .header-wrapper.sticky .nav > li a::after,
    .header-wrapper.sticky .nav > li a::after{
        background-color: <?php echo esc_attr(creptaam_option('sticky-menu-hover-color', false, false)); ?>
    }
<?php endif; ?>


<?php
/**
*
* Media query
*/
?>

@media (max-width : 991px) {
    <?php if ($mobile_menu_bg_color): ?>
        .header-transparent .navbar-default,
        .navbar-default{
            <?php echo esc_attr($mobile_menu_bg_color)?> !important;
        }
    <?php endif; ?>
    
    <?php if ($sticky_menu_bg_color): ?>
        .header-wrapper.sticky .navbar-default {
            <?php echo esc_attr($sticky_menu_bg_color) ?> !important;
        }
    <?php endif; ?>

    <?php if ($mobile_menu_font_color): ?>
        .header-transparent .navbar-default .side .mobile-menu .navbar-nav li a,
        .navbar-default .side .mobile-menu .navbar-nav li a{
            <?php echo esc_attr($mobile_menu_font_color) ?>;
        }
        .tt-wishlist-count > a, .tt-cart-count .cart-contents{
            <?php echo esc_attr($mobile_menu_font_color) ?>;
        }
    <?php endif ?>
    
    .navbar-nav li a:hover,
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus, 
    .navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover,
    .dropdown-menu-trigger.menu-collapsed{
        color: <?php echo esc_attr($accent_color) ?>;
    }

    .navbar-default .navbar-nav li.current-menu-ancestor>a,
    .navbar-default .navbar-nav li.current-menu-parent>a,
    .navbar-default .navbar-nav li.current-menu-item>a{
        color: <?php echo esc_attr($accent_color) ?>;
    }
}


<?php
/**
*
* page header gradient color
*/
?>

<?php if (creptaam_option('page-title-color')): ?>
    .page-title h2,
    .page-title span,
    .breadcrumb>li+li:before,
    .page-title .breadcrumb li a,
    .page-title .breadcrumb li.active{
        color: <?php echo esc_attr(creptaam_option('page-title-color')); ?>;
    }
<?php endif; ?>

<?php if (creptaam_option('page-header-bg-option') == 'header-background-color'): ?>
    .page-title {
        background: <?php echo esc_attr($page_header_gradient_color['from']); ?>;
        background: -moz-linear-gradient(left, <?php echo esc_attr($page_header_gradient_color['from']); ?> 0%, <?php echo esc_attr($page_header_gradient_color['to']); ?> 100%);
        background: -webkit-gradient(left top, right top, color-stop(0%, <?php echo esc_attr($page_header_gradient_color['from']); ?>), color-stop(100%, <?php echo esc_attr($page_header_gradient_color['to']); ?>));
        background: -webkit-linear-gradient(left, <?php echo esc_attr($page_header_gradient_color['from']); ?> 0%, <?php echo esc_attr($page_header_gradient_color['to']); ?> 100%);
        background: -o-linear-gradient(left, <?php echo esc_attr($page_header_gradient_color['from']); ?> 0%, <?php echo esc_attr($page_header_gradient_color['to']); ?> 100%);
        background: -ms-linear-gradient(left, <?php echo esc_attr($page_header_gradient_color['from']); ?> 0%, <?php echo esc_attr($page_header_gradient_color['to']); ?> 100%);
        background: linear-gradient(to right, <?php echo esc_attr($page_header_gradient_color['from']); ?> 0%, <?php echo esc_attr($page_header_gradient_color['to']); ?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo esc_attr($page_header_gradient_color['from']); ?>', endColorstr='<?php echo esc_attr($page_header_gradient_color['to']); ?>', GradientType=1 );
    }
<?php endif; ?>

<?php if ($footer_bg): ?>
    .footer-single-column .footer-section {
        background-color: <?php echo esc_attr($footer_bg) ?>;
    }
<?php endif; ?>

.service-body .service-title a,
.entry-title a,
.home-blog-content h3 a,
.tt-popular-post .media-body h4 a,
.tt-latest-post .media-body h4 a,
.tribe-events-list-widget h4 a,
.tt-recent-comments .media-body h4 a,
.home-blog-wrapper .entry-title a,
.post-wrapper .entry-title a,
.tribe-events-list .type-tribe_events h2 a{
    background: -moz-linear-gradient(transparent calc(100% - 2px), <?php echo esc_attr($accent_color) ?> 2px);
    background: -webkit-linear-gradient(transparent calc(100% - 2px), <?php echo esc_attr($accent_color) ?> 2px);
    background: -o-linear-gradient(transparent calc(100% - 2px), <?php echo esc_attr($accent_color) ?> 2px);
    background: linear-gradient(transparent calc(100% - 2px), <?php echo esc_attr($accent_color) ?> 2px);
    background-repeat: no-repeat;
    background-size: 0% 100%;
}
.tt-recent-comments .media-body h4 a,
.tribe-events-list-widget h4 a,
.tt-latest-post .media-body h4 a{
    background: -moz-linear-gradient(transparent calc(100% - 1px), <?php echo esc_attr($accent_color) ?> 1px);
    background: -webkit-linear-gradient(transparent calc(100% - 1px), <?php echo esc_attr($accent_color) ?> 1px);
    background: -o-linear-gradient(transparent calc(100% - 1px), <?php echo esc_attr($accent_color) ?> 1px);
    background: linear-gradient(transparent calc(100% - 1px), <?php echo esc_attr($accent_color) ?> 1px);
    background-repeat: no-repeat;
    background-size: 0% 100%;
}
.tt-time-lines .time-lines-wrapper:after{
    background: <?php echo esc_attr($accent_color) ?>;
    background: -moz-linear-gradient(left, <?php echo esc_attr($accent_lighten) ?> 0%, <?php echo esc_attr($accent_darken) ?> 50%, <?php echo esc_attr($accent_lighten) ?> 100%); 
    background: -webkit-linear-gradient(left, <?php echo esc_attr($accent_lighten) ?> 0%,<?php echo esc_attr($accent_darken) ?> 50%,<?php echo esc_attr($accent_lighten) ?> 100%); 
    background: linear-gradient(to right, <?php echo esc_attr($accent_lighten) ?> 0%,<?php echo esc_attr($accent_darken) ?> 50%,<?php echo esc_attr($accent_lighten) ?> 100%);
}
.tt-time-lines .current-year.swiper-slide::after {
    background-color: <?php echo esc_attr($accent_darken) ?>
}
.tt-time-lines .swiper-slide::before {
    box-shadow: 0 5px 17px 0 <?php echo esc_attr($accent_darken) ?>;
}
.outline-block .icon-block:hover,
.dark-block .icon-block:hover{
    box-shadow: 0 4px 0 <?php echo esc_attr($accent_color) ?>;
}

::selection {
  background: <?php echo esc_attr($accent_color) ?>;
  color: #fff;
}
::-moz-selection {
  background: <?php echo esc_attr($accent_color) ?>;
  color: #fff;
}