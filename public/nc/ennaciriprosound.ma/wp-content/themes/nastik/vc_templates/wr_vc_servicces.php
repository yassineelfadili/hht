<?php

$args = array(
    	'class'=>'',
		'corner_effect'=>'st1',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="cards-wrap fl-wrap">';
		$html .= '<div class="srow">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		$html .= '</div>';
		


echo $html;