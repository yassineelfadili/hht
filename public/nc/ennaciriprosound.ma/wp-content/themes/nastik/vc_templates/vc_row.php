<?php
$output = $el_class = '';
extract(shortcode_atts(array(
	'el_class' => '',
	'row_type' => 'sec1',
	'use_as_box' => '',
	'nastik_sec_title' => '',
	'nastik_sec_number' => '',
	'nastik_sec_dectiption' => '',
	'enabletitle' => '',
	'enableseparator' => '',
	'sec_padding_bottom' => '',
	'scrollrow' => 'st1',
	'sec_padding_top' => '',
	'type' => 'full_width',
	'scroll_id' => '',
	'enable_top_box' => '',
	'enable_bottom_box' => '',
	'enable_corner_effect' => '',
	'enable_container' => '',
	

), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');
//title section
$nastik_section_number_opt="";
if ($enabletitle == "st2"){

if($nastik_sec_number != ''){
$nastik_section_number_opt =  '<div class="sec-number">'.$nastik_sec_number.'.</div>';
}
}
else {

}
// separator
if ($enableseparator == "st2"){
$nastik_separator ='';
}
else {
$nastik_separator ='<div class="clearfix"></div><div class="section-separator bot-element"><span class="fl-wrap"></span></div>';
}
//enable scroll function
if ($scrollrow == "st2"){
$nastik_sec_scroll ="hidden-section scroll-con-sec";
}
else {
$nastik_sec_scroll ="";
}
//scrolll ID
$nastik_scroll_id = "";
if($scroll_id != ""){
	$nastik_scroll_id = 'id="'.$scroll_id.'"';
}
//top shadow
$nastik_section_top_box_opt="";
if ($enable_top_box == "st2"){
$nastik_section_top_box_opt ='<div class="col-wc_dec"></div>';
}

//bottom shadow
$nastik_section_bottom_box_opt="";
if ($enable_bottom_box == "st2"){
$nastik_section_bottom_box_opt ='<div class="col-wc_dec col-wc_dec2"></div>';
}
else if ($enable_bottom_box == "st3"){
$nastik_section_bottom_box_opt ='<div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>';
}
else {

}

//enable container
if ($enable_container == "st2"){
$nastik_enable_container ="container-disable";
}
else {
$nastik_enable_container ="container";
}
// padding
$nastik_padding_custom="";
$nastik_padding_custom_top="";
$nastik_padding_custom_bottom="";

if($sec_padding_top != ""){
$nastik_padding_custom_top='padding-top:'.$sec_padding_top.'px!important;';
}
if($sec_padding_bottom != ""){
$nastik_padding_custom_bottom='padding-bottom:'.$sec_padding_bottom.'px!important;"';
}
$nastik_padding_custom= 'style="'.$nastik_padding_custom_top.' '.$nastik_padding_custom_bottom.'"';
//corner effect
$nastik_enable_corner_opt="";
if ($enable_corner_effect == "st2"){
$nastik_enable_corner_opt ='<div class="hero-corner"></div>';
}

if($row_type == 'sec2'){
    $output .='<div class="clear"></div>';
	$output .='<section '.$nastik_scroll_id.' class="dark-bg bot-element" '.$nastik_padding_custom.'>';
	$output .='<div class="'.$nastik_enable_container.'">';
	$output .='<div class="row">';
}
else {
	$output .='<div class="clear"></div>';
	$output .='<section '.$nastik_scroll_id.' class="'.$nastik_sec_scroll.' vc-section bot-element" '.$nastik_padding_custom.'>';
	$output .=''.$nastik_section_top_box_opt.'';
	$output .='<div class="'.$nastik_enable_container.'">';
	if ($enabletitle == "st2"){
	$output .='<div class="section-title fl-wrap">';
	if($nastik_sec_title != ''){
	$output .='<h3> '.$nastik_sec_title.'</h3>';
	}
	if($nastik_sec_dectiption != ''){
	$output .='<p>'.$nastik_sec_dectiption.'  </p>';
	}
	$output .='</div>';
	}
	else {}
	$output .='<div class="row">';
	
}

if($row_type != 'content_menu'){
	$output .= wpb_js_remove_wpautop($content);
}

if($row_type == 'sec2'){
	$output .= '</div></div>'.$nastik_enable_corner_opt.'</section>'.$this->endBlockComment('row');
}
else {
	$output .= '</div>'.$nastik_section_number_opt.' </div>'.$nastik_section_bottom_box_opt.'</section>'.$nastik_separator.''.$this->endBlockComment('row');
}
echo $output;