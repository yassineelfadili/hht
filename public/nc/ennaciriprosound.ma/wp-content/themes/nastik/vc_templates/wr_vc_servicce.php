<?php

$args = array(
		
		'title'=>'',
		'sub_title1'=>'',
		'sub_title2'=>'',
		'sub_title3'=>'',
		'data_percent'=>'',
		'image'=>'',
		'price_title'=>'',
		'price_data'=>'',
		'icon_class'=>'fal fa-desktop',
		'url'=>'',
		'button_target'=>'_self',
		
);

extract(shortcode_atts($args, $atts));
if(is_numeric($image)) {
$nastik_service_image = wp_get_attachment_image_src( $image, 'nastik_port_gallery_header' );
$nastik_service_title = get_the_title( $image );
} else {
$nastik_service_image = $image;
$nastik_service_title = $image;
}

$html = '';
$html .= '<div class="col-md-4">';
if($url != '') {
$html .= '<a href="'.esc_url($url).'" target="'.esc_attr($button_target).'">';
}
$html .= '<div class="content-inner fl-wrap">';
	$html .= '<div class="content-front">';
		$html .= '<div class="cf-inner">';
		$html .= '<div class="bg "  data-bg="'.$nastik_service_image[0].'"></div>';
		$html .= '<div class="overlay"></div>';
		$html .= '<div class="inner">';
		$html .= '<h2>'.esc_html($title).'</h2>';
		$html .= '<ul>';
		if($sub_title1 != '') {
		$html .= '<li>'.esc_html($sub_title1).'</li>';
		}
		if($sub_title2 != '') {
		$html .= '<li>'.esc_html($sub_title2).'</li>';
		}
		if($sub_title3 != '') {
		$html .= '<li>'.esc_html($sub_title3).'</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
	$html .= '</div>';
	$html .= '<div class="content-back">';
		$html .= '<div class="cf-inner">';
		$html .= '<div class="inner">';
		$html .= '<div class="dec-icon"><i class="'.esc_attr($icon_class).'"></i></div>';
		$html .= '<div class="service-block-p">'.$content.'</div>';
		if($price_data != '') {
		$html .= '<div class="serv-price-wrap">';
		if($price_title != '') {
		$html .= '<span>'.esc_html($price_title).'</span>';
		}
		$html .= ''.esc_html($price_data).'</div>';
		}
		$html .= '</div>';
		$html .= '</div>';
	$html .= '</div>';
$html .= '</div>';
if($url != '') {
$html .= '</a>';
}
$html .= '</div>';
  
    


echo $html;