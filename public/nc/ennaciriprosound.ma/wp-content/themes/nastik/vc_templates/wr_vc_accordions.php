<?php

$args = array(
    	'class'=>'',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="accordion mar-top '.$class.'">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		
		


echo $html;