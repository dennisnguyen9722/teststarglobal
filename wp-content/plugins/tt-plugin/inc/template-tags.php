<?php

//---------------------------------------------------------------------
// Post view
//---------------------------------------------------------------------
if (!function_exists('creptaam_set_post_views')) {
    function creptaam_set_post_views($postID) {
        $count_key = 'creptaam_post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
}


if (!function_exists('creptaam_get_post_views')) {
    function creptaam_get_post_views($postID){
        $count_key = 'creptaam_post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return 0;
        }
        return $count;
    }
}


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page break pagination
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_link_pages')) :

    function creptaam_link_pages($args = '') {
        $defaults = array(
            'before'           => '',
            'after'            => '',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'nextpagelink'     => esc_html__('Next page', 'tt-pl-textdomain'),
            'previouspagelink' => esc_html__('Previous page', 'tt-pl-textdomain'),
            'pagelink'         => '%',
            'echo'             => 1
        );

        $r = wp_parse_args($args, $defaults);
        $r = apply_filters('wp_link_pages_args', $r);
        extract($r, EXTR_SKIP);

        global $page, $numpages, $multipage, $more, $pagenow;

        $output = '';
        if ($multipage) {
            if ('number' == $next_or_number) {
                $output .= $before . '<ul class="pagination">';
                $laquo = $page == 1 ? 'class="disabled"' : '';
                $output .= '<li ' . $laquo . '>' . _wp_link_page($page - 1) . '&laquo; </a></li>';
                for ($i = 1; $i < ($numpages + 1); $i = $i + 1) {
                    $j = str_replace('%', $i, $pagelink);

                    if (($i != $page) || ((!$more) && ($page == 1))) {
                        $output .= '<li>';
                        $output .= _wp_link_page($i);
                    } else {
                        $output .= '<li class="active">';
                        $output .= _wp_link_page($i);
                    }
                    $output .= $link_before . $j . $link_after;

                    $output .= '</a></li>';
                }
                $raquo = $page == $numpages ? 'class="disabled"' : '';
                $output .= '<li ' . $raquo . '>' . _wp_link_page($page + 1) . '&raquo;</a></li>';
                $output .= '</ul>' . $after;
            } else {
                if ($more) {
                    $output .= $before . '<ul class="pager">';
                    $i = $page - 1;
                    if ($i && $more) {
                        $output .= '<li class="previous">' . _wp_link_page($i);
                        $output .= $link_before . $previouspagelink . $link_after . '</li>';
                    }
                    $i = $page + 1;
                    if ($i <= $numpages && $more) {
                        $output .= '<li class="next">' . _wp_link_page($i);
                        $output .= $link_before . $nextpagelink . $link_after . '</a></li>';
                    }
                    $output .= '</ul>' . $after;
                }
            }
        }

        if ($echo) {
            echo $output;
        } else {
            return $output;
        }
    }
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Comment form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_comment_form')) :

    function creptaam_comment_form($args = array(), $post_id = NULL) {
        if (NULL === $post_id) {
            $post_id = get_the_ID();
        } else {
            $id = $post_id;
        }

        $commenter = wp_get_current_commenter();
        $user = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';

        if (!isset($args[ 'format' ])) {
            $args[ 'format' ] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
        }

        $req = get_option('require_name_email');
        $aria_req = ($req ? " aria-required='true'" : '');
        $html5 = 'html5' === $args[ 'format' ];
        $fields = array(
            'author' => '
            <div class="form-group">
                <div class="col-sm-6 comment-form-author input-field">
                    <label for="author">' . esc_html__('Your Name*','tt-pl-textdomain') . '</label>
                    <input id="author" name="author" type="text" class="form-control" value="" ' . $aria_req . ' />
                </div>',
            'email'  => '<div class="col-sm-6 comment-form-email input-field">
                <label for="email">' . esc_html__('Your Email*','tt-pl-textdomain') . '</label>
                <input id="email" name="email" class="form-control" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="" ' . $aria_req . ' />
            </div>
        </div>',
            'url'    => '<div class="form-group">
        <div class=" col-sm-12 comment-form-url input-field">' .
                '<label for="url">' . esc_html__('Your Website','tt-pl-textdomain') . '</label>
                <input id="url" name="url" class="form-control" ' . ($html5 ? 'type="url"' : 'type="text"') . ' value=""  />
        </div></div>',

        );

        $required_text = sprintf(' ' . esc_html__('Required fields are marked %s', 'tt-pl-textdomain'), '<span class="required">*</span>');
        $defaults = array(
            'fields'               => apply_filters('comment_form_default_fields', $fields),
            'comment_field'        => '
            <div class="form-group comment-form-comment">
                <div class="col-sm-12">

                  <div class="input-field">
                    <label for="comment">' . esc_html__('Your Comment','tt-pl-textdomain') . '</label>
                    <textarea name="comment" id="comment" class="form-control"  rows="8" aria-required="true"></textarea>
                  </div>
                </div>
            </div>
            ',
            'must_log_in'          => '
            
            <div class="alert alert-danger must-log-in">' 
            . sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'tt-pl-textdomain' ), array( 'a' => array( 'href' => array() ) ) ), wp_login_url( apply_filters( 'the_permalink', esc_url( get_permalink( $post_id ) ) ) ) ) . '</div>',
            'logged_in_as'         => '<div class="alert alert-info logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'tt-pl-textdomain' ), array( 'a' => array( 'href' => array() ) ) ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', esc_url( get_permalink( $post_id ) ) ) ) ) . '</div>',
            'comment_notes_before' => '<div class="comment-notes">' . esc_html__( 'Your email address will not be published.', 'tt-pl-textdomain' ) . ( $req ? $required_text : '' ) . '</div>',
            'comment_notes_after'  => '<div class="form-allowed-tags">' . sprintf( wp_kses( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'tt-pl-textdomain' ), array( 'abbr' => array( 'title' => array() ) ) ), ' <code>' . allowed_tags() . '</code>' ) . '</div>',
            'id_form'              => 'commentform',
            'id_submit'            => 'submit',
            'title_reply'          => esc_html__( 'Leave a Reply', 'tt-pl-textdomain' ),
            'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'tt-pl-textdomain' ),
            'cancel_reply_link'    => esc_html__( 'Cancel reply', 'tt-pl-textdomain' ),
            'label_submit'         => esc_html__( 'Submit', 'tt-pl-textdomain' ),
            'format'               => 'xhtml',
        );

        $args = wp_parse_args($args, apply_filters('comment_form_defaults', $defaults));

        if (comments_open($post_id)) {
            ?>
            <?php do_action('comment_form_before'); ?>
            <div id="respond" class="comment-respond">
                <h3 id="reply-title" class="comment-reply-title">
                    <?php comment_form_title($args[ 'title_reply' ], $args[ 'title_reply_to' ]); ?>
                    <small><?php cancel_comment_reply_link($args[ 'cancel_reply_link' ]); ?></small>
                </h3>

                <?php if (get_option('comment_registration') && !is_user_logged_in()) { ?>
                    <?php echo $args[ 'must_log_in' ]; ?>
                    <?php do_action('comment_form_must_log_in_after'); ?>
                <?php } else { ?>
                    <form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post"
                          id="<?php echo esc_attr($args[ 'id_form' ]); ?>"
                          class="form-horizontal comment-form"<?php echo esc_attr($html5 ? ' novalidate' : ''); ?>
                          role="form">
                        <?php do_action('comment_form_top'); ?>
                        <?php if (is_user_logged_in()) { ?>
                            <?php echo apply_filters('comment_form_logged_in', $args[ 'logged_in_as' ], $commenter, $user_identity); ?>
                            <?php do_action('comment_form_logged_in_after', $commenter, $user_identity); ?>
                        <?php } else { ?>
                            <?php echo $args[ 'comment_notes_before' ]; ?>
                            <?php
                            do_action('comment_form_before_fields');
                            foreach ((array) $args[ 'fields' ] as $name => $field) {
                                echo apply_filters("comment_form_field_{$name}", $field) . "\n";
                            }
                            do_action('comment_form_after_fields');
                        }

                            echo apply_filters('comment_form_field_comment', $args[ 'comment_field' ]);

                            echo $args[ 'comment_notes_after' ]; ?>

                        <div class="form-submit">
                            <input class="btn btn-primary" name="submit" type="submit"
                                   id="<?php echo esc_attr($args[ 'id_submit' ]); ?>"
                                   value="<?php echo esc_attr($args[ 'label_submit' ]); ?>"/>
                            <?php comment_id_fields($post_id); ?>
                        </div>
                        <?php do_action('comment_form', $post_id); ?>
                    </form>
                <?php } ?>
            </div><!-- #respond -->
            <?php do_action('comment_form_after'); ?>
        <?php } else { ?>
            <?php do_action('comment_form_comments_closed'); ?>
        <?php } ?>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Extend user contact
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('creptaam_extend_user_contact')) :
    function creptaam_extend_user_contact( $creptaam_user_contact) {
        
        $creptaam_user_contact['facebook_profile'] = esc_html__('Facebook Profile URL', 'tt-pl-textdomain');
        $creptaam_user_contact['twitter_profile'] = esc_html__('Twitter Profile URL', 'tt-pl-textdomain');
        $creptaam_user_contact['google_profile'] = esc_html__('Google Profile URL', 'tt-pl-textdomain');
        $creptaam_user_contact['linkedin_profile'] = esc_html__('Linkedin Profile URL', 'tt-pl-textdomain');
        $creptaam_user_contact['instagram_profile'] = esc_html__('Instagram Profile URL', 'tt-pl-textdomain');
        
        return $creptaam_user_contact;
    }

    add_filter( 'user_contactmethods', 'creptaam_extend_user_contact');

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Set post view on single page
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_put_post_view_function' ) ) :

    function creptaam_put_post_view_function( $contents ) {
        if ( function_exists( 'creptaam_set_post_views' ) and is_single() ) {
            creptaam_set_post_views(get_the_ID());
        }

        return $contents;
    }

    add_filter( 'the_content', 'creptaam_put_post_view_function', 9999 );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Marquee price
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_marquee_price' ) ) :

    function creptaam_marquee_price($limit = 20) { 

        $now_ping = "https://api.coinmarketcap.com/v1/ticker/?limit=$limit";

        $now_ping_get = wp_remote_get( esc_url($now_ping), array( 'timeout' => 30 ) );

        if (!is_wp_error( $now_ping_get )) :

            wp_enqueue_style('creptaam-coin-icon');

            $bit_coin_data = json_decode( $now_ping_get['body'] ); ?>
            
            <ul class="creptaam-price-ticker">
                <?php foreach ($bit_coin_data as $value) : ?>
                    <li><span class="creptaam-<?php echo esc_attr($value->id); ?>"></span><?php echo esc_html($value->name); ?>(<?php echo esc_html($value->symbol); ?>) $<?php echo esc_html($value->price_usd); ?><?php $updown = $value->percent_change_24h; ?>
                        <span class="updown-percentage <?php echo esc_attr($updown > 0 ? 'price-up' : 'price-down')?>">
                            <?php if ($updown > 0) : ?>
                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                            <?php else : ?>
                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                            <?php endif; ?>
                            <?php echo esc_html($value->percent_change_24h); ?>%
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif;
    return;
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Header short price
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_header_short_price' ) ) :

    function creptaam_header_short_price($limit = 2, $carousel = false) {

        $slider_wrap = $slider_item = "";
    	$now_ping = "https://api.coinmarketcap.com/v1/ticker/?limit=$limit";

        $now_ping_get = wp_remote_get( esc_url($now_ping), array( 'timeout' => 30 ) );

        if (!is_wp_error( $now_ping_get )) :

            $bit_coin_data = json_decode( $now_ping_get['body'] ); ?>
            
            <?php if ($carousel == true): 
                $slider_wrap = "swiper-wrapper";
                $slider_item = "swiper-slide"; ?>
                
                <div class="creptaam-coin-list">
                <div class="swiper-nav-next"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-nav-prev"><i class="fa fa-angle-left"></i></div>

            <?php endif; ?>
            
    			<ul class="header-short-list <?php echo esc_attr($slider_wrap); ?>">
    	            <?php foreach ($bit_coin_data as $value) : ?>
                        <?php $updown = $value->percent_change_24h; ?>

    					<li class="<?php echo esc_attr($slider_item) ?> <?php echo esc_attr($updown > 0 ? 'price-up' : 'price-down')?>"><?php echo esc_html($value->symbol); ?>/<?php esc_html_e('USD', 'tt-pl-textdomain');?>

                            <span class="price-changes">
                                (<?php echo ($updown > 0 ? '&#43;' : ''); ?><?php echo $updown; ?>&#37;)
                            </span>

    						<span class="short-list-price">$<?php echo esc_html($value->price_usd); ?>
                                <?php echo ($updown > 0 ? '<i class="fa fa-caret-up"></i>' : '<i class="fa fa-caret-down"></i>'); ?>
                            </span>
                        </li>
    	            <?php endforeach; ?>
                </ul>
            <?php if ($carousel == true): ?>
            </div>
            <?php endif;
        endif;
    return;
	}
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Post share
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'creptaam_post_share' ) ) :

    function creptaam_post_share() { 

        ob_start(); ?>
        
        <div class="post-share tt-animate btt">
            <ul class="list-inline">

                <?php if ( creptaam_option( 'tt-share-button', 'facebook', true ) ) : ?>
                    <!--Facebook-->
                    <li>
                        <a class="facebook" href="//www.facebook.com/sharer.php?u=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;t=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Facebook!', 'creptaam' ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                <?php endif; ?>

                <?php if ( creptaam_option( 'tt-share-button', 'twitter', true ) ) : ?>
                    <!--Twitter-->
                    <li>
                        <a class="twitter" href="//twitter.com/home?status=<?php echo rawurlencode( sprintf( esc_html__( 'Reading: %s', 'creptaam' ), get_the_permalink() ) ) ?>" title="<?php esc_html_e( 'Share on Twitter!', 'creptaam' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                <?php endif; ?>

                <?php if ( creptaam_option( 'tt-share-button', 'google', true ) ) : ?>
                    <!--Google Plus-->
                    <li>
                        <a class="google-plus" href="//plus.google.com/share?url=<?php echo rawurlencode( get_the_permalink() ) ?>" title="<?php esc_html_e( 'Share on Google+!', 'creptaam' ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                    </li>
                <?php endif; ?>

                <?php if ( creptaam_option( 'tt-share-button', 'linkedin', true ) ) : ?>
                    <!--Linkedin-->
                    <li>
                        <a class="linkedin" href="//www.linkedin.com/shareArticle?url=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;mini=true&amp;title=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Linkedin!', 'creptaam' ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div> <!-- .post-share -->

    <?php echo ob_get_clean();
}
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Author social icon
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('creptaam_author_social_icon')) :
    function creptaam_author_social_icon() {
        ob_start();

        $user_url = get_the_author_meta('user_url'); 
        $facebook_profile = get_the_author_meta( 'facebook_profile' );
        $twitter_profile = get_the_author_meta( 'twitter_profile' );
        $google_profile = get_the_author_meta( 'google_profile' );
        $linkedin_profile = get_the_author_meta( 'linkedin_profile' );
        $github_profile = get_the_author_meta( 'github_profile' );

        if ($user_url || $facebook_profile || $twitter_profile || $google_profile || $linkedin_profile || $github_profile): ?>
            <div class="social-link author-links tt-animate btt">
                <ul class="list-inline">
                    <?php 
                        
                        if ($user_url) : ?>
                            <li class="website"><a href="<?php echo esc_url($user_url); ?>" target="_blank"><i class="fa fa-globe"></i></a></li>
                        <?php endif;

                        if ( $facebook_profile) : ?>
                            <li class="facebook"><a href="<?php echo esc_url($facebook_profile); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <?php endif;

                        if ( $twitter_profile ) : ?>
                            <li class="twitter"><a href="<?php echo esc_url($twitter_profile); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <?php endif;

                        if ( $google_profile ) : ?>
                            <li class="google-plus"><a href="<?php echo esc_url($google_profile); ?>" rel="author" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <?php endif;

                        if ( $linkedin_profile ) : ?>
                            <li class="linkedin"><a href="<?php echo esc_url($linkedin_profile); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <?php endif;
                    ?>
                </ul>
            </div> <!-- .author-links -->
        <?php endif;

        echo ob_get_clean();
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Remove script and style type attribute
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
add_filter('style_loader_tag', 'creptaam_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'creptaam_remove_type_attr', 10, 2);

function creptaam_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Remove demo mode active/deactive option
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function creptaam_remove_redux_demo_mode() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'creptaam_remove_redux_demo_mode');