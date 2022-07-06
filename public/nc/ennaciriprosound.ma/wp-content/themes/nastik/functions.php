<?php
define('NASTIK_THEME_PATH',		get_template_directory());
define('NASTIK_THEME_URL',		get_template_directory_uri());
// Enqueue Style
require(NASTIK_THEME_PATH . '/includes/style.php');
require(NASTIK_THEME_PATH . '/includes/js.php');
require(NASTIK_THEME_PATH . '/includes/color.php');
require(NASTIK_THEME_PATH . '/includes/AfterSetupTheme.php');
require(NASTIK_THEME_PATH . '/includes/functions.php');
require(NASTIK_THEME_PATH . '/pagination.php');
require(NASTIK_THEME_PATH . '/includes/ini/nastik-base.php');
require (NASTIK_THEME_PATH . '/nastik-widget/nastik-widget.php');

if ( ! isset( $content_width ) ) $content_width = 900;	

$nastik_options = get_option('nastik');

// register nav menu
function nastik_register_menus() {
register_nav_menus( array( 
'top-menu' => esc_html__( 'Primary menu','nastik' ),
)
);
}

add_action( 'after_setup_theme', 'nastik_setup' );

function nastik_setup() {
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );
	
	// Add custom editor font sizes.
	add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small', 'nastik' ),
					'shortName' => esc_html__( 'S', 'nastik' ),
					'size'      => 11,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'nastik' ),
					'shortName' => esc_html__( 'M', 'nastik' ),
					'size'      => 12,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'nastik' ),
					'shortName' => esc_html__( 'L', 'nastik' ),
					'size'      => 36,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'nastik' ),
					'shortName' => esc_html__( 'XL', 'nastik' ),
					'size'      => 49,
					'slug'      => 'huge',
				),
			)
		);
	
	add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'Lightning Yellow', 'nastik' ),
            'slug' => 'lightning-yellow',
            'color' => '#F9BF26',
        ),
        array(
            'name' => esc_html__( 'Black', 'nastik' ),
            'slug' => 'color-black',
            'color' => '#000',
        ),
        
    ) );
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	
	add_action( 'after_setup_theme', 'nastik_lang_setup' );
	function nastik_lang_setup(){
    load_theme_textdomain('nastik', get_template_directory() . '/languages');
    }
	add_theme_support( 'automatic-feed-links' );
	remove_theme_support( 'widgets-block-editor' );
	add_theme_support( "title-tag" );
	add_theme_support( 'post-formats', array('image','video','gallery') );
	add_post_type_support( 'portgallery', 'post-formats' );
}
// Word Limit 
	function nastik_string_limit_words($string, $word_limit)
	{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}
// Add post thumbnail functionality
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 559, 220, true ); // Normal post thumbnails
	add_image_size( 'nastik_blog_image', 370, 208, true ); // Blog Thumbnail
	add_image_size( 'nastik_portfolio_image', 758, 520, true ); // Portfolio Thumbnail
	add_image_size( 'nastik_portfolio_image_gallery_car', 604, 400, true ); // Portfolio Thumbnail
	add_image_size( 'nastik_port_gallery_header', 762, 441, true ); //galeery header
	add_image_size( 'nastik_blog', 695, 375, true ); //blog
	add_image_size( 'nastik_shop_cover', 349, 395, true ); // music Thumbnail

	
	
function nastik_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
 
add_filter( 'comment_form_fields', 'nastik_move_comment_field_to_bottom' );

// How comments are displayed
function nastik_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
?>
    <<?php echo esc_attr($tag); ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
    <?php if ( 'div' != $args['style'] ) : ?>
	
	
	
    <?php endif; ?>
    
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<div class="comment-author">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, '50' ); ?>
    </div>
	<cite class="fn"><?php printf(__('%s','nastik'), get_comment_author_link()) ?></cite>
	<div class="comment-meta">
    <h6><a href="#"><?php comment_date(get_option( 'date_format')); ?></a>  <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></h6>
    </div>
	
	
	
	 <div class="comment-text fl-wrap">
		<?php comment_text() ?>
	</div>
	
	</div>
   
     
	 
     <div class="clearfix"></div>
      <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','nastik') ?></em>
    <br />
	
   <?php endif; ?>    
