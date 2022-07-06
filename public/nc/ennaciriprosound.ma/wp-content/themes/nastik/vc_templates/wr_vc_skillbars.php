<?php

$args = array(
    	'title'=>'',
		
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		if($title != ""){
		$html .= '<div class="fl-wrap small-section-title">';
		$html .= '<h3>'.$title.'</h3>';
		$html .= '</div>';
		}
		$html .= '<div class="clearfix"></div>';
		$html .= '<div class="skillbar-box animaper">';
		$html .= '<div class="pr-bg pr-bg-white"></div>';
		$html .= do_shortcode($content);
		$html .= '</div>';
		


echo $html;