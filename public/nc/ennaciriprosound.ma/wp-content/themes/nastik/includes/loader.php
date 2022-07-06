<?php
function nastik_import_files() {
	return array(
		array(
			'import_file_name'             => 'Nastik Demo',
			'categories'                   => array( 'Nastik' ),
			'local_import_file'            => trailingslashit( NASTIK_THEME_PATH ) . 'includes/nastik-demo/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( NASTIK_THEME_PATH ) . 'includes/nastik-demo/widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( NASTIK_THEME_PATH ) . 'includes/nastik-demo/redux.json',
					'option_name' => 'nastik',
				),
			),
			'import_preview_image_url'     => 'http://webredox.net/screen/nastik.jpg',
			'import_notice'                => __( 'Be patient, it can take a couple of minutes.', 'nastik' ),
			'preview_url'                  => 'https://nastik.webredox.net/',
		),
		
	);
}
add_filter( 'pt-ocdi/import_files', 'nastik_import_files' );

function nastik_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'top-menu' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Slider' );
	$blog_page_id  = get_page_by_title( 'Sample Page' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'nastik_after_import_setup' );

function nastik_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Nastik Demo Importer' , 'nastik' );
	$default_settings['menu_title']  = esc_html__( 'Nastik Demo Importer' , 'nastik' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'nastik-one-click-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'nastik_plugin_page_setup' );