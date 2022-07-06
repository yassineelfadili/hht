<?php
global $nastik_options;
$nastik_options = get_option('nastik');
function nastik_style() {
	//home
	wp_enqueue_style('nastik-main', (NASTIK_THEME_URL . '/style.css'));
	wp_enqueue_style('nastik-reset', (NASTIK_THEME_URL . '/includes/css/reset.css'));
	wp_enqueue_style('nastik-plugins', (NASTIK_THEME_URL . '/includes/css/plugins.css'));
	wp_enqueue_style('nastik-style', (NASTIK_THEME_URL . '/includes/css/style.css'));
	wp_enqueue_style('nastik-color', (NASTIK_THEME_URL . '/includes/css/color.css'));
	wp_enqueue_style('nastik-yourstyle', (NASTIK_THEME_URL . '/includes/css/yourstyle.css'));
	wp_enqueue_style('js_composer_front-css');
}
add_action('wp_enqueue_scripts', 'nastik_style');

function nastik_fonts_url() {
    $nastik_font_url = '';
    
    if ( 'off' !== _x( 'on', 'Mukta font: on or off', 'nastik' ) ) {
        $nastik_font_url = add_query_arg( 'family','Mukta:300,400,500,600,700,800|Teko:400,500,600,700&display=swap' , "//fonts.googleapis.com/css" );
    }
    return $nastik_font_url;
}

function nastik_scripts() {
    wp_enqueue_style( 'nastik_fonts', nastik_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'nastik_scripts' );

function nastik_enqueue_custom_admin_style() {
	wp_enqueue_style( 'nastik_wp_admin_css', (NASTIK_THEME_URL . '/includes/css/admin-style.css'), false, '1.0.0' );

}
add_action( 'admin_enqueue_scripts', 'nastik_enqueue_custom_admin_style' );