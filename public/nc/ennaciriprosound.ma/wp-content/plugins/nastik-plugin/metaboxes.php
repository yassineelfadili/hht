<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'rnr_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;


/* ----------------------------------------------------- */
// Page Sections Metaboxes
/* ----------------------------------------------------- */


/* ----------------------------------------------------- */
// Revolution Slider
/* ----------------------------------------------------- */

$revolutionslider = array();
$revolutionslider[0] = 'No Slider';

if(class_exists('RevSlider')){
    $slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
	}
}

/* Page Section Background Settings */

$grid_array = array('2 Columns','3 Columns','4 Columns');

$pagebg_type_array = array(
	'image' => 'Image',
	'gradient' => 'Gradient',
	'color' => 'Color'
);

/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'ajax_page_type',
	'title' => 'Ajax Loading',
	'pages' => array( 'page', 'post', 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
	
	array(
			'name'		=> 'Disable Ajax Page Loading',
			'id'		=> $prefix . 'open_page',
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
			'desc' =>'If you would like to use WP Bakery default elements please disable Ajax loading.',
		),	

			
	)
);

/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'blog_page_type',
	'title' => 'Blog Page Template Function',
	// Show this meta box for posts matched below conditions
        'show'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'blog.php'),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Blog Layout', 'dogmawp' ),
			'id'   => $prefix . 'wrblog-pagetype',
			'desc'  => __( 'Working only Blog Page Template', 'dogmawp' ),
			'type'     => 'image_select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => __( get_template_directory_uri().'/includes/metaboxes/img/wr-page-right.png', 'gorge' ),
				'st1' => esc_attr__( get_template_directory_uri().'/includes/metaboxes/img/wr-page-full.png', 'dogmawp' ),
				'st2' => esc_attr__( get_template_directory_uri().'/includes/metaboxes/img/wr-page-left.png', 'dogmawp' ),
				
				
			),
			'desc'  => esc_attr__( '', 'dogmawp' ),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => __( 'Select an Option', 'dogmawp' ),
		),
		
		array(
				'name'       => esc_attr__( 'Number Of Post Show', 'blps' ),
				'id'         => $prefix . 'blog-post-show',
				'desc'		=> '',
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '', 'blps' ),
				'suffix'     => __( ' Posts', 'blps' ),
				'js_options' => array(
					'min'  => 1,
					'max'  => 400,
					'step' => 1,
				),
			),	

			array(
			'name'		=> 'Include Category',
			'id'		=> $prefix . 'blog-post-cat',
			'desc'		=> 'Enter category name ex: web design, web development (Optional).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

			
	)
);


