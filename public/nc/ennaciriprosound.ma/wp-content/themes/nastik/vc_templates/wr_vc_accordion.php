<?php

$args = array(
		
		'title'=>'Add Ttitle',
		'accordion_active'=>'dact-accordion',
		
		
);

extract(shortcode_atts($args, $atts));

$html = '';
$zonar_sec_active = '';
if($accordion_active == "act-accordion"){
$zonar_sec_active = 'visible';
}
$html .= '<a class="toggle act-accordion '.esc_attr($accordion_active).'" href="#">'.esc_html($title).' <span></span></a>';
$html .= '<div class="accordion-inner '.esc_attr($zonar_sec_active).'">';
$html .= ''.do_shortcode($content).'';
$html .= '</div>';


 
echo $html;