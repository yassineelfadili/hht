<?php

$args = array(
		'iconname'=>'',
		'image'=>'',
		'companyname'=>'',
		'clientname'=>'',
		'button_text'=>'View',
		'button_url'=>'#',
		'button_target'=>'',
		
);

extract(shortcode_atts($args, $atts));

$html = '';
$solonick_image = '';
$solonick_alt = '';
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

		if(is_numeric($image)) {
            $nastik_image = wp_get_attachment_url( $image );
            $nastik_title = get_the_title( $image );
        }else {
            $nastik_image = $image;
            $nastik_title = $image;
        }


$html .= '<li class="swiper-slide"><a href="'.$button_url.'" target="'.$link_target_opt.'"><img src="'.$nastik_image.'" alt="'.$nastik_title.'" class="respimg"></a></li>';
$html .= '<!-- end client-item -->';

 
echo $html;