/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'home_page_type',
	'title' => 'Default Page Template Function',
	'hide'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'one-page.php', 'portfolio.php', 'music.php', 'service.php', 'blog.php', 'coming-soon.php'),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Default Page Type', 'nastik' ),
			'id'   => $prefix . 'wr_pagetype',
			'desc'  => esc_attr__( 'Select Default Page Type.', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => esc_attr__( 'Select an Option', 'nastik' ),
				'st1' => esc_attr__( 'Page Top Header', 'nastik' ),
				'st3' => esc_attr__( 'Page Top Carousel', 'nastik' ),
				'st2' => esc_attr__( 'Left Block', 'nastik' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Container', 'nastik' ),
			'id'   => $prefix . 'wr_pagetype_container',
			'desc'  => __( 'Disable/ Enable Page Container. <br> Working Only Default Page Type Option Default.', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'nastik' ),
				'st2' => esc_attr__( 'Disable', 'nastik' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Top Block Style', 'nastik' ),
			'id'   => $prefix . 'wr_pagetype_top_block',
			'desc'  => esc_html__( 'Disable/ Enable Page Top Block Style.', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'nastik' ),
				'st2' => esc_attr__( 'Disable', 'nastik' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Bottom Block Style', 'nastik' ),
			'id'   => $prefix . 'wr_pagetype_bottom_block',
			'desc'  => esc_html__( 'Disable/ Enable Page Bottom Block Style.', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'nastik' ),
				'st2' => esc_attr__( 'Disable', 'nastik' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Section Line Effect', 'nastik' ),
			'id'   => $prefix . 'wr_pagetype_sec_line_opt',
			'desc'  => __( 'Disable/ Enable Page Section Line Effect.<br>Working Only Default Page Option Page Top Header.', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				
				'st1' => esc_attr__( 'Enable', 'nastik' ),
				'st2' => esc_attr__( 'Disable', 'nastik' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		
		
		
	)
);


/* ----------------------------------------------------- */
/* page Header Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'th_default_page_header_opt',
	'title' => 'Default Page header Options.',
	'hide'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'one-page.php', 'portfolio.php', 'music.php', 'blog.php',  'service.php', 'coming-soon.php'),
	),
	
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_page_header_title_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
			'visible' => array( 'rnr_wr_pagetype', '!=', 'st3' )
		),
		
		array(
			'name'		=> 'Description',
			'id'		=> $prefix . 'ns_page_header_sub_title_opt',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'Working Only Default Page Option Page Top Header.',
			'visible' => array( 'rnr_wr_pagetype', '!=', 'st3' )
		),
		
		
		array(
			'name'		=> 'Scroll Down to discover',
			'id'		=> $prefix . 'ns_page_header_translate_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'visible' => array( 'rnr_wr_pagetype', '!=', 'st3' )
		   ),
		   
		  array(
			'name'		=> 'Back To Home',
			'id'		=> $prefix . 'ns_page_header_translate_opt2',
			'desc'		=> 'Translate Option. <br>Working Only Default Page Option Default.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'visible' => array( 'rnr_wr_pagetype', '!=', 'st3' )
		   ),
		   
		   array(
				'id'		=> $prefix . 'so_page_po_gallery',
				'name'        => 'Carousel',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Carousel Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					array(
					'name'		=> 'Upload Images',
					'id'		=> $prefix . 'page-image-popu',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '1000',
					'desc'		=> 'Upload same size images for details page style Slider 2. <br> <b>Upload only 1 image if you added a popup video URL.</b>',
					),
					
					array(
					'name'		=> 'Popup Video URL',
					'id'		=> $prefix . 'ns_page_gallery_video_opt',
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'desc'		=> 'Youtube/ Vimeo Video URL. <br> Not working on Portfolio details style Slider & Slider 2.',
					),
					
				
				),
				'hidden' => array( 'rnr_wr_pagetype', '!=', 'st3' )
			),
			
			// SELECT BOX
			array(
				'name'     => esc_attr__( 'Carousel Slider Image Infomation', 'solonick' ),
				'id'   => $prefix . 'ns_page_car_info_enable_opt',
				'desc'  => esc_attr__( 'Show/Hide Image Title and Caption.', 'solonick' ),
				'type'     => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'st1' => esc_attr__( 'Disable', 'solonick' ),
					'st2' => esc_attr__( 'Enable', 'solonick' ),
					
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'st1',
				'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
				'hidden' => array( 'rnr_wr_pagetype', '!=', 'st3' )
			),
			
			array(
				'name'		=> 'Info',
				'id'		=> $prefix . 'ns_page_car_info_translate_opt',
				'desc'		=> 'Translate Option.',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'hidden' => array( 'rnr_ns_page_car_info_enable_opt', '!=', 'st2' ),
			),
		
	)
);

/* ----------------------------------------------------- */
/* blog page Header Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'th_blog_page_header_opt',
	'title' => 'Blog Page Header Options.',
	'show'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'blog.php'),
	),
	
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_blog_header_title_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		array(
			'name'		=> 'Description',
			'id'		=> $prefix . 'ns_blog_header_sub_title_opt',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'Working Only Sidebar Style.',
		),
		
		
	)
);


/* ----------------------------------------------------- */
/* page Header Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'th_default_page_call_to_opt',
	'title' => 'Page Call To Action Options.',
	'hide'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'one-page.php', 'portfolio.php', 'music.php', 'service.php', 'blog.php', 'coming-soon.php'),
	),
	
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		
		
		array(
			'name'		=> 'Call To Action Title',
			'id'		=> $prefix . 'ns_page_call_to_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_page_call_to_button',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Ajax Loading', 'solonick' ),
			'id'   => $prefix . 'ns_page_call_to_button_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_page_call_to_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
	)
);


/* ----------------------------------------------------- */
/* portfolio Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'scroll_page_intro_opt',
	'title' => 'Scrolling Page Template Options.',
	// Show this meta box for posts matched below conditions
    'show'   => array(
    // List of page templates (used for page only). Array. Optional.
    'template'    => array( 'one-page.php'),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
	// SELECT BOX
		array(
			'name'     => esc_attr__( 'Intro Style', 'solonick' ),
			'id'   => $prefix . 'wr_intro_sc_opt',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => esc_attr__( 'Select an Option', 'solonick' ),
				'st1' => esc_attr__( 'Parallax Image', 'solonick' ),
				'st2' => esc_attr__( 'Slider', 'solonick' ),
				'st3' => esc_attr__( 'Carousel', 'solonick' ),
				'st4' => esc_attr__( 'Impulse Image', 'solonick' ),
				'st5' => esc_attr__( 'Slideshow', 'solonick' ),
				'st6' => esc_attr__( 'Mp4 Video', 'solonick' ),
				'st7' => esc_attr__( 'Youtube Video', 'solonick' ),
				'st8' => esc_attr__( 'Vimeo Video', 'solonick' ),
				'st9' => esc_attr__( 'Revolution Slider', 'solonick' ),
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		
	
	)
);

/* ----------------------------------------------------- */
/* intro parallax image
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_parallax_image_solonick',
	'title' => 'Parallax Image Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'  => 'st1',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Background Image',
			'id'		=> $prefix . 'ns_intro_back_parallax_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Background Image',
		),
		
		// title tag
		array(
			'name'     => esc_attr__( 'Title Tag', 'nastik' ),
			'id'   => $prefix . 'wr_intro_parallax_image_title_tag',
			'desc'  => esc_attr__( '', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'h1' => esc_attr__( 'h1', 'nastik' ),
					'h2' => esc_attr__( 'h2', 'nastik' ),
					'h3' => esc_attr__( 'h3', 'nastik' ),
					'h4' => esc_attr__( 'h4', 'nastik' ),
					'h5' => esc_attr__( 'h5', 'nastik' ),
					'h6' => esc_attr__( 'h6', 'nastik' ),
				),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'h1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_intro_parallax_image_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Independent &lt;span&gt; Digital  Designer &lt;/span&gt;',
		),
		
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'ns_intro_parallax_image_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Type', 'solonick' ),
			'id'   => $prefix . 'ns_intro_parallax_image_button_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Scrollable', 'solonick' ),
				'st2' => esc_attr__( 'External URL', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_intro_parallax_image_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'If button type scrollable then use section id. e.x: #about',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_intro_parallax_image_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Corner Border', 'solonick' ),
			'id'   => $prefix . 'ns_intro_parallax_image_corner_border',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Left Side Text Slider', 'solonick' ),
			'id'   => $prefix . 'ns_intro_parallax_image_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'ns_intro_parallax_image_rightside_con_opt',
				'name'        => 'Left Side Text Slider',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Left Side Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'ns_intro_parallax_image_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_ns_intro_parallax_image_right_side_con', '!=', 'st2' )
			),
			
			array(
			'name'		=> 'Scroll Button Text',
			'id'		=> $prefix . 'ns_intro_parallax_image_scroll_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Button will be visible after add text.<br>e.x: Scroll down  to discover',
			),
		
	)
);


/* ----------------------------------------------------- */
/* intro Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_slider_nastik',
	'title' => 'Slider Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt' => 'st2',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		// title tag
		array(
			'name'     => esc_attr__( 'Slider Image Direction', 'nastik' ),
			'id'   => $prefix . 'wr_slider_direction',
			'desc'  => esc_attr__( '', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Vertical', 'nastik' ),
				'st2' => esc_attr__( 'Horizontal', 'nastik' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'h1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		array(
				'name'		=> 'Slider Speed',
				'id'		=> $prefix . 'ns_intro_slider_speed',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Default: 1400',
		),
		
		array(
				'name'		=> 'Slide Delay',
				'id'		=> $prefix . 'ns_intro_slider_delay',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Default: 4000',
		),
		
		array(
				'id'		=> $prefix . 'ns_intro_slider_gallery_slider',
				'name'        => 'Slider Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
					'name'		=> 'Slide Image',
					'id'		=> $prefix . 'ns_intro_slider_gallery_slider_image',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '1',
					'desc'		=> '',
					),
					
					// title tag
					array(
						'name'     => esc_attr__( 'Title Tag', 'nastik' ),
						'id'   => $prefix . 'wr_slider_title_tag',
						'desc'  => esc_attr__( '', 'nastik' ),
						'type'     => 'select_advanced',
						// Array of 'value' => 'Label' pairs for select box
						'options'  => array(
							'h1' => esc_attr__( 'h1', 'nastik' ),
							'h2' => esc_attr__( 'h2', 'nastik' ),
							'h3' => esc_attr__( 'h3', 'nastik' ),
							'h4' => esc_attr__( 'h4', 'nastik' ),
							'h5' => esc_attr__( 'h5', 'nastik' ),
							'h6' => esc_attr__( 'h6', 'nastik' ),
						),
						// Select multiple values, optional. Default is false.
						'multiple'    => false,
						'std'         => 'h1',
						'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
					),
					
					array(
						'name'		=> 'Title',
						'id'		=> $prefix . 'ns_intro_slider_gallery_slider_title',
						'clone'		=> false,
						'type'		=> 'textarea',
						'std'		=> '',
						'desc'		=> 'For marking text e.x: Independent &lt;span&gt; Digital  Designer &lt;/span&gt;',
					),
					
					array(
						'name'		=> 'Sub Title',
						'id'		=> $prefix . 'ns_intro_slider_gallery_slider_sub_title',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					array(
						'name'		=> 'Left Side Text',
						'id'		=> $prefix . 'ns_intro_slider_gallery_slider_left_con',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional. <br> e.x: Web Design',
					),
					
					array(
						'name'		=> 'Button Text',
						'id'		=> $prefix . 'ns_intro_slider_gallery_slider_button_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					array(
						'name'		=> 'Button URL',
						'id'		=> $prefix . 'ns_intro_slider_gallery_slider_button_url',
						'clone'		=> false,
						'type'		=> 'tex',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					
					// SELECT BOX
				array(
					'name'     => esc_attr__( 'Button Ajax Load', 'solonick' ),
					'id'   => $prefix . 'ns_intro_slider_button_ajax_type',
					'desc'  => esc_attr__( '', 'solonick' ),
					'type'     => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'  => array(
						'st1' => esc_attr__( 'Enable', 'solonick' ),
						'st2' => esc_attr__( 'Disable', 'solonick' ),
					),
					// Select multiple values, optional. Default is false.
					'multiple'    => false,
					'std'         => 'st1',
					'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
					
				),
				
				// SELECT BOX
				array(
					'name'     => esc_attr__( 'Button Target', 'solonick' ),
					'id'   => $prefix . 'ns_intro_slider_button_target_type',
					'desc'  => esc_attr__( '', 'solonick' ),
					'type'     => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'  => array(
						'st1' => esc_attr__( 'Self', 'solonick' ),
						'st2' => esc_attr__( 'Blank', 'solonick' ),
					),
					// Select multiple values, optional. Default is false.
					'multiple'    => false,
					'std'         => 'st1',
					'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
					'hidden' => array( 'rnr_ns_intro_slider_button_ajax_type', '!=', 'st2' )
				),
				
				),
			),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Corner Border', 'solonick' ),
			'id'   => $prefix . 'ns_intro_slider_corner_border',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
			),
		
			array(
			'name'		=> 'Scroll Button Text',
			'id'		=> $prefix . 'ns_intro_slider_scroll_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Button will be visible after add text.<br>e.x: Scroll down  to discover',
			),
	)
);


/* ----------------------------------------------------- */
/* intro Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_carousel_nastik',
	'title' => 'Carousel Slider Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'  => 'st3',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		// carousel type
		array(
		'name'     => esc_attr__( 'Carousel Type', 'nastik' ),
		'id'   => $prefix . 'ns_home_intro_car_new_opt',
		'desc'  => esc_attr__( '', 'nastik' ),
		'type'     => 'select_advanced',
		// Array of 'value' => 'Label' pairs for select box
		'options'  => array(
			'st0' => esc_attr__( 'Select an Option', 'nastik' ),
			'st1' => esc_attr__( 'Portfolio Post', 'nastik' ),
			'st2' => esc_attr__( 'Custom Carousel', 'nastik' ),
		),
		// Select multiple values, optional. Default is false.
		'multiple'    => false,
		'std'         => 'st0',
		'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
	)
);

/* ----------------------------------------------------- */
/* Intro Fullscreen Carousel
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_full_car_content1_opt',
	'title' => 'Portfolio Carousel Options.',
	// Show this meta box for posts matched below conditions
    'show'   => array(
    // by metabox select
    'input_value'   => array(
                '#rnr_ns_home_intro_car_new_opt' => 'st1',
     ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
					
				array(
					'name'		=> 'Include Portfolio Category',
					'id'		=> $prefix . 'ns_intro_car_po',
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'desc'		=> 'Enter category name ex: web design, web development (Optional).',
					),
					
					array(
					'name'       => esc_attr__( 'Number Of Post Show', 'blps' ),
					'id'         => $prefix . 'ns_intro_car_po_co',
					'desc'		=> '',
					'type'       => 'slider',
					// Text labels displayed before and after value
					'prefix'     => __( '', 'blps' ),
					'suffix'     => __( ' Posts', 'blps' ),
					'js_options' => array(
						'min'  => 1,
						'max'  => 400,
						'step' => 1,
					),
				),
				
				array(
				'name'		=> 'Post Offset',
				'id'		=> $prefix . 'ns_intro_opt_car_postoffset',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Optional.',
				),
			
	)
);


/* ----------------------------------------------------- */
/* Intro Fullscreen Carousel
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_full_car_content2_opt',
	'title' => 'Custom Carousel Options',
	// Show this meta box for posts matched below conditions
    'show'   => array(
    // by metabox select
    'input_value'   => array(
                '#rnr_ns_home_intro_car_new_opt' => 'st2',
            ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
					
					
			array(
				'id'		=> $prefix . 'md_po_car_cus_gallery',
				'name'        => 'Carousel Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Carousel Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
					'name'		=> 'Carousel Image',
					'id'		=> $prefix . 'md_po_car_cus_gallery_img',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '1',
					'desc'		=> '',
					),
					
					
					array(
						'name'		=> 'Title',
						'id'		=> $prefix . 'md_car_cus_gallery_intro_title_opt',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> '',
					),
					
					array(
						'name'		=> 'Sub Title',
						'id'		=> $prefix . 'md_car_cus_gallery_intro_sub_title_opt',
						'clone'		=> false,
						'type'		=> 'textarea',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
					array(
						'name'		=> 'Custom URL',
						'id'		=> $prefix . 'md_car_cus_intro_buttonurl_opt',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'Optional.',
					),
				
				),
			),
			
	)
);

/* ----------------------------------------------------- */
/* intro impulse image
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_impulse_image_nastik',
	'title' => 'Impulse Image Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'  => 'st4',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Background Image',
			'id'		=> $prefix . 'ns_intro_back_impulse_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Background Image',
		),
		
		// title tag
		array(
			'name'     => esc_attr__( 'Title Tag', 'nastik' ),
			'id'   => $prefix . 'wr_impulse_title_tag',
			'desc'  => esc_attr__( '', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'h1' => esc_attr__( 'h1', 'nastik' ),
					'h2' => esc_attr__( 'h2', 'nastik' ),
					'h3' => esc_attr__( 'h3', 'nastik' ),
					'h4' => esc_attr__( 'h4', 'nastik' ),
					'h5' => esc_attr__( 'h5', 'nastik' ),
					'h6' => esc_attr__( 'h6', 'nastik' ),
				),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'h1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_intro_impulse_image_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'ns_intro_impulse_image_sub_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Type', 'solonick' ),
			'id'   => $prefix . 'ns_intro_impulse_image_button_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Scrollable', 'solonick' ),
				'st2' => esc_attr__( 'External URL', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_intro_impulse_image_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'If button type scrollable then use section id. e.x: #about',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_intro_impulse_image_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Corner Border', 'solonick' ),
			'id'   => $prefix . 'ns_intro_impulse_image_corner_border',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		
			array(
			'name'		=> 'Scroll Button Text',
			'id'		=> $prefix . 'ns_intro_impulse_image_scroll_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Button will be visible after add text.<br>e.x: Scroll down  to discover',
			),
		
	)
);


/* ----------------------------------------------------- */
/* intro parallax image
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_slideshow_image_nastik',
	'title' => 'Slideshow Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'              => 'st5',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
				'name'		=> 'Slider Speed',
				'id'		=> $prefix . 'ns_intro_slideshow_speed',
				'clone'		=> false,
				'type'		=> 'textfiled',
				'std'		=> '',
				'desc'		=> 'Default: 1400',
		),
		
		array(
				'name'		=> 'Slide Delay',
				'id'		=> $prefix . 'ns_intro_slideshow_delay',
				'clone'		=> false,
				'type'		=> 'textfiled',
				'std'		=> '',
				'desc'		=> 'Default: 2500',
		),
		
		array(
			'name'		=> 'Slideshow Images',
			'id'		=> $prefix . 'ns_intro_back_slideshow_image',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1000',
			'desc'		=> 'Upload Images',
		),
		
		// title tag
		array(
			'name'     => esc_attr__( 'Title Tag', 'nastik' ),
			'id'   => $prefix . 'wr_slideshow_image_title_tag',
			'desc'  => esc_attr__( '', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'h1' => esc_attr__( 'h1', 'nastik' ),
					'h2' => esc_attr__( 'h2', 'nastik' ),
					'h3' => esc_attr__( 'h3', 'nastik' ),
					'h4' => esc_attr__( 'h4', 'nastik' ),
					'h5' => esc_attr__( 'h5', 'nastik' ),
					'h6' => esc_attr__( 'h6', 'nastik' ),
				),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'h1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_intro_slideshow_image_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Independent &lt;span&gt; Digital  Designer &lt;/span&gt;',
		),
		
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'ns_intro_slideshow_image_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Type', 'solonick' ),
			'id'   => $prefix . 'ns_intro_slideshow_image_button_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Scrollable', 'solonick' ),
				'st2' => esc_attr__( 'External URL', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Target', 'solonick' ),
			'id'   => $prefix . 'ns_intro_slideshow_button_target_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Self', 'solonick' ),
				'st2' => esc_attr__( 'Blank', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
			'hidden' => array( 'rnr_ns_intro_slideshow_image_button_type', '!=', 'st2' )
		),
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_intro_slideshow_image_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'If button type scrollable then use section id. e.x: #about',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_intro_slideshow_image_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Corner Border', 'solonick' ),
			'id'   => $prefix . 'ns_intro_slideshow_image_corner_border',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Left Side Text Slider', 'solonick' ),
			'id'   => $prefix . 'ns_intro_slideshow_image_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'ns_intro_slideshow_image_rightside_con_opt',
				'name'        => 'Left Side Text Slider',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Left Side Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'ns_intro_slideshow_image_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
				),
				'hidden' => array( 'rnr_ns_intro_slideshow_image_right_side_con', '!=', 'st2' )
			),
			
			array(
			'name'		=> 'Scroll Button Text',
			'id'		=> $prefix . 'ns_intro_slideshow_image_scroll_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Button will be visible after add text.<br>e.x: Scroll down  to discover',
			),
		
	)
);


/* ----------------------------------------------------- */
/* intro mp4 video
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_mp4_image_nastik',
	'title' => 'MP4 Video Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt' => 'st6',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'ns_intro_mp4_video_url',
			'clone'		=> false,
			'type' => 'text',
			'desc'		=> 'e.x: http://nastik.kwst.net/video/2.mp4',
		),
		
		// title tag
		array(
			'name'     => esc_attr__( 'Title Tag', 'nastik' ),
			'id'   => $prefix . 'wr_intro_mp4_video_title_tag',
			'desc'  => esc_attr__( '', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'h1' => esc_attr__( 'h1', 'nastik' ),
					'h2' => esc_attr__( 'h2', 'nastik' ),
					'h3' => esc_attr__( 'h3', 'nastik' ),
					'h4' => esc_attr__( 'h4', 'nastik' ),
					'h5' => esc_attr__( 'h5', 'nastik' ),
					'h6' => esc_attr__( 'h6', 'nastik' ),
				),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'h1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_intro_mp4_video_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Independent &lt;span&gt; Digital  Designer &lt;/span&gt;',
		),
		
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'ns_intro_mp4_video_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Type', 'solonick' ),
			'id'   => $prefix . 'ns_intro_mp4_video_button_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Scrollable', 'solonick' ),
				'st2' => esc_attr__( 'External URL', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_intro_mp4_video_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'If button type scrollable then use section id. e.x: #about',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_intro_mp4_video_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Corner Border', 'solonick' ),
			'id'   => $prefix . 'ns_intro_mp4_video_corner_border',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Left Side Text Slider', 'solonick' ),
			'id'   => $prefix . 'ns_intro_mp4_video_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'ns_intro_mp4_video_rightside_con_opt',
				'name'        => 'Left Side Text Slider',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Left Side Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'ns_intro_mp4_video_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_ns_intro_mp4_video_right_side_con', '!=', 'st2' )
			),
			
			array(
			'name'		=> 'Scroll Button Text',
			'id'		=> $prefix . 'ns_intro_mp4_video_scroll_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Button will be visible after add text.<br>e.x: Scroll down  to discover',
			),
		
	)
);


/* ----------------------------------------------------- */
/* intro youtube video
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_youtube_nastik',
	'title' => 'Youtube Video Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'  => 'st7',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Background Images',
			'id'		=> $prefix . 'ns_intro_back_youtube_video',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Working only mobile device.',
		),
		
		array(
			'name'		=> 'Youtube Video ID',
			'id'		=> $prefix . 'ns_intro_youtube_video_id',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Working only intro style Youtube. <br> ex: Hg5iNVSp2z8',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Video Sound', 'solonick' ),
			'id'   => $prefix . 'ns_intro_youtube_video_sound',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'1' => esc_attr__( 'Mute', 'solonick' ),
				'0' => esc_attr__( 'On', 'solonick' ),
			),
			'std'         => '1',
		),
		// title tag
		array(
			'name'     => esc_attr__( 'Title Tag', 'nastik' ),
			'id'   => $prefix . 'wr_intro_youtube_video_title_tag',
			'desc'  => esc_attr__( '', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'h1' => esc_attr__( 'h1', 'nastik' ),
					'h2' => esc_attr__( 'h2', 'nastik' ),
					'h3' => esc_attr__( 'h3', 'nastik' ),
					'h4' => esc_attr__( 'h4', 'nastik' ),
					'h5' => esc_attr__( 'h5', 'nastik' ),
					'h6' => esc_attr__( 'h6', 'nastik' ),
				),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'h1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_intro_youtube_video_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Independent &lt;span&gt; Digital  Designer &lt;/span&gt;',
		),
		
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'ns_intro_youtube_video_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Type', 'solonick' ),
			'id'   => $prefix . 'ns_intro_youtube_video_button_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Scrollable', 'solonick' ),
				'st2' => esc_attr__( 'External URL', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_intro_youtube_video_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'If button type scrollable then use section id. e.x: #about',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_intro_youtube_video_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Corner Border', 'solonick' ),
			'id'   => $prefix . 'ns_intro_youtube_video_corner_border',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Left Side Text Slider', 'solonick' ),
			'id'   => $prefix . 'ns_intro_youtube_video_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'ns_intro_youtube_video_rightside_con_opt',
				'name'        => 'Left Side Text Slider',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Left Side Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'ns_intro_youtube_video_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_ns_intro_youtube_video_right_side_con', '!=', 'st2' )
			),
			
			array(
			'name'		=> 'Scroll Button Text',
			'id'		=> $prefix . 'ns_intro_youtube_video_scroll_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Button will be visible after add text.<br>e.x: Scroll down  to discover',
			),
		
	)
);

/* ----------------------------------------------------- */
/* intro vimeo video
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_vimeo_nastik',
	'title' => 'Vimeo Video Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'              => 'st8',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Background Images',
			'id'		=> $prefix . 'ns_intro_back_vimeo_video',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'max_file_uploads' => '1',
			'desc'		=> 'Working only mobile device.',
		),
		
		array(
			'name'		=> 'Vimeo Video ID',
			'id'		=> $prefix . 'ns_intro_vimeo_video_id',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'ex: 97871257',
		),
		
		// title tag
		array(
			'name'     => esc_attr__( 'Title Tag', 'nastik' ),
			'id'   => $prefix . 'wr_intro_vimeo_video_title_tag',
			'desc'  => esc_attr__( '', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'h1' => esc_attr__( 'h1', 'nastik' ),
					'h2' => esc_attr__( 'h2', 'nastik' ),
					'h3' => esc_attr__( 'h3', 'nastik' ),
					'h4' => esc_attr__( 'h4', 'nastik' ),
					'h5' => esc_attr__( 'h5', 'nastik' ),
					'h6' => esc_attr__( 'h6', 'nastik' ),
				),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'h1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_intro_vimeo_video_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Independent &lt;span&gt; Digital  Designer &lt;/span&gt;',
		),
		
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'ns_intro_vimeo_video_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Type', 'solonick' ),
			'id'   => $prefix . 'ns_intro_vimeo_video_button_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Scrollable', 'solonick' ),
				'st2' => esc_attr__( 'External URL', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_intro_vimeo_video_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'If button type scrollable then use section id. e.x: #about',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_intro_vimeo_video_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Corner Border', 'solonick' ),
			'id'   => $prefix . 'ns_intro_vimeo_video_corner_border',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Left Side Text Slider', 'solonick' ),
			'id'   => $prefix . 'ns_intro_vimeo_video_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'ns_intro_vimeo_video_rightside_con_opt',
				'name'        => 'Left Side Text Slider',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Left Side Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'ns_intro_vimeo_video_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_ns_intro_vimeo_video_right_side_con', '!=', 'st2' )
			),
			
			array(
			'name'		=> 'Scroll Button Text',
			'id'		=> $prefix . 'ns_intro_vimeo_video_scroll_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Button will be visible after add text.<br>e.x: Scroll down  to discover',
			),
		
	)
);


/* ----------------------------------------------------- */
/* intro parallax image
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'intro_rev_image_solonick',
	'title' => 'Revolution Slider Options.',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_intro_sc_opt'  => 'st9',
    ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Revolution slider Shortcode',
			'id'		=> $prefix . 'ns_rev_shortcode_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: [rev_slider alias="focus-parallax"]',
		),
		
		// title tag
		array(
			'name'     => esc_attr__( 'Title Tag', 'nastik' ),
			'id'   => $prefix . 'wr_intro_rev_image_title_tag',
			'desc'  => esc_attr__( '', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'h1' => esc_attr__( 'h1', 'nastik' ),
					'h2' => esc_attr__( 'h2', 'nastik' ),
					'h3' => esc_attr__( 'h3', 'nastik' ),
					'h4' => esc_attr__( 'h4', 'nastik' ),
					'h5' => esc_attr__( 'h5', 'nastik' ),
					'h6' => esc_attr__( 'h6', 'nastik' ),
				),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'h1',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_intro_rev_image_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'For marking text e.x: Independent &lt;span&gt; Digital  Designer &lt;/span&gt;',
		),
		
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'ns_intro_rev_image_sub_title',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Button Type', 'solonick' ),
			'id'   => $prefix . 'ns_intro_rev_image_button_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Scrollable', 'solonick' ),
				'st2' => esc_attr__( 'External URL', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_intro_rev_image_button_url',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'If button type scrollable then use section id. e.x: #about',
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_intro_rev_image_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Slider Overlay', 'solonick' ),
			'id'   => $prefix . 'ns_intro_rev_image_overlay',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Corner Border', 'solonick' ),
			'id'   => $prefix . 'ns_intro_rev_image_corner_border',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Left Side Text Slider', 'solonick' ),
			'id'   => $prefix . 'ns_intro_rev_image_right_side_con',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
			array(
				'id'		=> $prefix . 'ns_intro_rev_image_rightside_con_opt',
				'name'        => 'Left Side Text Slider',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Left Side Text Slider Item', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name'		=> 'Content',
						'id'		=> $prefix . 'ns_intro_rev_image_con_text',
						'clone'		=> false,
						'type'		=> 'text',
						'std'		=> '',
						'desc'		=> 'e.x: Web Design',
					),
					
					
				),
				'hidden' => array( 'rnr_ns_intro_rev_image_right_side_con', '!=', 'st2' )
			),
			
			array(
			'name'		=> 'Scroll Button Text',
			'id'		=> $prefix . 'ns_intro_rev_image_scroll_button_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Button will be visible after add text.<br>e.x: Scroll down  to discover',
			),
		
	)
);

/* ----------------------------------------------------- */
/* Scrolling Page Template Navigation Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'scroll_page_nav_opt',
	'title' => 'Scrolling Page Template Navigation Options.',
	'show'   => array(
    'template'    => array( 'one-page.php' ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
	
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Navigation', 'solonick' ),
			'id'   => $prefix . 'wr_nav_sc_opt',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Mobile Navigation', 'solonick' ),
			'id'   => $prefix . 'wr_nav_sc_mob_opt',
			'desc'  => esc_attr__( 'Hide Menu For Mobile Device.', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Show', 'solonick' ),
				'st2' => esc_attr__( 'Hide', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
			'hidden' => array( 'rnr_wr_nav_sc_opt', '!=', 'st2' )
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Left Side Image', 'solonick' ),
			'id'   => $prefix . 'wr_scrolling_page_layout',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Enable', 'solonick' ),
				'st2' => esc_attr__( 'Disable', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
			'hidden' => array( 'rnr_wr_nav_sc_opt', '!=', 'st2' )
		),
		
		array(
				'id'		=> $prefix . 'po_pu_scroll_nav',
				'name'        => 'Scrolling Nvaigation',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Scrolling Nvaigation', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name' => 'Menu Name',
						'id'   => 'po_pu_opt_nav_n',
						'type' => 'text',
						'desc'		=> '',
					),
					
					array(
						'name' => 'Scroll ID',
						'id'   => 'po_pu_opt_nav_i',
						'type' => 'text',
						'desc'		=> 'Use VC Row Scroll ID <br> e.x: #about',
					),
					
					array(
					'name'		=> 'Left Side Image',
					'id'		=> $prefix . 'ns_menu_sidebar_image',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '1',
					'desc'		=> 'Working after screen size 1500px. <br> Required.',
					'visible' => array( 'rnr_wr_scrolling_page_layout', '!=', 'st2' )
					),
					
				
				),
				'hidden' => array( 'rnr_wr_nav_sc_opt', '!=', 'st2' )
			),
		
	)
);

/* ----------------------------------------------------- */
/* Service Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'service_extra_opt',
	'title' => 'Service Options',
	'pages' => array( 'service' ),
	'context' => 'normal',	

	'fields' => array(
	
		array(
			'name'		=> 'Icon',
			'id'		=> $prefix . 'ns_service_tab_i',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Use <a href="https://fontawesome.com/icons?d=listing" target="_blank">Fontawesome</a> Icon Class',
		),
		
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Extra Information', 'solonick' ),
			'id'   => $prefix . 'ns_service_extra_info_opt_enable',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
				'id'		=> $prefix . 'ns_service_extra_info_opt',
				'name'        => 'Extra Information',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Extra Information', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name' => 'Data Title',
						'id'   => $prefix . 'ns_service_info_item',
						'type' => 'text',
						'desc'		=> 'e.x: Concept',
					),
					
					
				),
				'hidden' => array( 'rnr_ns_service_extra_info_opt_enable', '!=', 'st2' )
			),
			
			array(
			'name'		=> 'Amount',
			'id'		=> $prefix . 'ns_service_price',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: 1190 $-2250 $ ',
			),
			
			array(
			'name'		=> 'Price',
			'id'		=> $prefix . 'ns_service_price_tans',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Translate Option.',
			),
	
	)
);

/* ----------------------------------------------------- */
/* port post header st1 Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'service_details_page_header_type',
	'title' => 'Deatils Page Header Options.',
	// Show this meta box for posts matched below conditions
	'pages' => array( 'service'),
	'context' => 'normal',	

	'fields' => array(
	
		array(
		'name'		=> 'Background Image',
		'id'		=> $prefix . 'ns_service_details_page_header_back_st1',
		'clone'		=> false,
		'type'		=> 'image_advanced',
		'max_file_uploads' => '1',
		'desc'		=> '',
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_service_details_page_header_title_st1',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional.',
		),
		
		
		
		array(
			'name'		=> 'Scroll down  to discover',
			'id'		=> $prefix . 'ns_service_details_page_header_translate_op1_st1',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Back To Home',
			'id'		=> $prefix . 'ns_service_details_page_header_translate_op1_st2',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
	
	)
);

/* ----------------------------------------------------- */
/* Timeline Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'timeline_extra_opt',
	'title' => 'Timeline Options',
	'pages' => array( 'timeline' ),
	'context' => 'normal',	

	'fields' => array(
	
		
		array(
			'name'		=> 'Icon Class',
			'id'		=> $prefix . 'ns_timeline_icon',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Use <a href="https://fontawesome.com/icons?d=listing" target="_blank">Fontawesome</a> Icon Class',
		),
		
	
		array(
			'name'		=> 'Sub Title',
			'id'		=> $prefix . 'ns_timline_sub_timeline',
			'clone'		=> false,
			'type'		=> 'text',
			'desc'		=> 'e.x: 2012-2016'
		),
		
	)
);

/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_page_types',
	'title' => 'Portfolio Page Template Function',
	'show'   => array(
    'template'    => array( 'portfolio.php' ),
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Select Template', 'nastik' ),
			'id'   => $prefix . 'wr_portfolio_pagetype',
			'desc'  => esc_attr__( '', 'nastik' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => esc_attr__( 'Select an Option', 'nastik' ),
				'st1' => esc_attr__( 'Fullscreen Grid', 'nastik' ),
				'st2' => esc_attr__( 'Fullscreen Grid 2', 'nastik' ),
				'st3' => esc_attr__( 'Column Grid', 'nastik' ),
				'st4' => esc_attr__( 'Column Grid 2', 'nastik' ),
				'st5' => esc_attr__( 'Boxed Grid', 'nastik' ),
			
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => esc_attr__( 'Select an Option', 'nastik' ),
		),
		
		
	)
);

/* ----------------------------------------------------- */
/* portfolio style Boxed
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_page_opt',
	'title' => 'Portfolio Page Options.',
	'hide'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_portfolio_pagetype' => 'st0',
            ),
	
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		
		
		array(
		   'name'     => esc_attr__( 'Portfolio Filter', 'nastik' ),
		   'id'   => $prefix . 'ns_port_page_filter',
		   'desc' => '',
		   'type'     => 'radio',
		   // Array of 'value' => 'Label' pairs for select box
		   'options'  => array(
			'yes' => esc_attr__( 'Enable', 'nastik' ),
			'no' => esc_attr__( 'Disable', 'nastik' ),
		   ),
		   // Select multiple values, optional. Default is false.
		   'std'         => 'yes',

		  ),
		  
		  
		  array(
				'name'       => esc_attr__( 'Number Of Posts Show', 'nastik' ),
				'id'         => $prefix . 'ns_port_page_item_show_opt',
				'desc'		=> '',
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '', 'nastik' ),
				'suffix'     => __( ' Posts', 'nastik' ),
				'js_options' => array(
					'min'  => 1,
					'max'  => 400,
					'step' => 1,
				),
			),	

			array(
			'name'		=> 'Include Category',
			'id'		=> $prefix . 'ns_port_page_cat_opt',
			'desc'		=> 'Enter category name ex: web design, web development (Optional).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_ns_port_page_filter', '!=', 'no' )
		    ),
			
			array(
			'name'		=> 'Post Offset',
			'id'		=> $prefix . 'ns_port_page_offset_opt',
			'desc'		=> 'Optional.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		    ),
			
		   array(
		   'name'     => esc_attr__( 'Load More Button', 'nastik' ),
		   'id'   => $prefix . 'ns_port_page_load_more',
		   'desc' => '',
		   'type'     => 'radio',
		   // Array of 'value' => 'Label' pairs for select box
		   'options'  => array(
			'st1' => esc_attr__( 'Disable', 'nastik' ),
			'st2' => esc_attr__( 'Enable', 'nastik' ),
		   ),
		   // Select multiple values, optional. Default is false.
		   'std'         => 'st1',
			),
		   
		   array(
				'name'       => esc_attr__( 'Post Load', 'nastik' ),
				'id'         => $prefix . 'ns_port_page_item_load_opt',
				'desc'		=> 'Number of posts to show before load more button.',
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '', 'nastik' ),
				'suffix'     => __( ' Posts', 'nastik' ),
				'js_options' => array(
					'min'  => 1,
					'max'  => 400,
					'step' => 1,
				),
				'hidden' => array( 'rnr_ns_port_page_load_more', '!=', 'st2' )
			),
			
			array(
			'name'		=> 'Load More',
			'id'		=> $prefix . 'ns_port_page_translate_opt5',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_ns_port_page_load_more', '!=', 'st2' )
		   ),
			
		   array(
			'name'		=> 'Works Filter',
			'id'		=> $prefix . 'ns_port_page_translate_opt1',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_ns_port_page_filter', '!=', 'yes' )
		   ),
		   
		   array(
			'name'		=> 'All projects',
			'id'		=> $prefix . 'ns_port_page_translate_opt2',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_ns_port_page_filter', '!=', 'yes' )
		   ),
		   
		   array(
			'name'		=> 'Scroll down  to discover',
			'id'		=> $prefix . 'ns_port_page_translate_opt3',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_ns_port_page_filter', '!=', 'no' )
		   ),
		   
		   array(
			'name'		=> 'Back to home',
			'id'		=> $prefix . 'ns_port_page_translate_opt4',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_ns_port_page_filter', '!=', 'no' )
		   ),
		
	)
);

/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_page_call_to_action_opt',
	'title' => 'Call To Action & Extra Options',
	'show'   => array(
    // by metabox select
	'input_value'   => array(
    '#rnr_wr_portfolio_pagetype' => 'st5',
            ),
	
	),
	'pages' => array( 'page' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Page Title',
			'id'		=> $prefix . 'ns_port_page_st5_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional.',
		),
		
		array(
			'name'		=> 'Header Description',
			'id'		=> $prefix . 'ns_port_page_st5_des',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'OPtional',
		),
		
		array(
			'name'		=> 'Call To Action Title',
			'id'		=> $prefix . 'ns_port_call_to_title',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_port_call_to_button',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'URL Type', 'solonick' ),
			'id'   => $prefix . 'ns_port_call_to_button_type',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Own Site', 'solonick' ),
				'st2' => esc_attr__( 'Other Site', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_port_call_to_text',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
	
		
	)
);

/* ----------------------------------------------------- */
/* portfoloio options 
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_width',
	'title' => 'Portfolio Post Width & Popup Options <br> <small>Not working on portfolio page template list & parallax style.</small>',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'     => __( 'Post Box Width', 'solonick' ),
			'id'   => $prefix . 'post-box-width',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'default-galley' => esc_attr__( 'Default', 'solonick' ),
				'gallery-item-second' => esc_attr__( 'Large', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'default-galley',

		),	
		
		
		array(
			'name'     => __( 'Popup Option', 'solonick' ),
			'id'   => $prefix . 'post-popup-option',
			'type'     => 'radio',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Image', 'solonick' ),
				'st2' => esc_attr__( 'video', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'std'         => 'st1',

		),	
		
		array(
			'name'		=> 'Popup Video',
			'id'		=> $prefix . 'post_popup_video',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Youtube/ Vimeo Video URL <br>e.x: https://vimeo.com/6698875 or https://www.youtube.com/watch?v=Hg5iNVSp2z8',
			'hidden' => array( 'rnr_post-popup-option', '!=', 'st2' )
		),
		
		
	)
);

/* ----------------------------------------------------- */
/* portfolio Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_type',
	'title' => 'Portfolio Format',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Details Page Style', 'solonick' ),
			'id'   => $prefix . 'wr_port_dt_opt',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => esc_attr__( 'Select an Option', 'solonick' ),
				'st1' => esc_attr__( 'Default', 'solonick' ),
				'st2' => esc_attr__( 'Carousel', 'solonick' ),
				'st3' => esc_attr__( 'Slider', 'solonick' ),
				'st4' => esc_attr__( 'Gallery', 'solonick' ),
				'st5' => esc_attr__( 'Slider 2', 'solonick' ),
				'st6' => esc_attr__( 'Youtube Video', 'solonick' ),
				'st7' => esc_attr__( 'Vimeo Video', 'solonick' ),
				'st8' => esc_attr__( 'Mp4 Video', 'solonick' ),
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
	
	)
);

/* ----------------------------------------------------- */
/* port post header st1 Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_details_page_header_type',
	'title' => 'Deatils Page Header Options.',
	// Show this meta box for posts matched below conditions
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_port_dt_opt'  => 'st1',
    ),
	),
    'pages' => array( 'portfolio'),
	'context' => 'normal',	

	'fields' => array(
	
		array(
		'name'		=> 'Background Image',
		'id'		=> $prefix . 'ns_port_details_page_header_back_st1',
		'clone'		=> false,
		'type'		=> 'image_advanced',
		'max_file_uploads' => '1',
		'desc'		=> '',
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_port_details_page_header_title_st1',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional.',
		),
		
		
		
		array(
			'name'		=> 'Short Description',
			'id'		=> $prefix . 'ns_port_details_page_header_desc_st1',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Scroll down  to discover',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op1_st1',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
	
	)
);


/* ----------------------------------------------------- */
/* port post header st2 Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_details_page_header_type_st2_opt',
	'title' => 'Deatils Page Style Carousel Options.',
	// Show this meta box for posts matched below conditions
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_port_dt_opt'              => 'st2',
    ),
	),
    'pages' => array( 'portfolio'),
	'context' => 'normal',	

	'fields' => array(
	
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Carousel Slider Image Infomation', 'solonick' ),
			'id'   => $prefix . 'ns_port_detailsst2_car_info_enable_opt',
			'desc'  => esc_attr__( 'Show/Hide Image Title and Caption.', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
			'name'		=> 'Info',
			'id'		=> $prefix . 'ns_port_detailsst2_car_info_translate_opt',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_ns_port_detailsst2_car_info_enable_opt', '!=', 'st2' )
		),
	
	)
);


/* ----------------------------------------------------- */
/* port post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_details_page_header_st3_type',
	'title' => 'Deatils Page Header Options.',
	// Show this meta box for posts matched below conditions
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_port_dt_opt'              => 'st3',
    ),
	),
    'pages' => array( 'portfolio'),
	'context' => 'normal',	

	'fields' => array(
	
		array(
		'name'		=> 'Background Image',
		'id'		=> $prefix . 'ns_port_details_page_header_back_st3',
		'clone'		=> false,
		'type'		=> 'image_advanced',
		'max_file_uploads' => '1',
		'desc'		=> 'Working as 1st slide of slider. If image not uploaded featured image will work as a 1st slide.',
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_port_details_page_header_title_st3',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'Optional. <br> e.x: Portfolio [br] [span] Project title[/span]',
		),
		
		array(
			'name'		=> 'Horizonral Title',
			'id'		=> $prefix . 'ns_port_details_page_header_hortitle_st3',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Short Description',
			'id'		=> $prefix . 'ns_port_details_page_header_desc_st3',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Scroll down  to discover',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op1_st2',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'View Details',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op2_st2',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
	
	)
);


/* ----------------------------------------------------- */
/* port post header st4 Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_details_page_header_type_st4',
	'title' => 'Deatils Page Header Options.',
	// Show this meta box for posts matched below conditions
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_port_dt_opt'              => 'st4',
    ),
	),
    'pages' => array( 'portfolio'),
	'context' => 'normal',	

	'fields' => array(
	
		array(
		'name'		=> 'Left Sidebar Image',
		'id'		=> $prefix . 'ns_port_details_page_header_back_st4',
		'clone'		=> false,
		'type'		=> 'image_advanced',
		'max_file_uploads' => '1',
		'desc'		=> 'Effected after screen size 1500px.',
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_port_details_page_header_title_st4',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional.',
		),
		
		array(
			'name'		=> 'Right Side Title',
			'id'		=> $prefix . 'ns_port_details_page_header_right_title_st4',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional. <br> e.x: 01.',
		),
		
		array(
			'name'		=> 'Short Description',
			'id'		=> $prefix . 'ns_port_details_page_header_desc_st4',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Scroll down  to discover',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op1_st4',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_port_details_page_header_button_url_st4',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'URL Type', 'solonick' ),
			'id'   => $prefix . 'ns_port_details_page_header_url_type_st4',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Own Site', 'solonick' ),
				'st2' => esc_attr__( 'Other Site', 'solonick' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_port_details_page_header_button_text_st4',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Back to portfolio',
		),
	
	)
);

/* ----------------------------------------------------- */
/* port post header st5 Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_details_page_header_type_st5',
	'title' => 'Deatils Page Header Options.',
	// Show this meta box for posts matched below conditions
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_port_dt_opt'              => 'st5',
    ),
	),
    'pages' => array( 'portfolio'),
	'context' => 'normal',	

	'fields' => array(
	
		array(
		'name'		=> 'Left Sidebar Image',
		'id'		=> $prefix . 'ns_port_details_page_header_back_st5',
		'clone'		=> false,
		'type'		=> 'image_advanced',
		'max_file_uploads' => '1',
		'desc'		=> 'Effected after screen size 1500px.',
		),
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_port_details_page_header_title_st5',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional.',
		),
		
		array(
			'name'		=> 'Right Side Title',
			'id'		=> $prefix . 'ns_port_details_page_header_right_title_st5',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'Optional. <br> e.x: 01.',
		),
		
		array(
			'name'		=> 'Short Description',
			'id'		=> $prefix . 'ns_port_details_page_header_desc_st5',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Scroll down  to discover',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op1_st5',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Button URL',
			'id'		=> $prefix . 'ns_port_details_page_header_button_url_st5',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'URL Type', 'solonick' ),
			'id'   => $prefix . 'ns_port_details_page_header_url_type_st5',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Own Site', 'solonick' ),
				'st2' => esc_attr__( 'Other Site', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
			'name'		=> 'Button Text',
			'id'		=> $prefix . 'ns_port_details_page_header_button_text_st5',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Back to portfolio',
		),
	
	)
);

/* ----------------------------------------------------- */
/* port post Type st6 Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_details_page_header_st6_type',
	'title' => 'Deatils Page Header Options.',
	// Show this meta box for posts matched below conditions
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_port_dt_opt'              => 'st6',
    ),
	),
    'pages' => array( 'portfolio'),
	'context' => 'normal',	

	'fields' => array(
	
		
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_port_details_page_header_title_st6',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'Optional. <br> e.x: Portfolio [br] [span] Project title[/span]',
		),
		
		array(
			'name'		=> 'Horizonral Title',
			'id'		=> $prefix . 'ns_port_details_page_header_hortitle_st6',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Short Description',
			'id'		=> $prefix . 'ns_port_details_page_header_desc_st6',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Youtube Video ID',
			'id'		=> $prefix . 'ns_port_details_page_header_video_id_st6',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '<br> ex: Hg5iNVSp2z8',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Video Sound', 'solonick' ),
			'id'   => $prefix . 'ns_port_details_page_header_video_sound_st6',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'1' => esc_attr__( 'Mute', 'solonick' ),
				'0' => esc_attr__( 'On', 'solonick' ),
			),
			'std'         => '1',
		),
		
		array(
		'name'		=> 'Video Background Image',
		'id'		=> $prefix . 'ns_port_details_page_header_back_st6',
		'clone'		=> false,
		'type'		=> 'image_advanced',
		'max_file_uploads' => '1',
		'desc'		=> 'Working as a section background for mobile version. If image not uploaded featured image will work as a section background for mobile version.',
		),
		
		array(
			'name'		=> 'Scroll down  to discover',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op1_st6',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'View More Details',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op2_st6',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
	
	)
);


/* ----------------------------------------------------- */
/* port post Type st7 Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_details_page_header_st7_type',
	'title' => 'Deatils Page Header Options.',
	// Show this meta box for posts matched below conditions
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_port_dt_opt'  => 'st7',
    ),
	),
    'pages' => array( 'portfolio'),
	'context' => 'normal',	

	'fields' => array(
	
		
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_port_details_page_header_title_st7',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'Optional. <br> e.x: Portfolio [br] [span] Project title[/span]',
		),
		
		array(
			'name'		=> 'Horizonral Title',
			'id'		=> $prefix . 'ns_port_details_page_header_hortitle_st7',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Short Description',
			'id'		=> $prefix . 'ns_port_details_page_header_desc_st7',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Vimeo Video ID',
			'id'		=> $prefix . 'ns_port_details_page_header_video_id_st7',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'ex: 97871257',
		),
		
		
		array(
		'name'		=> 'Video Background Image',
		'id'		=> $prefix . 'ns_port_details_page_header_back_st7',
		'clone'		=> false,
		'type'		=> 'image_advanced',
		'max_file_uploads' => '1',
		'desc'		=> 'Working as a section background for mobile version. If image not uploaded featured image will work as a section background for mobile version.',
		),
		
		array(
			'name'		=> 'Scroll down  to discover',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op1_st7',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'View More Details',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op2_st7',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
	
	)
);


/* ----------------------------------------------------- */
/* port post Type st7 Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_details_page_header_st8_type',
	'title' => 'Deatils Page Header Options.',
	// Show this meta box for posts matched below conditions
	'show'   => array(
	'input_value'   => array(
    '#rnr_wr_port_dt_opt'  => 'st8',
    ),
	),
    'pages' => array( 'portfolio'),
	'context' => 'normal',	

	'fields' => array(
	
		
		
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'ns_port_details_page_header_title_st8',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> '',
			'desc'		=> 'Optional. <br> e.x: Portfolio [br] [span] Project title[/span]',
		),
		
		array(
			'name'		=> 'Horizonral Title',
			'id'		=> $prefix . 'ns_port_details_page_header_hortitle_st8',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'Short Description',
			'id'		=> $prefix . 'ns_port_details_page_header_desc_st8',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'MP4 Video URL',
			'id'		=> $prefix . 'ns_port_details_page_header_video_id_st8',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> '',
		),
		
		
		
		array(
			'name'		=> 'Scroll down  to discover',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op1_st8',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> 'View More Details',
			'id'		=> $prefix . 'ns_port_details_page_header_translate_op2_st8',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
	
	)
);

// portfolio post Post Metaboxes
/* ----------------------------------------------------- */


$meta_boxes[] = array(
	'id' => 'rnr-portmeta-opt',
	'title' => 'Portfolio Extra Options.',
	'pages' => array( 'portfolio'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(
		
		array(
			'name'		=> 'Content Section Title',
			'id'		=> $prefix . 'ns_port_details_con_sec_title_opt',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'desc'		=> 'e.x: Project Title',
		),
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Project Information', 'solonick' ),
			'id'   => $prefix . 'ns_port_details_info_enable_opt',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
				'id'		=> $prefix . 'ns_port_details_info_opt',
				'name'        => 'Project Information',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Project Information', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name' => 'Data Title',
						'id'   => 'car_opt_in_tit',
						'type' => 'text',
						'desc'		=> 'e.x: Category',
					),
					
					array(
						'name' => 'Data Content',
						'id'   => 'car_opt_in_con',
						'type' => 'textarea',
						'desc'		=> 'e.x: Branding <br> HTML tag allowed.',
					),
					
					
					
				),
				'hidden' => array( 'rnr_ns_port_details_info_enable_opt', '!=', 'st2' )
			),
			
			array(
				'name'		=> 'Button URL',
				'id'		=> $prefix . 'bl-port-button-opt',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> '',
				'hidden' => array( 'rnr_ns_port_details_info_enable_opt', '!=', 'st2' )
			),
			
			array(
				'name'		=> 'Button Text',
				'id'		=> $prefix . 'bl-port-button_text-opt',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> '',
				'hidden' => array( 'rnr_ns_port_details_info_enable_opt', '!=', 'st2' )
			),
			// SELECT BOX
			array(
				'name'     => esc_attr__( 'Button Target', 'restabook' ),
				'id'   => $prefix . 'ns_port_button_target_opt',
				'desc'  => esc_attr__( '', 'restabook' ),
				'type'     => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'st1' => esc_attr__( 'Self', 'restabook' ),
					'st2' => esc_attr__( 'Blank', 'restabook' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'st1',
				'placeholder' => esc_attr__( 'Select an Option', 'restabook' ),
				'hidden' => array( 'rnr_ns_port_details_info_enable_opt', '!=', 'st2' )
			),
		array(
				'name'		=> 'Extra Information',
				'id'		=> $prefix . 'ns_port_extrainfo',
				'clone'		=> false,
				'type'		=> 'textarea',
				'std'		=> '',
				'desc'		=> 'Effected on right sidebar.<br>HTML tag allowed.',
				'hidden' => array( 'rnr_ns_port_details_info_enable_opt', '!=', 'st2' )
		),
			
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Project Accordion', 'solonick' ),
			'id'   => $prefix . 'wr_port_accor_opt',
			'desc'  => esc_attr__( '', 'solonick' ),
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st1' => esc_attr__( 'Disable', 'solonick' ),
				'st2' => esc_attr__( 'Enable', 'solonick' ),
				
				
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st1',
			'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
		),
		
		array(
				'name'		=> 'Accordion Section Title',
				'id'		=> $prefix . 'ns_port_accordion_title',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> '',
				'hidden' => array( 'rnr_wr_port_accor_opt', '!=', 'st2' )
		),
		
		array(
				'id'		=> $prefix . 'so_acc_tab_opt',
				'name'        => 'Project Accordion',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Project Accordion', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					
					array(
						'name' => 'Accordion Title',
						'id'   => $prefix . 'so_acc_title_opt',
						'type' => 'text',
						'desc'		=> '',
					),
					
					array(
						'name' => 'Accordion Content',
						'id'   => $prefix . 'so_acc_con_opt',
						'type' => 'textarea',
						'desc'		=> '',
					),
					
					// SELECT BOX
					array(
						'name'     => esc_attr__( 'Active', 'solonick' ),
						'id'   => $prefix . 'so_acc_accon_opt',
						'desc'  => esc_attr__( 'Select Yes For 1st Accordion Item. ', 'solonick' ),
						'type'     => 'select_advanced',
						// Array of 'value' => 'Label' pairs for select box
						'options'  => array(
							'st1' => esc_attr__( 'No', 'solonick' ),
							'st2' => esc_attr__( 'Yes', 'solonick' ),
							
							
						),
						// Select multiple values, optional. Default is false.
						'multiple'    => false,
						'std'         => 'st1',
						'placeholder' => esc_attr__( 'Select an Option', 'solonick' ),
					),
				
				),
				'hidden' => array( 'rnr_wr_port_accor_opt', '!=', 'st2' )
			),
		
		
		
		
		
	)
);


/* portfolio Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pt_slider_link_popu',
	'title' => 'Image Gallery.',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(
		array(
				'name'		=> 'Gallery Section Title',
				'id'		=> $prefix . 'ns_port_gallery_title',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> 'Working only details style video types.',
		),
	
		array(
				'id'		=> $prefix . 'so_drt_po_gallery',
				'name'        => 'Galley',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Galley', // ID of the subfield
				'save_state' => true,
				'fields' => array(
				
					// SELECT BOX
					array(
						'name'     => esc_attr__( 'Image Size', 'popuga' ),
						'id'   => $prefix . 'md_pot_gallery_column',
						'desc'  => esc_attr__( 'Working only details style Default, Gallery.', 'popuga' ),
						'type'     => 'select_advanced',
						// Array of 'value' => 'Label' pairs for select box
						'options'  => array(
							'gallery-item-one' => esc_attr__( 'Default', 'popuga' ),
							'gallery-item-second' => esc_attr__( 'Double', 'popuga' ),
						),
						// Select multiple values, optional. Default is false.
						'multiple'    => false,
						'std'         => 'gallery-item-one',
						'placeholder' => esc_attr__( 'Select an Option.', 'popuga' ),
					),
				
					array(
					'name'		=> 'Upload Images',
					'id'		=> $prefix . 'portfolio-image-popu',
					'clone'		=> false,
					'type'		=> 'image_advanced',
					'max_file_uploads' => '1000',
					'desc'		=> 'Upload same size images for details page style Slider 2. <br> <b>Upload only 1 image if you added a popup video URL.</b>',
					),
					
					array(
					'name'		=> 'Popup Video URL',
					'id'		=> $prefix . 'ns_port_gallery_video_opt',
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'desc'		=> 'Youtube/ Vimeo Video URL. <br> Not working on Portfolio details style Slider & Slider 2.',
					),
					
				
				),
			),
			
			array(
		   'name'     => esc_attr__( 'Load More Button', 'nastik' ),
		   'id'   => $prefix . 'ns_port_dtpage_load_more',
		   'desc' => 'Not working for Carouel,  Slider & Slider 2 style.',
		   'type'     => 'radio',
		   // Array of 'value' => 'Label' pairs for select box
		   'options'  => array(
			'st1' => esc_attr__( 'Disable', 'nastik' ),
			'st2' => esc_attr__( 'Enable', 'nastik' ),
		   ),
		   // Select multiple values, optional. Default is false.
		   'std'         => 'st1',
			),
		   
		   array(
				'name'       => esc_attr__( 'Post Load', 'nastik' ),
				'id'         => $prefix . 'ns_port_dtpage_item_load_opt',
				'desc'		=> 'Number of posts to show before load more button.',
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '', 'nastik' ),
				'suffix'     => __( ' Posts', 'nastik' ),
				'js_options' => array(
					'min'  => 1,
					'max'  => 400,
					'step' => 1,
				),
				'hidden' => array( 'rnr_ns_port_dtpage_load_more', '!=', 'st2' )
			),
			
			array(
			'name'		=> 'Load More',
			'id'		=> $prefix . 'ns_port_dtpage_translate_opt5',
			'desc'		=> 'Translate Option.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_ns_port_dtpage_load_more', '!=', 'st2' )
		   ),
		
	)
);

// Blog Post Metaboxes
/* ----------------------------------------------------- */


$meta_boxes[] = array(
	'id' => 'rnr-blogmeta-video',
	'title' => 'Post Format Video Option',
	'show'   => array(
    'post_format' => array( 'Video' ),
	),
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Vimeo/ Youtube Video Link:',
			'id'		=> $prefix . 'bl-video',
			'desc'		=> 'Set Vimeo / Youtube Video Embed Link',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		
	)
);


// Blog Post Metaboxes
/* ----------------------------------------------------- */


$meta_boxes[] = array(
	'id' => 'rnr-blogmeta-gallery',
	'title' => 'Post Format Gallery Option',
	'show'   => array(
    'post_format' => array( 'Gallery' ),
	),
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Upload Images',
			'id'		=> $prefix . 'wr_galleryimg_blog',
			'clone'		=> false,
			'type'		=> 'image_advanced',
			'desc'		=> 'Use same size images.',
		),

		
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function nastik_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'nastik_register_meta_boxes' );