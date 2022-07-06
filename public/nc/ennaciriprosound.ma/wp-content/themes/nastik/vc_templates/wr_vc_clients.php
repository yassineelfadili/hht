<?php

$args = array(
    	'page_name'=>'',
		'boxsize'=>'',
		'boxheight'=>'',
		'title'=>'',
		'iconclass'=>'',
		'class'=>'',
		'autoplay'=>'false',
		'slider_speed'=>'1400',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="fl-wrap '.$class.'">';
		$html .= '<div class="container">';
		$html .= '<div class="client-list-slider fl-wrap ">';
		$html .= '<div class=" swiper-container" data-slider-speed="'.esc_attr($slider_speed).'" data-slider-play="'.esc_attr($autoplay).'">';
		$html .= '<ul class="swiper-wrapper client-list client-list-white" >';
		$html .= do_shortcode($content);
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="tc-pagination2"></div>';
		$html .= '</div>';
		$html .= '</div>';
		


echo $html;