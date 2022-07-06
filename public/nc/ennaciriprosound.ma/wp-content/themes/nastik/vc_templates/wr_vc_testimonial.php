<?php

$args = array(
		'iconname'=>'',
		'title'=>'',
		'image'=>'',
		'companyname'=>'',
		'clientname'=>'',
		'button_text'=>'Via Twitter',
		'button_url'=>'',
		'button_target'=>'',
		'testimonial_number'=>'',
		
);

extract(shortcode_atts($args, $atts));
		if(is_numeric($image)) {
            $nastik_image = wp_get_attachment_url( $image );
            $nastik_title = get_the_title( $image );
        }else {
            $nastik_image = $image;
            $nastik_title = $image;
        }
$html = '';
$link_target_opt ='';
		if($button_target == "_blank"){
		$link_target_opt .='_blank';
		}
		else if($button_target == "_parent"){
		$link_target_opt .='_parent';
		}
		else if($button_target == "_top"){
		$link_target_opt .='_top';
		}
		else {
		$link_target_opt .='_self';
		}

    $html .= '<div class="swiper-slide">';
    $html .= '<div class="testi-item fl-wrap">';
	if(is_numeric($image)) {
    $html .= '<div class="testi-avatar"><img src="'.$nastik_image.'" alt="'.$nastik_title.'"></div>';
	}
	if($testimonial_number != ""){
    $html .= '<span class="testi-number">.'.$testimonial_number.'</span>';
	}
    $html .= '<div class="testimonilas-text fl-wrap">';
    $html .= '<h3>'.do_shortcode($clientname).'</h3>';
    $html .= '<p>"'.$content.' "</p>';
	if($button_url != ""){
    $html .= '<a href="'.$button_url.'" class="testi-link" target="'.$link_target_opt.'">'.$button_text.'</a>';
	}
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
  
    


echo $html;