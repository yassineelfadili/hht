<?php

$args = array(
			'class'=>'',
			'id'=>'',
			'image'=>'',
			'big_title'=>'',
			'small_title'=>'',
			'button_text'=>'',
			'button_url'=>'',
			'button_target'=>'',
			'button_ajax_load'=>'noajax',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html='';
		$dot="'";
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
		};
		$html .= '<div class="main-about fl-wrap">';
		if($small_title != ""){
		$html .= '<h5>'.$small_title.'</h5>';
		}
		if($big_title != ""){
		$html .= '<h2>'.do_shortcode($big_title).'</h2>';
		}
		$html .= '<div class="main-about-text-area">';
		$html .= ''.do_shortcode($content).'';
		$html .= '</div>';
		if($button_url != ""){
		$html .= '<a href="'.$button_url.'" class="btn '.$button_ajax_load.'  fl-btn color-bg"'; 
		if($button_ajax_load == "noajax"){
		$html .= 'target="'.$link_target_opt.'"';
		}
		$html .= '>'.$button_text.'</a>';
		}
		$html .= '</div>';
		


echo $html;