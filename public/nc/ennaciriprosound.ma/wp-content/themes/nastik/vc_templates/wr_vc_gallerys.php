<?php

$args = array(
    	'page_name'=>'',
		'boxsize'=>'',
		'boxheight'=>'',
		'title'=>'',
		'iconclass'=>'',
		'class'=>'',
		'post_pagination'=>'',
		'post_show_before_loadmore'=>'400000',
		'load_btn_text_translate'=>'Load More',
);

$html = "";

extract(shortcode_atts($args, $atts));

$html .= '<div class="container-after  fl-wrap  " >';
$html .= '<div class="gallery-items min-pad  lightgallery   fl-wrap  bot-element '.$class.'" data-load-item="'.esc_attr($post_show_before_loadmore).'" data-button-text="'.esc_attr($load_btn_text_translate).'">';
$html .= do_shortcode($content);
$html .= '</div>';
$html .= '</div>';
		
		


echo $html;