<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "nastik";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'nastik/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
		'class'                => 'admin-color-pimax',
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Nastik Options', 'nastik' ),
        'page_title'           => esc_html__( 'Nastik Options', 'nastik' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyCN8bSGZHdbSOXu0HbhXf8j0SnswTmbCNw',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => true,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the nastik. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'nastik'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'nastik'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'nastik' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'nastik' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'nastik' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Support', 'nastik' ),
            'content' => esc_html__( 'Send us a mail by using our item support form.', 'nastik' )
        ),
        
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'Send us a mail by using our item support form.', 'nastik' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // ACTUAL DECLARATION OF SECTIONS
                Redux::setSection( $opt_name, array(
                    'title'  => esc_html__( 'General Settings', 'nastik' ),
                    'desc'   => esc_html__( '', 'nastik' ),
                    'icon'   => 'el-icon-home-alt',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(
					array(
			                'id' => 'notice_ajax_loading',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Ajax Loading & Custom Cursor', 'nastik'),
			                'desc' => esc_html__('Enable/ Disable ajax loading and custom cursor of your site.', 'nastik')
			            ),
                    array(
							'id' => 'enableajax',
							'type' => 'button_set',
							'title' => esc_attr__('Enable Ajax Loading', 'nastik'),
							'subtitle' => esc_attr__('If you would like to use WP Bakery default elements please disable Ajax loading.', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
									
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'enablecursor',
							'type' => 'button_set',
							'title' => esc_attr__('Custom Cursor', 'nastik'),
							'subtitle' => esc_attr__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
									
							),
							'default'  => 'st1'
					),
					
					
					array(
			                'id' => 'notice_header_logo',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Logo Options', 'nastik'),
			                'desc' => esc_html__('Logo options of your site header.', 'nastik')
			            ),
					array(
							'id' => 'smalllogo',
							'type' => 'button_set',
							'title' => esc_html__('Small Logo', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
									
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'logopicsmall',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload  Logo', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'required' => array('smalllogo', '=' , 'st2')
					),
					
					$fields = array(
					'id'       => 'opt_small_logo_dimensions',
					'type'     => 'dimensions',
					'units'    => array('em','px','%'),
					'output' => array('.logo-holder img'),
					'title'    => __('Small Logo Size', 'nastik'),
					'subtitle' => __('.', 'nastik'),
					'desc'     => __('Optional', 'nastik'),
					'default'  => array(
						'Width'   => '50', 
						'Height'  => '50'
					),
					'required' => array('smalllogo', '=' , 'st2')
					),
					 
					
					array(
							'id' => 'textlogo',
							'type' => 'button_set',
							'title' => esc_html__('Select Logo Format', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Text Logo', 'nastik'),
									'st2' => esc_html__('Image Logo', 'nastik'),
									
							),
							'default'  => 'st1'
					),
					 
					array(
							'id' => 'logopic',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload  Logo', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'required' => array('textlogo', '=' , 'st2')
					),
					
					$fields = array(
					'id'       => 'opt_logo_dimensions',
					'type'     => 'dimensions',
					'units'    => array('em','px','%'),
					'output' => array('.logo_menu img'),
					'title'    => __('Logo Size', 'nastik'),
					'subtitle' => __('.', 'nastik'),
					'desc'     => __('Optional', 'nastik'),
					'default'  => array(
						'Width'   => '140', 
						'Height'  => '64'
					),
					'required' => array('textlogo', '=' , 'st2')
				),
					
									
					
					array(
							'id' => 'logotext',
							'type' => 'text',
							'title' => esc_html__('Logo Text ', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'required' => array('textlogo', '=' , 'st1')
					
					),
					
					
					array(
			                'id' => 'notice_header_menu',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Menu Options', 'nastik'),
			                'desc' => esc_html__('Menu options of your site header.', 'nastik')
			            ),
						
					array(
							'id' => 'menu_st_title',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Menu Section Title', 'nastik'),
							'subtitle' => esc_html__('E.X: Menu', 'nastik'),
							
					),
					
					array(
			                'id' => 'notice_header_share',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Share Options', 'nastik'),
			                'desc' => esc_html__('Share options of your site header.', 'nastik')
			            ),
					
					array(
							'id' => 'headershare_opt',
							'type' => 'button_set',
							'title' => esc_html__('Share Option', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
									
									
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_header_share_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Share Section Translation Options', 'nastik'),
			                'desc' => esc_html__('Share Section Text Translation Options', 'nastik'),
							'required' => array('headershare_opt', '=' , 'st2')
			       ),
					
					
					
					array(
							'id' => 'share_bt_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'nastik'),
							'subtitle' => esc_html__('E.X: Share', 'nastik'),
							'required' => array('headershare_opt', '=' , 'st2')
					),
					
					
					
					array(
			                'id' => 'notice_header_contact',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Header Button Options', 'nastik'),
			                'desc' => esc_html__('Header Button options of your site header.', 'nastik')
			            ),
					
					array(
							'id' => 'headercontact_opt',
							'type' => 'button_set',
							'title' => esc_html__('Button Section', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
									
									
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'contact_bt_title',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Button Title', 'nastik'),
							'subtitle' => esc_html__('E.X: My Portfolio', 'nastik'),
							'required' => array('headercontact_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headercontact_url_type',
							'type' => 'button_set',
							'title' => esc_html__('URL From', 'nastik'),
							'subtitle' => esc_html__('If you are using url from other site, then must select "Other Site"', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Own Site', 'nastik'),
									'st2' => esc_html__('Other Site', 'nastik'),
									
									
							),
							'default'  => 'st1',
							'required' => array('headercontact_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'con_p_url',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('URL', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'required' => array('headercontact_opt', '=' , 'st2')
					),
					
					
					
				  )
               ) );
			   
			   
			   
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-bullhorn',
                    'title'  => esc_html__( '404 Page Options', 'nastik' ),
                    'fields' => array(
					
					array(
							'id' => '404back',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload  404 Page Background Image', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							
					),
					
					array(
			                'id' => 'notice_404page_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('404 Page Translation Options', 'nastik'),
			                'desc' => esc_html__('404 Page Text Translation Options', 'nastik'),
							
			            ),
					
					array(
							'id' => '404_page_title',
							'type' => 'textarea',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'nastik'),
							'subtitle' => esc_html__('Translation Options. E.X:  WE are SORRY, BUT THE PAGE YOU WERE LOOKING FOR, COULDNT BE FOUND. ', 'nastik'),
							
					),
					
					array(
							'id' => '404_page_title_2',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 2', 'nastik'),
							'subtitle' => esc_html__('Translation Options. E.X:  Search', 'nastik'),
							
					),
					
					array(
							'id' => '404_page_title_3',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 3', 'nastik'),
							'subtitle' => esc_html__('Translation Options. E.X:  Or', 'nastik'),
							
					),
					
					array(
							'id' => '404_page_title_4',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 4', 'nastik'),
							'subtitle' => esc_html__('Translation Options. E.X:  Back to Home Page', 'nastik'),
							
					),
					
                    )
                ) );
				
			
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-bullhorn',
                    'title'  => esc_html__( 'Blog & Portfolio Options', 'nastik' ),
                    'fields' => array(
					
					array(
							'id' => 'blogtyle',
							'type' => 'button_set',
							'title' => esc_html__('Select Blog Layout', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Right Sidebar', 'nastik'),
									'st2' => esc_html__('Left Sidebar', 'nastik'),
									'st3' => esc_html__('Full Width', 'nastik'),
									
									
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'blog_sidebar_back_opt',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload Index Header Image', 'nastik'),
							'subtitle' => esc_html__('Working only sidebar style.', 'nastik'),
							
					),
					
					array(
							'id' => 'blogpageurl',
							'type' => 'text',
							'title' => esc_html__('Blog Page URL ', 'nastik'),
							'subtitle' => esc_html__('Working on post details page pagination.', 'nastik'),
						
					),
					
					array(
			                'id' => 'notice_header_page_title_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Index Page Title Options', 'nastik'),
			                'desc' => esc_html__('Working only sidebar style.', 'nastik'),
							'required' => array('headersearch_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'blogtitle',
							'type' => 'text',
							'title' => esc_html__('Index Title ', 'nastik'),
							'subtitle' => esc_html__('Write header title for index page here. Ex: My Blog', 'nastik'),
						
					),
					
					array(
							'id' => 'blog_sub_title',
							'type' => 'textarea',
							'title' => esc_html__('Index Description. ', 'nastik'),
							'subtitle' => esc_html__('Working only sidebar style.', 'nastik'),
						
					),
					
					array(
							'id' => 'arch-page-title',
							'type' => 'text',
							'title' => esc_html__('Archive Page Title', 'nastik'),
							'subtitle' => esc_html__('Write header title for blog archive page here. Ex: Archive', 'nastik'),
							'default' => '',
					),	
					array(
							'id' => 'cat-page-title',
							'type' => 'text',
							'title' => esc_html__('Category Page Title', 'nastik'),
							'subtitle' => esc_html__('Write header title for blog category page here. Ex: Category', 'nastik'),
							'default' => '',
					),	
	
					array(
							'id' => 'tag-page-title',
							'type' => 'text',
							'title' => esc_html__('Tag Page Title', 'nastik'),
							'subtitle' => esc_html__('Write header title for blog tag page here. Ex: Tag', 'nastik'),
							'default' => '',
					),	
					
					array(
							'id' => 'search-page-title',
							'type' => 'text',
							'title' => esc_html__('Search Page Title', 'nastik'),
							'subtitle' => esc_html__('Write header title for blog search page here. Ex: Search', 'nastik'),
							'default' => '',
					),
					
					array(
			                'id' => 'notice_header_search',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Header Search Options', 'nastik'),
			                'desc' => esc_html__('Search options of your index page header.', 'nastik')
			        ),
					
					array(
							'id' => 'headersearch_opt',
							'type' => 'button_set',
							'title' => esc_html__('Search Option', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_header_search_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Search Section Translation Options', 'nastik'),
			                'desc' => esc_html__('Search Section Text Translation Options', 'nastik'),
							'required' => array('headersearch_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'search_bt_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'nastik'),
							'subtitle' => esc_html__('E.X: Search', 'nastik'),
							'required' => array('headersearch_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'search_bt_title2',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 2', 'nastik'),
							'subtitle' => esc_html__('E.X: Type and click Enter to search', 'nastik'),
							'required' => array('headersearch_opt', '=' , 'st2')
					),
					
					array(
			                'id' => 'notice_header_post_cat',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Header Category List Options', 'nastik'),
			                'desc' => esc_html__('Category list options of your index page header.', 'nastik')
			        ),
					
					array(
							'id' => 'headercatlist_opt',
							'type' => 'button_set',
							'title' => esc_html__('Category List', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
									
									
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_header_cat_list_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Category List Section Translation Options', 'nastik'),
			                'desc' => esc_html__('Category List Section Text Translation Options', 'nastik'),
							'required' => array('headercatlist_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'cat_list_bt_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'nastik'),
							'subtitle' => esc_html__('E.X: Categories', 'nastik'),
							'required' => array('headercatlist_opt', '=' , 'st2')
					),
					//tag list
					array(
			                'id' => 'notice_header_post_tag',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Header Tag List Options', 'nastik'),
			                'desc' => esc_html__('Tag list options of your index details page header.', 'nastik')
			        ),
					
					array(
							'id' => 'headertaglist_opt',
							'type' => 'button_set',
							'title' => esc_html__('Tag List', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_header_tag_list_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Tag List Section Translation Options', 'nastik'),
			                'desc' => esc_html__('Tag List Section Text Translation Options', 'nastik'),
							'required' => array('headertaglist_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'tag_list_bt_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'nastik'),
							'subtitle' => esc_html__('E.X: Tags', 'nastik'),
							'required' => array('headertaglist_opt', '=' , 'st2')
					),
					//tag list end
					
					array(
			                'id' => 'notice_index_user_info',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('User Information', 'nastik'),
			                'desc' => esc_html__('Enable/ Disable Blog details page User Information section.', 'nastik')
			        ),
					
					array(
							'id' => 'blog_details_user',
							'type' => 'button_set',
							'title' => esc_html__('User Information', 'nastik'),
							'subtitle' => esc_html__('User information on Blog details page.', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_header_port_search',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Portfolio Page Header Search Option', 'nastik'),
			                'desc' => esc_html__('Search options of your portfolio page header.', 'nastik')
			        ),
					
					array(
							'id' => 'headersearch_port_opt',
							'type' => 'button_set',
							'title' => esc_html__('Search Option', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_header_portfolio_page_temp',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Portfolio Page Option', 'nastik'),
			                'desc' => esc_html__('', 'nastik')
			        ),
					
					array(
							'id' => 'port_page_img_url_opt',
							'type' => 'button_set',
							'title' => esc_html__('Insert URL to image', 'nastik'),
							'subtitle' => esc_html__('Insert details page URL to featured image.', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_header_portfolio',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Portfolio Details Page Options', 'nastik'),
			                'desc' => esc_html__('', 'nastik')
			        ),
					
					array(
							'id' => 'portpageurl',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Portfolio Page URL', 'nastik'),
							'subtitle' => esc_html__('Working on portfolio details page pagination.', 'nastik'),
							
					),
					
					array(
			                'id' => 'notice_header_portfolio_search',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Portfolio Search Page Options', 'nastik'),
			                'desc' => esc_html__('', 'nastik')
			        ),
					
					array(
							'id' => 'port_search_back',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Search Page Sidebar Image', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							
					),
					
					
                    )
                ) );
				
				if (class_exists('WooCommerce')) {
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el el-shopping-cart-sign',
                    'title'  => esc_attr__( 'Shop Options', 'nastik' ),
                    'fields' => array(
					
					array(
							'id' => 'wr-shop-opt',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Shop Page Header Options', 'nastik'),
							'desc' => esc_attr__(' ', 'nastik')
							
					  ),

					array(
							'id' => 'shopheaderimg',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Upload Shop Page Header Image', 'nastik'),
							'subtitle' => esc_attr__('', 'nastik'),
							
					),
					
					array(
							'id' => 'shopsubtitle',
							'type' => 'textarea',
							'title' => esc_attr__('Sub Title ', 'nastik'),
							'subtitle' => esc_attr__('Shop page sub title', 'nastik'),
							
					),
					
					array(
							'id' => 'wr-shop-dt-opt',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Product Details Page Options', 'nastik'),
							'desc' => esc_attr__(' ', 'nastik')
							
					  ),
					  
					array(
							'id' => 'shop_details_page_opt',
							'type' => 'button_set',
							'title' => esc_attr__('Details Page Style', 'nastik'),
							'subtitle' => esc_attr__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Full Width', 'nastik'),
									'st2' => esc_html__('Left Side Block', 'nastik'),
							),
							'default'  => 'st1'
					),

					array(
							'id' => 'shopheaderimgdt',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Upload Product Details Page Header Image', 'nastik'),
							'subtitle' => esc_attr__('', 'nastik'),
							
					),
					
					array(
							'id' => 'shoptitledt',
							'type' => 'text',
							'title' => esc_attr__('Title ', 'nastik'),
							'subtitle' => esc_attr__('Product Details Page Title', 'nastik'),
					),
					
					array(
							'id' => 'shopsubtitledt',
							'type' => 'textarea',
							'title' => esc_attr__('Sub Title ', 'nastik'),
							'subtitle' => esc_attr__('Product Details Page Sub Title', 'nastik'),
							'required' => array('shop_details_page_opt', '=' , 'st1')
					),
					
					array(
			                'id' => 'shop_notice_header_search',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Header Search Options', 'nastik'),
			                'desc' => esc_html__('Search options of your shop page header.', 'nastik')
			        ),
					
					array(
							'id' => 'shop_headersearch_opt',
							'type' => 'button_set',
							'title' => esc_html__('Search Option', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'shop_notice_header_search_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Search Section Translation Options', 'nastik'),
			                'desc' => esc_html__('Search Section Text Translation Options', 'nastik'),
							'required' => array('shop_headersearch_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'shop_search_bt_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'nastik'),
							'subtitle' => esc_html__('E.X: Search', 'nastik'),
							'required' => array('shop_headersearch_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'shop_search_bt_title2',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 2', 'nastik'),
							'subtitle' => esc_html__('E.X: Type and click Enter to search', 'nastik'),
							'required' => array('shop_headersearch_opt', '=' , 'st2')
					),
					
					array(
			                'id' => 'shop_notice_header_post_cat',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Header Category List Options', 'nastik'),
			                'desc' => esc_html__('Category list options of your shop page header.', 'nastik')
			        ),
					
					array(
							'id' => 'shop_headercatlist_opt',
							'type' => 'button_set',
							'title' => esc_html__('Category List', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'shop_notice_header_cat_list_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Category List Section Translation Options', 'nastik'),
			                'desc' => esc_html__('Category List Section Text Translation Options', 'nastik'),
							'required' => array('shop_headercatlist_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'shop_cat_list_bt_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'nastik'),
							'subtitle' => esc_html__('E.X: Categories', 'nastik'),
							'required' => array('shop_headercatlist_opt', '=' , 'st2')
					),
					
					)
                ) );
				}
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-cog',
                    'title'  => __( 'Translate Options', 'nastik' ),
                    'fields' => array(
					
					array(
							'id' => 'wr-blog-opt2',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Translate Text', 'nastik'),
							'desc' => esc_html__(' ', 'nastik')
							
					  ),

					array(
							'id' => 'translet_opt_2',
							'type' => 'text',
							'title' => esc_html__('To top', 'nastik'),
							'subtitle' => esc_html__('Footer Text.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_3',
							'type' => 'text',
							'title' => esc_html__('Scroll Down to discover', 'nastik'),
							'subtitle' => esc_html__('Shop Page, Blog Page & Index.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_4',
							'type' => 'text',
							'title' => esc_html__('Category', 'nastik'),
							'subtitle' => esc_html__('Post Meta.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_5',
							'type' => 'text',
							'title' => esc_html__('Read More', 'nastik'),
							'subtitle' => esc_html__('Post Meta.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_6',
							'type' => 'text',
							'title' => esc_html__('Type & Hit Enter...', 'nastik'),
							'subtitle' => esc_html__('Search Widget Placeholder Text.', 'nastik'),
					),
					
					
					array(
							'id' => 'translet_opt_8',
							'type' => 'text',
							'title' => esc_html__('Comment', 'nastik'),
							'subtitle' => esc_html__('Post Meta.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_9',
							'type' => 'text',
							'title' => esc_html__('Comments', 'nastik'),
							'subtitle' => esc_html__('Post Meta.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_10',
							'type' => 'text',
							'title' => esc_html__('One thought on', 'nastik'),
							'subtitle' => esc_html__('Post Comment Section.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_11',
							'type' => 'text',
							'title' => esc_html__('thought on', 'nastik'),
							'subtitle' => esc_html__('Post Comment Section.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_12',
							'type' => 'text',
							'title' => esc_html__('thoughts on', 'nastik'),
							'subtitle' => esc_html__('Post Comment Section.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_13',
							'type' => 'text',
							'title' => esc_html__('Comments are closed.', 'nastik'),
							'subtitle' => esc_html__('Post Comment Section.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_14',
							'type' => 'text',
							'title' => esc_html__('Your Name', 'nastik'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_15',
							'type' => 'text',
							'title' => esc_html__('Your Email', 'nastik'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_16',
							'type' => 'text',
							'title' => esc_html__('Your Comment', 'nastik'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_17',
							'type' => 'text',
							'title' => esc_html__('Send Comment', 'nastik'),
							'subtitle' => esc_html__('Post Comment Section Form.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_18',
							'type' => 'text',
							'title' => esc_html__('Prev', 'nastik'),
							'subtitle' => esc_html__('Post & Portfolio Pagination.', 'nastik'),
					),
					
					
					array(
							'id' => 'translet_opt_20',
							'type' => 'text',
							'title' => esc_html__('Next', 'nastik'),
							'subtitle' => esc_html__('Post & Portfolio Pagination.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_21',
							'type' => 'text',
							'title' => esc_html__('Back To Home', 'nastik'),
							'subtitle' => esc_html__('Portfolio & Post Pagination.', 'nastik'),
					),
					array(
							'id' => 'translet_opt_25',
							'type' => 'text',
							'title' => esc_html__('Back To Blog', 'nastik'),
							'subtitle' => esc_html__('Post Pagination.', 'nastik'),
					),
					array(
							'id' => 'translet_opt_22',
							'type' => 'text',
							'title' => esc_html__('Back To Portfolio', 'nastik'),
							'subtitle' => esc_html__('Portfolio Pagination.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_26',
							'type' => 'text',
							'title' => esc_html__('Back To Shop', 'nastik'),
							'subtitle' => esc_html__('Product Pagination.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_23',
							'type' => 'text',
							'title' => esc_html__('No Item Found', 'nastik'),
							'subtitle' => esc_html__('Post Search Page.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_24',
							'type' => 'text',
							'title' => esc_html__('Please Search Again.', 'nastik'),
							'subtitle' => esc_html__('Post Search Page.', 'nastik'),
					),
					
					array(
							'id' => 'translet_opt_7',
							'type' => 'text',
							'title' => esc_html__('Search...', 'nastik'),
							'subtitle' => esc_html__('Search Page Form Placeholder Text.', 'nastik'),
					),
					
					
					
                    )
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-leaf',
                    'title'  => esc_html__( 'Social Options', 'nastik' ),
                    'fields' => array(
					
					
					array(
							'id' => 'social_show_hide_opt_head',
							'type' => 'button_set',
							'title' => esc_html__('Social Option', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'facebook',
							'type' => 'text',
							'title' => esc_html__('Facebook URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'twitter',
							'type' => 'text',
							'title' => esc_html__('Twitter URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'pinterest',
							'type' => 'text',
							'title' => esc_html__('Pinterest URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'behance',
							'type' => 'text',
							'title' => esc_html__('Behance URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'dribbble',
							'type' => 'text',
							'title' => esc_html__('Dribbble URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'gplus',
							'type' => 'text',
							'title' => esc_html__('Google URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'linkedin',
							'type' => 'text',
							'title' => esc_html__('Linkedin URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					array(
							'id' => 'youtube',
							'type' => 'text',
							'title' => esc_html__('Youtube URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
						
					),
					
					array(
							'id' => 'vimeo',
							'type' => 'text',
							'title' => esc_html__('Vimeo URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
							
					),
					
					array(
							'id' => 'slack',
							'type' => 'text',
							'title' => esc_html__('Slack ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
							
					),
					
					array(
							'id' => 'instagram',
							'type' => 'text',
							'title' => esc_html__('Instagram URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
							
					),
					
					array(
							'id' => 'tumblr',
							'type' => 'text',
							'title' => esc_html__('Tumblr URL ', 'nastik'),
							'subtitle' => esc_html__('Write Social URL', 'nastik'),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
							
					),
					
					array(
							'id'       => 'opt_add_more_social',
							'type'     => 'multi_text',
							'title'    => esc_html__( 'Add More Social Icons.', 'nastik' ),
							'subtitle' => esc_html__( '', 'nastik' ),
							'desc'     => __( 'e.x: &lt;li&gt;&lt;a target="_blank" href="#"&gt;&lt;i class="fab fa-facebook-f"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;<br>Use <a href="https://fontawesome.com/v5/cheatsheet/free/brands" target="_blank">Fontawesome</a> Icon Class', 'nastik' ),
							'required' => array('social_show_hide_opt_head', '=' , 'st2')
					),
					
					
                    )
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-text-width',
                    'title'  => esc_attr__( 'Typography', 'nastik' ),
                    'fields' => array(  


						array(
                            'id'          => 'typo_body',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Body', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('body'),
                            'units'       =>'px',
                            'line-height'       =>true,
                            'text-align'       =>false,
                            'subtitle'    => esc_html__('Specify the Body Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            'text-align' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_p',
                            'type'        => 'typography', 
                            'title'       => esc_html__('P', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('p, .main-about-text-area, .resum-content ul li, .resum-content, .resum-content p, .post p, .main-about-text-area ul li'),
                            'units'       =>'px',
							'line-height'       =>true,
                            'subtitle'    => esc_html__('Specify the P Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_page_loading_title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Preloader Page Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.page-load_bg span'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify preloader page title Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-all-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Button', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.btn, .vc-section button, .vc-section input[type=submit]'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the  button  font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),

						array(
			                'id' => 'notice_critical11',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'nastik'),
			                'desc' => esc_html__('Entry Headings in Header/Left Sidebar/ Menu/ Left Side Block', 'nastik')
			            ),
						
						array(
                            'id'          => 'typo_header_fixed_column_entry',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Left Side Block Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.fixed-column-tilte'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Left Side Block Title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_header_entry',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Share Title, Header Button, Header Search', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.menu-button-text, .folio-btn-tooltip, .search-btn span, .blog-search-wrap input, .share-title'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Menu Button, Header Button Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						
						array(
                            'id'          => 'logotextwr1',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Text Logo', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.ns-text-logo'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Logo Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_menu_iten',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Menu Item', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.sliding-menu a'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Menu Item Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_menu_iten_hover',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Menu Item Hover', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.sliding-menu a:hover'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Menu Item Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_menu_iten_active',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Menu Item Active', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.current-menu-parent > a, .current-menu-item > a'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Menu Item Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_scroll_menu_iten_active',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Scrolling Menu Item', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.page-scroll-nav li a'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Scrolling Menu Item Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typo_menu_search',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Menu Search', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.nav-search input'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Menu Search Text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
			                'id' => 'notice_critical12',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'nastik'),
			                'desc' => esc_html__('Entry Headings in Home Page Template.', 'nastik')
			            ),
						
						array(
                            'id'          => 'typography-h1-slider',
                            'type'        => 'typography', 
                            'title'       => esc_html__('All Slider Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.half-hero-wrap h1, .hero-section .section-title h2, .hero-title .section-title h2, .half-hero-wrap .hero-intro-title'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the all slider title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-con-slider',
                            'type'        => 'typography', 
                            'title'       => esc_html__('All Slider Content', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.hero-section .section-title p, .hero-title .section-title p, .section-title_category, .half-hero-wrap h4, .section-title_category a'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the all slider content font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typography_car_slider_title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Carousel Slider Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.carousel-title-wrap h2, .carousel-title-wrap h2 a '),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the all Carousel slider title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-car-slider-con',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Carousel Slider Content', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.carousel-title-wrap p'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Carousel slider content font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						
						
						
						array(
			                'id' => 'notice_critical13',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'nastik'),
			                'desc' => esc_html__('Entry Headings in Default Page Template.', 'nastik')
			            ),
						
						array(
                            'id'          => 'typography-page-right-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Page Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.single-page-title h1, .fixed-column-tilte'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the page title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-right-con',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Page Sub Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.single-page-title p '),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the page sub title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typography-page-right-scroll-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Scroll Button', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.scroll-down-wrap span'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the page scroll button font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						array(
			                'id' => 'notice_critical14',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'nastik'),
			                'desc' => esc_html__('Entry Headings in WPBakery Page Builder only for nastik category.', 'nastik')
			            ),
						array(
                            'id'          => 'typography-page-vc-row-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Row Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.section-title h3, .small-section-title h3'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the page row title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-sub-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Row Sub Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.split-sceen-content_title p, .section-title p, .single-page-title p'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the page row sub title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-counter-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Counter Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.inline-facts-wrap h6'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the counter title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-counter-number',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Counter Number', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.inline-facts-wrap .num'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the counter number font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typography-page-vc-row-team-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Team Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.team-info h3'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the team title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-team-designation',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Team Designation', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.team-info h4'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the team designation font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-team-content',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Team Description', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.team-info p'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the team dscription font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-testimonial-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Testimonial Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.testi-item h3'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the testimonial title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-testimonial-content',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Testimonial content', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.testi-item p'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the testimonial content font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-testimonial-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Testimonial Button', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.teti-link'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the testimonial button font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-biography-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Biography Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.pr-subtitle'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the biography title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-biography-content',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Biography Content', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.biography-text p'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the biography content font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-biography-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Biography Button', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.pr-view'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the biography button font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-biography-list',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Biography List Item', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.pr-list li, .cont-det-wrap li, .serv-price-wrap'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the biography list item font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-row-skill-bar-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Skill Bar Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.custom-skillbar-title span, .skill-bar-percent'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the skill bar title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-timline-tab-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Timeline Tab Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.resum-header h3'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Timeline tab title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						array(
                            'id'          => 'typography-page-vc-timline-tab-date',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Timeline Tab Date', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.resum-header span'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Timeline tab date font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-page-vc-timline-sec-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Timeline Section Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.resum-content h4'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the Timeline section title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
			                'id' => 'notice_critical15',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'nastik'),
			                'desc' => esc_html__('Entry Headings in Blog Page.', 'nastik')
			            ),
						
						array(
                            'id'          => 'typography-blog-post-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Post Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.post .section-title h3 , .post .section-title h3 a'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the post title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-blog-post-meta-top',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Post Date/ Category', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.post-header span, .post-header a'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the post date/ category font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-blog-post-meta-bottom',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Post Admin/ Comment', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.post-opt li, .post-opt li a'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the post admin/ comment font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						array(
                            'id'          => 'typography-blog-post-button',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Read More Button', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.post .btn'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the post read more button font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-blog-post-widget',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Widget List Item', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.widget li a, .widget li '),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the widget list item/ li font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
			                'id' => 'notice_critical16',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'nastik'),
			                'desc' => esc_html__('Entry Portfolio Details Page.', 'nastik')
			            ),
						
						
						
						array(
                            'id'          => 'typography-portfolio-post-tab-content',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Tab Content/ Accordion Content', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.accordion-inner, .accordion-inner p'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the portfolio tab content/ accordion Content font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						
						
						array(
                            'id'          => 'typography-portfolio-post-accordion-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Accordion Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.accordion a.toggle.act-accordion'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the portfolio accordion title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-portfolio-post-projectinfo',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Poject Information Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.project-details ul li span'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the portfolio project information title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-portfolio-post-projectinfo-con',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Poject Information Content', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.project-details ul li'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the portfolio project information content font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-portfolio-post-projectinfo-con-list',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Post Pagination', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.content-nav li a.ln, .content-nav li a.rn'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the post pagination list item font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
			                'id' => 'notice_critical17',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Entry Headings', 'nastik'),
			                'desc' => esc_html__('Entry Page Footer.', 'nastik')
			            ),
						
						array(
                            'id'          => 'typography-footer-widget-title',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Footer Widget Title', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.footer-title'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the footer widget title font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-footer-widget-list',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Footer Widget List Item/ li', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.footer-widget li, .footer-widget li a, .footer-contacts li'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the footer widget list item font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-footer-widget-p',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Footer Widget p', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.footer-widget p'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the footer widget p font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-footer-copyright',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Footer Copyright Text', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.policy-box, .policy-box p'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the footer copyright text font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
						
						array(
                            'id'          => 'typography-footer-back-top',
                            'type'        => 'typography', 
                            'title'       => esc_html__('Footer Back To Top', 'nastik'),
                            'google'      => true, 
                            'font-backup' => false,
                            'output'      => array('.to-top-btn'),
                            'units'       =>'px',
							'line-height'       =>false,
                            'subtitle'    => esc_html__('Specify the footer back to top font properties.', 'nastik'),
                            'default'     => array(
                            'color'       => false,
                            'font-style'  => false,
                            'font-family' => false,
                            'google'      => true,
                            'font-size'   => false,
                            'line-height' => false,
                            ),
						),
                        
                    )
                ) );		
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-brush',
                    'title'  => esc_html__( 'Styling', 'nastik' ),
                    'fields' => array(
					
					array(
                            'id'       => 'opt-theme-style',
                            'type'     => 'color',
                            'title'    => esc_html__( 'Theme Color Option', 'nastik' ),
                            'subtitle' => esc_html__( 'Only color validation can be done on this field type', 'nastik' ),
                            'desc'     => esc_html__( 'Change all global color.', 'nastik' ),
                            //'regular'   => false, // Disable Regular Color
                            //'hover'     => false, // Disable Hover Color
                            //'active'    => false, // Disable Active Color
                            //'visited'   => true,  // Enable Visited Color
                            
                   ),
						
					

                    )
                ) );
				
				
				
				
				 Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-th-large',
                    'title'  => esc_html__( 'Footer Options', 'nastik' ),
                    'fields' => array(
					
					array(
			                'id' => 'notice_footer_enable_opt',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Footer Section', 'nastik'),
			                'desc' => esc_html__('Enable/ Disable footer section for your site.', 'nastik')
			        ),
					
					array(
							'id' => 'main_en_footer_opt',
							'type' => 'button_set',
							'title' => esc_html__('Footer Section', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Enable', 'nastik'),
									'st2' => esc_html__('Disable', 'nastik'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_footer_widget',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Footer Widget Section', 'nastik'),
			                'desc' => esc_html__('Enable/ Disable widget section for your site footer.', 'nastik'),
							'required' => array('main_en_footer_opt', '=' , 'st1')
			        ),
					
					array(
							'id' => 'widget_en_footer_opt',
							'type' => 'button_set',
							'title' => esc_html__('Footer Widget Section', 'nastik'),
							'subtitle' => esc_html__('', 'nastik'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'nastik'),
									'st2' => esc_html__('Enable', 'nastik'),
							),
							'default'  => 'st1',
							'required' => array('main_en_footer_opt', '=' , 'st1')
					),
					
					
					array(
							'id' => 'theme-cus-copy',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Copy right Text', 'nastik'),
							'desc' => esc_html__('Footer copy right Text', 'nastik'),
							'required' => array('main_en_footer_opt', '=' , 'st1')
							
					  ),
					
					array(
							'id' => 'copyright',
							'type' => 'editor',
							'wpautop'=>true,
							'compiler' => 'true',
							'title' => esc_html__('Copyright text of the WebSite', 'nastik'),
							'subtitle' => esc_html__('Write a Copyright text of your WebSite', 'nastik'),
							'default'          => '<span>&#169; nastik 2020  /  All rights reserved. </span>',
							'args'   => array(
								'teeny'            => true,
								'textarea_rows'    => 10
							),
							'required' => array('main_en_footer_opt', '=' , 'st1')
					),
					
				
					)
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-key',
                    'title'  => esc_html__( 'Documentation', 'nastik' ),
                    'fields' => array(					
					
					array(
							'id' => 'docs',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Nastik Theme Documentation', 'nastik'),
							'desc' => __('<a href="http://webredox.net/demo/wp/nastik/doc/documentation.html" target="_blank">Click Here</a> To get the theme documentation.', 'nastik')
							
					),	

			
			
					)
                ));
				
				
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'nastik' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'nastik' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-nastik plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

