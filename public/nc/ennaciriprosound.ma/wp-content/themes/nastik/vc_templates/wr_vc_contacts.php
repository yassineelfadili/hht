<?php

$args = array(
    	'data_class'=>'',
    	'data_title'=>'',
    	'data_content'=>'',
    	'animate'=>'fadeInUp',
		
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="contacts-wrap fl-wrap '.$data_class.'">';
		$html .= '<ul>';
		$html .= do_shortcode($content);
		$html .= '</ul>';
		$html .= '</div>';
		
		


echo $html;