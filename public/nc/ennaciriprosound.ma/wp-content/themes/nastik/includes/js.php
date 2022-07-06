<?php

if( !function_exists ('nastik_enqueue_scripts') ) :
	function nastik_enqueue_scripts() {
	$nastik_options = get_option('nastik');
	$nastik_protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_script('nastik-plugins', (NASTIK_THEME_URL . '/includes/js/plugins.js'), array('jquery'), '1.0',true);
	wp_enqueue_script('nastik-scripts', (NASTIK_THEME_URL . '/includes/js/scripts.js'), array('jquery'), '1.0',true);
	if (nastik_AfterSetupTheme::return_thme_option('enableajax')=='st1'){
	wp_enqueue_script('nastik-ajax', (NASTIK_THEME_URL . '/includes/js/disableajx.js'), array('jquery'), '1.0',true);
	}
	else{
	wp_enqueue_script('nastik-title-replace', (NASTIK_THEME_URL . '/includes/js/title-replace.js'), array('jquery'), '1.0',true);
	}
	wp_enqueue_script( 'comment-reply' );
}
	add_action('wp_enqueue_scripts', 'nastik_enqueue_scripts');
endif;