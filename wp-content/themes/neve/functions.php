<?php
/**
 * Neve functions.php file
 *
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      17/08/2018
 *
 * @package Neve
 */

define( 'NEVE_VERSION', '2.7.5' );
define( 'NEVE_INC_DIR', trailingslashit( get_template_directory() ) . 'inc/' );
define( 'NEVE_ASSETS_URL', trailingslashit( get_template_directory_uri() ) . 'assets/' );

if ( ! defined( 'NEVE_DEBUG' ) ) {
	define( 'NEVE_DEBUG', false );
}
define( 'NEVE_NEW_DYNAMIC_STYLE', true );
/**
 * Themeisle SDK filter.
 *
 * @param array $products products array.
 *
 * @return array
 */
function neve_filter_sdk( $products ) {
	$products[] = get_template_directory() . '/style.css';

	return $products;
}

add_filter( 'themeisle_sdk_products', 'neve_filter_sdk' );

add_filter( 'themeisle_onboarding_phprequired_text', 'neve_get_php_notice_text' );

/**
 * Get php version notice text.
 *
 * @return string
 */
function neve_get_php_notice_text() {
	$message = sprintf(
	/* translators: %s message to upgrade PHP to the latest version */
		__( "Hey, we've noticed that you're running an outdated version of PHP which is no longer supported. Make sure your site is fast and secure, by %s. Neve's minimal requirement is PHP 5.4.0.", 'neve' ),
		sprintf(
		/* translators: %s message to upgrade PHP to the latest version */
			'<a href="https://wordpress.org/support/upgrade-php/">%s</a>',
			__( 'upgrading PHP to the latest version', 'neve' )
		)
	);

	return wp_kses_post( $message );
}

/**
 * Adds notice for PHP < 5.3.29 hosts.
 */
function neve_php_support() {
	printf( '<div class="error"><p>%1$s</p></div>', neve_get_php_notice_text() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

if ( version_compare( PHP_VERSION, '5.3.29' ) <= 0 ) {
	/**
	 * Add notice for PHP upgrade.
	 */
	add_filter( 'template_include', '__return_null', 99 );
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	add_action( 'admin_notices', 'neve_php_support' );

	return;
}

require_once 'globals/migrations.php';
require_once 'globals/utilities.php';
require_once 'globals/hooks.php';
require_once 'globals/sanitize-functions.php';
require_once get_template_directory() . '/start.php';


require_once get_template_directory() . '/header-footer-grid/loader.php';



add_shortcode('product_shortcode','product_shortcode_function');

function product_shortcode_function( $atts ) {
	$shortcode_output =  '<div class="product block-top height-block">';
	$shortcode_output .=  '<div class="col-12">';
    $shortcode_output .=  '<h1 class="product-line-title">Hemp-Derived Product Line </h1>';
    $shortcode_output .=  '</div>';
	$args = array( 'post_type' => 'products', 'posts_per_page' => -1 );
	$categories= array();
	$the_query = new WP_Query( $args );
	$i = 1;
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) : $the_query->the_post(); 
			$content = get_post_meta( get_the_ID(),'content_p', true );
			$info = get_post_meta( get_the_ID(),'info_p', true );
			$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail_size' );
			$url = $src[0];
			if($i % 2 == 0){ 
					$e = "2"; 
					$arrorw = '../wp-content/themes/neve/img/arrow-white.png';
				} 
				else{ 
					$e = "1"; 
					$arrorw = '../wp-content/themes/neve/img/arrow.png';
				} 
			$shortcode_output .=  '<div class="row item-'.$e.'">';
			$shortcode_output .=     '<div class="row mr-0 ml-0 wrap-container">';
			$shortcode_output .=       '<div class="col-xs-12 item">';
			$shortcode_output .=         '<div class="col-xs-3 item-left">';
			$shortcode_output .=           '<a href="'.get_permalink( get_the_ID() ).'"><img class="item-image" src="'.$url.'" alt="img-item-1"></a>';
			$shortcode_output .=         '</div>';
			$shortcode_output .=         '<div class="col-xs-9 item-right">';
			$shortcode_output .=           '<div class="col-xs-12 item-name">';
			$shortcode_output .=             '<span>'.get_the_title(get_the_ID()).'</span>';
			$shortcode_output .=           '</div>';
			$shortcode_output .=           '<div class="col-xs-12 item-info">';
			$shortcode_output .=             '<span class="item-info-text">'.$content.'</span>';
			$shortcode_output .=            '<div class="item-info-blue">';
			$shortcode_output .=              '<div class="blue-2">';
			$shortcode_output .=                '<div class="text">'.$info.'</div>';
			$shortcode_output .=              '</div>';
			$shortcode_output .=            '</div>';
			$shortcode_output .=            '<a href="'.get_permalink( get_the_ID() ).'"><img class="arrow" src="'.$arrorw.'"></a>';
			$shortcode_output .=          '</div>';
			$shortcode_output .=        '</div>';
			$shortcode_output .=      '</div>';
			$shortcode_output .=    '</div>';
			$shortcode_output .=  '</div>';
			++$i;
		endwhile;
		wp_reset_postdata(); 
	}
	$shortcode_output .=  '</div>';
    return $shortcode_output;
}
function wpb_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Copy Right', 'wpb' ),
		'id' => 'copy-right',
		'description' => __( '', 'wpb' ),
		'before_widget' => '<div  class="footer">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	
	}

add_action( 'widgets_init', 'wpb_widgets_init' );
