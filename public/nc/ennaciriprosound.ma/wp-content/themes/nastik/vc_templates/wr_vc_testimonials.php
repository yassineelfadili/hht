<?php

$args = array(
    	'class'=>'',
		'boxsize'=>'',
		'boxheight'=>'',
		'title'=>'',
		'iconclass'=>'',
		'autoplay'=>'false',
		'slider_speed'=>'1400',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		$html .= '<div class="testimonilas-carousel-wrap fl-wrap '.$class.'">';
		$html .= '<div class="tcb-wrap">
                    <div class="tcb  tcb-prev"><i class="fas fa-caret-left"></i></div>
                    <div class="tcb  tcb-next"><i class="fas fa-caret-right"></i></div>
                  </div>';
			$html .= '<div class="testimonilas-carousel fl-wrap">';
			$html .= '<div class="swiper-container" data-slider-speed="'.esc_attr($slider_speed).'" data-slider-play="'.esc_attr($autoplay).'">';
			$html .= '<div class="swiper-wrapper">';
			$html .= do_shortcode($content);
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
		$html .= '<div class="tc-pagination"></div>';
		$html .= '</div>';
	


echo $html;