<?php if ( 'div' != $args['style'] ) : ?>
    
    <?php endif; ?>
<?php
        }
// create sidebar & widget area
if(function_exists('register_sidebar')) {
function nastik_theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'nastik' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'This area for Blog widgets.', 'nastik' ),
        'before_widget' => '<div id="%1$s" class="widget widget-wrap fl-wrap single-side-bar %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="widget-title">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'nastik_theme_slug_widgets_init' );

function nastik_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget Area 1', 'nastik' ),
        'id' => 'footer-widget-1',
        'description' => esc_html__( 'This area for footer widgets area 1. Note: Enable footer widget section by Footer Options from Natik Options.', 'nastik' ),
        'before_widget' => '<div id="%1$s" class="footer-widget footer-box fl-wrap %2$s"><div class="footer-box-item fl-wrap">',
		'after_widget'  => '</div></div>', 
		'before_title'  => '<div class="footer-title fl-wrap">', 
		'after_title'   => '</div> '
    ) );
}
add_action( 'widgets_init', 'nastik_widgets_init' );

function nastik_footer_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget Area 2', 'nastik' ),
        'id' => 'footer-widget-2',
        'description' => esc_html__( 'This area for footer widgets area 2. Note: Enable footer widget section by Footer Options from Natik Options.', 'nastik' ),
        'before_widget' => '<div id="%1$s" class="footer-widget footer-box fl-wrap %2$s"><div class="footer-box-item fl-wrap">',
		'after_widget'  => '</div></div>', 
		'before_title'  => '<div class="footer-title fl-wrap">', 
		'after_title'   => '</div> '
    ) );
}
add_action( 'widgets_init', 'nastik_footer_widgets_init' );
if (class_exists('WooCommerce')) {
function solonick_woo_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'WOOCOMMERCE Sidebar', 'nastik' ),
        'id' => 'sidebar-3',
        'description' => esc_html__( 'This area for All WOOCOMMERCE Widget.', 'nastik' ),
        'before_widget' => '<div id="%1$s" class="widget widget-wrap fl-wrap single-side-bar %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="widget-title">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'solonick_woo_widgets_init' );
}
}


if(function_exists('vc_set_as_theme')) vc_set_as_theme();
// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
  function requireVcExtend(){
    require_once (NASTIK_THEME_PATH . '/extendvc/extend-vc.php');
  }
}

function nastik_my_search_form( $form ) {
$nastik_options = get_option('nastik');
if(!empty($nastik_options['translet_opt_6'])) {
$nastik_search_text = esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_6',''));
}
else {
$nastik_search_text ='Type & Hit Enters...';
}
    $nastik_form = '<div class="widget-container fl-wrap"><div class="nav-search"><form role="search" method="get" id="searchform" class="searh-inner fl-wrap" action="' . esc_url(home_url( '/' )) . '" >
    <div><label class="screen-reader-text" for="s">' . esc_html__( 'Search for:','nastik' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="search fl-wrap" placeholder="'. esc_attr($nastik_search_text).'" />
    <button class="search-submit color-bg" id="submit_btn"><i class="fal fa-search"></i> </button>
    </div>
    </form></div></div>';
 
    return $nastik_form;
}
add_filter( 'get_search_form', 'nastik_my_search_form' );

if (is_admin() && isset($_GET['activated'])){
 wp_redirect(admin_url("themes.php?page=nastik"));
}

function nastik_excerpt_more( $more ) {
    return '..';
}
add_filter('excerpt_more', 'nastik_excerpt_more');

/* CHECK WOOCOMMERCE IS ACTIVE
  ================================================== */ 
  if ( ! function_exists( 'nastik_woocommerce_activated' ) ) {
    function nastik_woocommerce_activated() {
      if ( class_exists( 'woocommerce' ) ) {
        return true;
      } else {
        return false;
      }
    }
  }
function woocommerce_pagination() {
		nastik_pagination(); 		
	}
add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'nastik_related_products_args', 20 );
  function nastik_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 1 columns
	return $args;
}