<?php

$args = array(
    	'class'=>'',
		'data_color'=>'#F68338',
		'sec_title'=>'',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		if($sec_title != ""){
		$html .= '<div class="fl-wrap small-section-title">';
		$html .= '<h3>'.$sec_title.'</h3>';
		$html .= '</div>';
		}
		$html .= '<div class="clearfix"></div>';
		$html .= '<div class="piechart-holder animaper" data-skcolor="'.$data_color.'">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		


echo $html;