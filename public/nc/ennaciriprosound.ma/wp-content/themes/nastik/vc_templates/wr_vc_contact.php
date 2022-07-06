<?php

$args = array(
		'iconclass'=>'',
		'title'=>'',
		'link_type'=>'',
		'url'=>'',
		'url_text'=>'',
		'iconclass'=>'fal fa-compass',
		
		
);

extract(shortcode_atts($args, $atts));

$html = '';
$html .= '<li>';
$html .= '<i class="'.$iconclass.'"></i>';
$html .= '<h4>'.$title.'</h4>';
$html .= '<div class="clearfix"></div>';
if($url != ""){
if($link_type == "st2"){
$html .= '<a href="mailto:'.$url.'" class="contact-link">'.$url.'</a>';
} else if($link_type == "st3"){
$html .= '<a href="callto:'.$url.'" class="contact-link">'.$url.'</a>';
} else {
$html .= '<a href="'.$url.'" class="contact-link">'.$url_text.'</a>';
		  }
}
$html .= '</li>';


 
echo $html;