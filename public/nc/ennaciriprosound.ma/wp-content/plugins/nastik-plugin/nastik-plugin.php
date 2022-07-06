<?php
/*
Plugin Name: Nastik Plugin
Plugin URI: https://webredox.net
Description: Declares a plugin that will create Page Settins, VC addons & Custom Post Type
Version: 3.7
Author: webRedox
Author URI: https://webredox.net
License: GPLv2
*/
define('NASTIK_PLUGIN_PATH', plugin_dir_path(__FILE__));
include (NASTIK_PLUGIN_PATH .'metaboxes.php');
include (NASTIK_PLUGIN_PATH .'meta-box-group.php');
include (NASTIK_PLUGIN_PATH .'meta-box-show-hide.php');
include (NASTIK_PLUGIN_PATH .'meta-box-conditional-logic.php');

function nastik_register_metabox_list() {
require (NASTIK_PLUGIN_PATH .'/plugin-update-checker/plugin-update-checker.php');
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://nastik.webredox.net/pluginupdate/details.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'nastik-plugin'
);
}
add_action('init', 'nastik_register_metabox_list');

global $nastik_options;


if( ! function_exists( 'portfolio_post_types' ) ) {
    function portfolio_post_types() {

        register_post_type(
            'portfolio',
            array(
                'labels' => array(
                    'name'          => __( 'Portfolios', 'portfolio' ),
                    'singular_name' => __( 'Portfolio', 'portfolio' ),
                    'add_new'       => __( 'Add New', 'portfolio' ),
                    'add_new_item'  => __( 'Add New Portfolio', 'portfolio' ),
                    'edit'          => __( 'Edit', 'portfolio' ),
                    'edit_item'     => __( 'Edit Portfolio', 'portfolio' ),
                    'new_item'      => __( 'New Portfolio', 'portfolio' ),
                    'view'          => __( 'View Portfolio', 'portfolio' ),
                    'view_item'     => __( 'View Portfolio', 'portfolio' ),
                    'search_items'  => __( 'Search Portfolio', 'portfolio' ),
                    'not_found'     => __( 'No Portfolio item found', 'portfolio' ),
                    'not_found_in_trash' => __( 'No portfolio item found in Trash', 'portfolio' ),
                    'parent'        => __( 'Parent Portfolio', 'portfolio' ),
                ),
                
                'description'       => __( 'Create a Portfolio.', 'portfolio' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
				'capability_type' => 'post',
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => false,
                'query_var'         => true,
				'menu_icon' => 'dashicons-portfolio',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true, 'show_admin_column' => true,));
        
        

    }
}

add_action( 'init', 'portfolio_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');



if( ! function_exists( 'timeline_post_types' ) ) {
    function timeline_post_types() {

        register_post_type(
            'timeline',
            array(
                'labels' => array(
                    'name'          => __( 'Timelines', 'slider' ),
                    'singular_name' => __( 'Timeline', 'slider' ),
                    'add_new'       => __( 'Add New', 'slider' ),
                    'add_new_item'  => __( 'Add New Timeline', 'slider' ),
                    'edit'          => __( 'Edit', 'slider' ),
                    'edit_item'     => __( 'Edit Timeline', 'slider' ),
                    'new_item'      => __( 'New Timeline', 'slider' ),
                    'view'          => __( 'View Timeline', 'slider' ),
                    'view_item'     => __( 'View Timeline', 'slider' ),
                    'search_items'  => __( 'Search Timeline', 'slider' ),
                    'not_found'     => __( 'No timeline item found', 'slider' ),
                    'not_found_in_trash' => __( 'No timeline item found in Trash', 'slider' ),
                    'parent'        => __( 'Parent Timeline', 'slider' ),
                ),
                
                'description'       => __( 'Create a Timeline.', 'slider' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
				'capability_type' => 'post',
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => false,
                'query_var'         => true,
				'menu_icon' => 'dashicons-backup',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('timeline_category', 'timeline', array('hierarchical' => true, 'label' => 'Timeline Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true, 'show_admin_column' => true,));
        
        

    }
}

add_action( 'init', 'timeline_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');



if( ! function_exists( 'service_post_types' ) ) {
    function service_post_types() {

        register_post_type(
            'service',
            array(
                'labels' => array(
                    'name'          => __( 'Services', 'slider' ),
                    'singular_name' => __( 'Service', 'slider' ),
                    'add_new'       => __( 'Add New', 'slider' ),
                    'add_new_item'  => __( 'Add New Service', 'slider' ),
                    'edit'          => __( 'Edit', 'slider' ),
                    'edit_item'     => __( 'Edit Service', 'slider' ),
                    'new_item'      => __( 'New Service', 'slider' ),
                    'view'          => __( 'View Service', 'slider' ),
                    'view_item'     => __( 'View Service', 'slider' ),
                    'search_items'  => __( 'Search Service', 'slider' ),
                    'not_found'     => __( 'No service item found', 'slider' ),
                    'not_found_in_trash' => __( 'No service item found in Trash', 'slider' ),
                    'parent'        => __( 'Parent Service', 'slider' ),
                ),
                
                'description'       => __( 'Create a Service.', 'slider' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
				'capability_type' => 'post',
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => false,
                'query_var'         => true,
				'menu_icon' => 'dashicons-megaphone',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('service_category', 'service', array('hierarchical' => true, 'label' => 'Service Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true, 'show_admin_column' => true,));
        
        

    }
}

add_action( 'init', 'service_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');

add_filter('widget_title', 'do_shortcode');
add_shortcode('span', 'wpse_shortcode_span');
function wpse_shortcode_span( $attr, $content ){ return '<span>'. $content . '</span>'; }
add_shortcode('br', 'wpse_shortcode_br');
function wpse_shortcode_br( $attr ){ return '<br>'; }
function nastik_social_media_icons( $nastik_contactmethods ) {
    // Add social media
    
    $nastik_contactmethods['twitter'] = 'Twitter';
    $nastik_contactmethods['facebook'] = 'Facebook';
    $nastik_contactmethods['instagram'] = 'Instagram';
    $nastik_contactmethods['tumblr'] = 'Tumblr';
    $nastik_contactmethods['pinterest'] = 'Pinterest';
    $nastik_contactmethods['youtube'] = 'Youtube';

    return $nastik_contactmethods;
}
add_filter('user_contactmethods','nastik_social_media_icons',10,1);
/* ==========================================
   Add featured image column to admin panel post list page
========================================== */
add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

function add_img_column($columns) {
	$columns['img'] = 'Thumbnail';
	return $columns;
}

function manage_img_column($column_name, $post_id) {
	if( $column_name == 'img' ) {
		echo get_the_post_thumbnail( $post_id, array( 80, 60) ); return true; // 80, 60 is for image size.
	}
}

// Change columns order
add_filter('manage_posts_columns', 'column_order');
function column_order($columns) {
  $n_columns = array();
  $move = 'img'; // what to move
  $before = 'title'; // move before this
  foreach($columns as $key => $value) {
    if ($key==$before){
      $n_columns[$move] = $move;
    }
      $n_columns[$key] = $value;
  }
  return $n_columns;
}

// Set columns width
function set_column_width() { ?>
	<style type="text/css">
		/*	Class ".column-img" is for image column */
		.edit-php .fixed .column-img { 
			width: 100px;
		}
	</style>
<?php }
add_action( 'admin_enqueue_scripts', 'set_column_width' );


/**
*
*
*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');

if( !function_exists('symple_fix_shortcodes') ) {
	function symple_fix_shortcodes($content){   
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'symple_fix_shortcodes');
}
// image
if(! function_exists('nastik_image_shortcode')){
	function nastik_image_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			
			'image'=>'',
			
			), $atts) );
		if(is_numeric($image)) {
            $nastik_image = wp_get_attachment_url( $image );
            $nastik_title = get_the_title( $image );
        }else {
            $nastik_image = $image;
            $nastik_title = $image;
        }
		
		$html='';
		$dot="'";
		
		
		
		$html .= '<div class="dec-img  fl-wrap">';
		$html .= '<img src="'.$nastik_image.'" class="respimg" alt="'.$nastik_title.'">';
		$html .= '</div>';
		
				
		return $html;
	}
	add_shortcode('nastik_image', 'nastik_image_shortcode');
}

// Service
if(! function_exists('nastik_service_shortcode')){
	function nastik_service_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'postcount'=>'3',
			'postoffset'=>'',
			'categoryname'=>'',
			'details_page'=>'st1',
			'excerpt_type'=>'st1',
			
			), $atts) );
		
		
		$html='';
		
		
		$html .= '<div class="cards-wrap fl-wrap">';
		$html .= '<div class="row">';
		global $post;
		$paged=(get_query_var('paged'))?get_query_var('paged'):1;
		$loop = new WP_Query( array( 'post_type' => 'service','service_category'=> $categoryname, 'posts_per_page'=> $postcount, 'post_status' => 'publish, future', 'offset' => $postoffset) );
		while ( $loop->have_posts() ) : $loop->the_post();
		if (has_post_thumbnail( $post->ID ) ):
		$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'nastik_port_gallery_header' );
		$html .= '<div class="col-md-4">';
		if($details_page != "st2"){
		$html .= '<a href="'.get_the_permalink().'">';
		}
		$html .= '<div class="content-inner fl-wrap">';
			$html .= '<div class="content-front">';
				$html .= '<div class="cf-inner">';
				$html .= '<div class="bg "  data-bg="'.$nastik_image[0].'"></div>';
				$html .= '<div class="overlay"></div>';
					$html .= '<div class="inner">';
					$html .= '<h2>'.get_the_title().'</h2>';
					if (( get_post_meta($post->ID,'rnr_ns_service_extra_info_opt_enable',true))=='st2'):
					$html .= '<ul>';
					$nastik_car_slide_opt = rwmb_meta( 'rnr_ns_service_extra_info_opt' );
					if ( ! empty( $nastik_car_slide_opt ) ) {
					foreach ( $nastik_car_slide_opt as $nastik_car_slide_opts ) {
					$nastik_se_t = isset( $nastik_car_slide_opts['rnr_ns_service_info_item'] ) ? $nastik_car_slide_opts['rnr_ns_service_info_item'] : '';
					if ( !empty( $nastik_se_t ) ) {
					$html .= '<li>'.$nastik_se_t.'</li>';
					}
					} }
					$html .= '</ul>';
					endif;
					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';
			
		$html .= '<div class="content-back">';
			$html .= '<div class="cf-inner">';
			$html .= '<div class="inner">';
			if (( get_post_meta($post->ID,'rnr_ns_service_tab_i',true))):
			$html .= '<div class="dec-icon"><i class="'.get_post_meta($post->ID,'rnr_ns_service_tab_i',true).'"></i></div>';
			endif;
			$content_short = get_the_content();
			if($excerpt_type == "st2"){
			$html .= '<p>'.wp_trim_words(get_the_content(), 17).'</p>';
			}
			else {
			$html .= '<p>'.get_the_excerpt().'</p>';
			}
			if (( get_post_meta($post->ID,'rnr_ns_service_price',true))):
			if (( get_post_meta($post->ID,'rnr_ns_service_price_tans',true))):
			$price_tans =''.get_post_meta($post->ID,'rnr_ns_service_price_tans',true).'';
			else :
			$price_tans ='Price';
			endif;
			$html .= '<div class="serv-price-wrap"><span>'.$price_tans.'</span>'.get_post_meta($post->ID,'rnr_ns_service_price',true).'</div>';
			endif;
			$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
		
		$html .= '</div>';
		if($details_page != "st2"){
		$html .= '</a>';
		}
		$html .= '</div>';
		endif;
		endwhile;
		wp_reset_postdata();
		$html .= '</div>';
		$html .= '</div>';
		
				
		return $html;
	}
	add_shortcode('nastik_service', 'nastik_service_shortcode');
}
// Call To Action
if(! function_exists('nastik_call_to_action1_shortcode')){
	function nastik_call_to_action1_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'Ready to order your project ? Visit my contacts page :',
			'button_text'=>'Contacts',
			'button_url'=>'',
			'button_target'=>'',
			'link_type'=>'',
			
			
			), $atts) );
		
		
		$html='';
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
		
		$link_type_opt ='';
		if($link_type != "st2"){
		$link_type_opt .='ajax';
		}
		
		
		$html .= '<div class="srv-link-text fl-wrap">';
		$html .= '<h4>'.$title.'</h4>';
		if($button_url != ""){
		$html .= '<a href="'.$button_url.'" class="btn float-btn '.$link_type_opt.'  color-bg" target="'.$link_target_opt.'">'.$button_text.'</a>';
		}
		$html .= '</div>';
		
		
				
		return $html;
	}
	add_shortcode('nastik_call_to_action1', 'nastik_call_to_action1_shortcode');
}

// feature 
if(! function_exists('nastik_feature_shortcode')){
	function nastik_feature_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'image'=>'',
			'iconclass'=>'',
			'title'=>'',
			'number'=>'',
			
			
			
			), $atts) );
		
		
		$html='';
		$dot="'";
		
		$html .= '<div class="process-wrap fl-wrap">';
		$html .= '<ul>';
		$html .= '<li>';
		if($iconclass != ""){
		$html .= '<div class="time-line-icon">
                  <i class="'.$iconclass.'"></i>
                  </div>';
		}
		
		$html .= '<h4>'.$title.'</h4>';
		$html .= '<div class="process-details">';
		$html .= ''.$content.'   ';
		$html .= '</div>';
		if($number != ""){
		$html .= '<span class="process-numder">'.$number.'.</span>';
		}
		$html .= '</li>';
		$html .= '</ul>';
		$html .= '</div>';
		
				
		return $html;
	}
	add_shortcode('nastik_feature', 'nastik_feature_shortcode');
}

// video
if(! function_exists('nastik_video_shortcode')){
	function nastik_video_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'videotype'=>'',
			'vimeovideo'=>'https://vimeo.com/110234211',
			'image'=>'',
			'popvideo'=>'',
			'subtitle'=>'',
			
			
			), $atts) );
			
			if(is_numeric($image)) {
            $nastik_image = wp_get_attachment_url( $image );
            $nastik_title = get_the_title( $image );
			}else {
            $nastik_image = $image;
            $nastik_title = $image;
			}
		
		
		$html='';
		$dot="'";
		
		$html .= '<div class="video-box dec-img fl-wrap">';
		$html .= '<img src="'.$nastik_image.'" class="respimg" alt="'.$nastik_title.'">';
		$html .= '<a class="video-box-btn image-popup" href="'.$vimeovideo.'"><i class="fas fa-play" aria-hidden="true"></i></a>';
		$html .= '</div>';
		
		
				
		return $html;
	}
	add_shortcode('nastik_videos', 'nastik_video_shortcode');
}


// Timeline
if(! function_exists('nastik_timeline_shortcode')){
	function nastik_timeline_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'postcount'=>'',
			'postoffset'=>'',
			'categoryname'=>'',
			'button_text'=>'Download',
			'button_url'=>'',
			'button_target'=>'',
			
			
			), $atts) );
		
		$dot="'";
		$parim="";
		$html='';
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
		
		$html .= '<div class="custom-inner-holder">';
		global $post;
		$paged=(get_query_var('paged'))?get_query_var('paged'):1;
		$loop = new WP_Query( array( 'post_type' => 'timeline','timeline_category'=> $categoryname, 'posts_per_page'=> $postcount, 'post_status' => 'publish, future', 'offset' => $postoffset) );
		while ( $loop->have_posts() ) : $loop->the_post();
		$html .= '<div class="custom-inner ns-custom-inner">';
		$html .= '<div class="row">';
			$html .= '<div class="col-md-4">';
			$html .= '<div class="resum-header workres">';
			if (( get_post_meta($post->ID,'rnr_ns_timeline_icon',true))):
			$html .= '<i class="'.get_post_meta($post->ID,'rnr_ns_timeline_icon',true).'"></i>';
			else:
			$html .= '<i class="fa fa-briefcase"></i>';
			endif;
			$html .= '<h3> '.get_the_title().'</h3>';
			if (( get_post_meta($post->ID,'rnr_ns_timline_sub_timeline',true))):
			$html .= '<span>  '.get_post_meta($post->ID,'rnr_ns_timline_sub_timeline',true).' </span>';
			endif;
			$html .= '</div>';
			$html .= '</div>';
		$html .= '<div class="col-md-8">';
		$html .= '<div class="resum-content fl-wrap">';
		$html .= ''.get_the_content().'';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
			
		endwhile;
		wp_reset_postdata();
		
		if($button_url != ""){
		$html .= '<div class="col-md-8 col-md-offset-4">';
		$html .= '<a href="'.$button_url.'" class="btn color-bg  fl-btn" target="'.$link_target_opt.'">'.$button_text.'</a>';
		$html .= '</div>';
		}
		$html .= '</div>';
		
		
		
				
		return $html;
	}
	add_shortcode('nastik_timeline', 'nastik_timeline_shortcode');
}


// 
if(! function_exists('nastik_team_shortcode')){
	function nastik_team_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'image'=>'',
			'title'=>'',
			'designation'=>'',
			'behance'=>'',
			'facebook'=>'',
			'gplus'=>'',
			'twitter'=>'',
			'youtube'=>'',
			'vimeo'=>'',
			'pinterest'=>'',
			'linkedin'=>'',
			'instagram'=>'',
			'xing'=>'',
			'mail'=>'',
			'vkontakte'=>'',
			'custom_url'=>'',
				

			), $atts) );
			if(is_numeric($image)) {
            $nastik_team_image = wp_get_attachment_image_src( $image, 'nastik_portfolio_image_gallery_car' );
			}else {
            $nastik_team_image = $image;
			}

		$html ='';
		
		
		$html .= '<div class="team-box">';
		$html .= '<div class="team-photo">';
		$html .= '<div class="overlay"></div>';
		if(is_numeric($image)) {
		$html .= '<img src="'.$nastik_team_image[0].'" alt="'.$title.'" class="respimg">';
		}
		if($mail != '') {
		$html .= '<a href="mailto:'.$mail.'" class="team-contact_btn color-bg"><i class="fal fa-envelope"></i></a>';
		}
		$html .= '</div>';
		$html .= '<div class="team-info">';
		if($custom_url != '') {
		$html .= '<h3><a href="'.$custom_url.'">'.$title.'</a></h3>';
		}
		else {
		$html .= '<h3>'.$title.'</h3>';
		}
		$html .= '<h4>'.$designation.'</h4>';
		$html .= '<p>'.$content.'  </p>';
		$html .= '</div>';
		$html .= '<ul class="team-social">';
		if($facebook != '') {
		$html .= '<li><a href="'.$facebook.'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
		}
		if($instagram != '') {
		$html .= '<li><a href="'.$instagram.'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
		}
		if($twitter != '') {
		$html .= '<li><a href="'.$twitter.'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
		}
		if($vkontakte != '') {
		$html .= '<li><a href="'.$vkontakte.'" target="_blank"><i class="fab fa-vk"></i></a></li>';
		}
		if($gplus != '') {
		$html .= '<li><a href="'.$gplus.'" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>';
		}
		if($vimeo != '') {
		$html .= '<li><a href="'.$vimeo.'" target="_blank"><i class="fab fa-vimeo"></i></a></li>';
		}
		if($linkedin != '') {
		$html .= '<li><a href="'.$linkedin.'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
		}
		if($youtube != '') {
		$html .= '<li><a href="'.$youtube.'" target="_blank"><i class="fab fa-youtube-square"></i></a></li>';
		}
		if($xing != '') {
		$html .= '<li><a href="'.$xing.'" target="_blank"><i class="fab fa-xing"></i></a></li>';
		}
		if($pinterest != '') {
		$html .= '<li><a href="'.$pinterest.'" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>';
		}
		if($behance != '') {
		$html .= '<li><a href="'.$behance.'" target="_blank"><i class="fab fa-behance"></i></a></li>';
		}
		$html .= '</ul>';
		
		
		
		
		
		$html .= '</div>';
		
		
		
		

				
		return $html ;
	}
	add_shortcode('nastik_team', 'nastik_team_shortcode');
}


// Google Map
if(! function_exists('nastik_vc_map_shortcode')){
	function nastik_vc_map_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'image'=>'',
			'latitude'=>'',
			'animate'=>'',
			'address'=>'',

			), $atts) );
		if(is_numeric($image)) {
            $nastik_image = wp_get_attachment_url( $image );
        } else {
            $nastik_image = $image;
        }
		
		$html='';
		$dot="'";
		if(is_numeric($image)) {
		$html .= '<div class="map-container fl-wrap">
                  <div id="map-single" class="map" data-latlog="['.$latitude.']" data-popuptext="'.$address.'" data-popupicon="'.$nastik_image.'"></div>
                  </div>';
		}
				
		return $html;
	}
	add_shortcode('nastik_vc_map', 'nastik_vc_map_shortcode');
}


?>