<?php $nastik_options = get_option('nastik');?>
<?php
/*Template Name:Scrolling Page Template*/
 get_header();
?>
<!-- hero-wrap--> 
<?php if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st1'){ ?>
	<?php get_template_part('template-parts/intro/image');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st2'){ ?>
	<?php get_template_part('template-parts/intro/slider');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st3'){ ?>
	<?php get_template_part('template-parts/intro/carousel');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st4'){ ?>
	<?php get_template_part('template-parts/intro/impulse');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st5'){ ?>
	<?php get_template_part('template-parts/intro/slideshow');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st6'){ ?>
	<?php get_template_part('template-parts/intro/mp4');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st7'){ ?>
	<?php get_template_part('template-parts/intro/youtube');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st8'){ ?>
	<?php get_template_part('template-parts/intro/vimeo');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st9'){ ?>
	<?php get_template_part('template-parts/intro/rev');?>
	<?php } else if(get_post_meta($post->ID,'rnr_wr_intro_sc_opt',true)=='st0'){ ?>
	<?php } else { ?>
	<?php get_template_part('template-parts/intro/image');?>
<?php } ;?>
<?php if(get_post_meta($post->ID,'rnr_wr_nav_sc_opt',true)=='st2'){ ?>
<?php if(get_post_meta($post->ID,'rnr_wr_scrolling_page_layout',true)!='st2'){ ?>
<!-- fixed-column-wrap --> 					
        <div class="fixed-column-wrap">
            <div class="progress-bar-wrap">
                <div class="progress-bar color-bg"></div>
            </div>
        <div class="column-image fl-wrap full-height">
        <div class="bg bg-scroll"  data-bg=""></div>
        <div class="overlay"></div>
        <div class="column-image-anim"></div>
        </div>
        <div class="fcw-dec"></div>
        <div class="fixed-column-tilte fdct fcw-title"><span  id="quote"></span></div>
        </div>
<!-- fixed-column-wrap end--> 
<?php } ;?>
<?php } ;?>
<!-- hero-wrap end--> 
<!-- column-wrap --> 
<?php if(get_post_meta($post->ID,'rnr_wr_nav_sc_opt',true)=='st2'){ ?>
<?php if(get_post_meta($post->ID,'rnr_wr_scrolling_page_layout',true)=='st2'){ ?>
<div class="column-wrap-full pull-left">
<?php } else { ?>
<div class="column-wrap">
<?php } ;?>
<?php } else { ?>
<div class="column-wrap-full pull-left">
<?php } ;?>
<!--content -->
    <div class="content">
	<?php if(get_post_meta($post->ID,'rnr_wr_nav_sc_opt',true)=='st2'){ ?>
	<!--page-scroll-nav-->
	<?php if(get_post_meta($post->ID,'rnr_wr_nav_sc_mob_opt',true)=='st2'){ 
	global $nastik_hide_mn;
	$nastik_hide_mn ="hide-menu-sm";
	} else {
	$nastik_hide_mn ="";
	}
	;?>
        <div class="page-scroll-nav fl-wrap <?php echo esc_attr($nastik_hide_mn);?>">
            <nav class="scroll-init color2-bg">
                <ul class="no-list-style">
				<?php if(get_post_meta($post->ID,'rnr_wr_scrolling_page_layout',true)=='st2'){ ?>
				<?php
				$nastik_scroll_menu = rwmb_meta( 'rnr_po_pu_scroll_nav' );
				if ( ! empty( $nastik_scroll_menu ) ) {
				foreach ( $nastik_scroll_menu as $nastik_scroll_menus ) { ;?>
				<?php $nastik_scroll_menu_href = isset( $nastik_scroll_menus['po_pu_opt_nav_i'] ) ? $nastik_scroll_menus['po_pu_opt_nav_i'] : ''; ?>
				<?php $nastik_scroll_menu_title = isset( $nastik_scroll_menus['po_pu_opt_nav_n'] ) ? $nastik_scroll_menus['po_pu_opt_nav_n'] : ''; ?>
				<?php if ( !empty( $nastik_scroll_menu_href ) ) { ?>
				<li><a class="scroll-link fbgs" href="<?php echo esc_html($nastik_scroll_menu_href);?>"  data-bgtex="<?php echo esc_html($nastik_scroll_menu_title);?>"><span><?php echo esc_html($nastik_scroll_menu_title);?></span></a></li>
				<?php } ?>
				<?php } } ;?>
				<?php } else { ?>
                <?php
				$nastik_car_slide_opt = rwmb_meta( 'rnr_po_pu_scroll_nav' );
				if ( ! empty( $nastik_car_slide_opt ) ) {
				foreach ( $nastik_car_slide_opt as $nastik_car_slide_opts ) { ;?>
				<?php $nastik_navi = isset( $nastik_car_slide_opts['po_pu_opt_nav_i'] ) ? $nastik_car_slide_opts['po_pu_opt_nav_i'] : ''; ?>
				<?php $nastik_navn = isset( $nastik_car_slide_opts['po_pu_opt_nav_n'] ) ? $nastik_car_slide_opts['po_pu_opt_nav_n'] : ''; ?>
				<?php $nastik_image_ids = isset( $nastik_car_slide_opts['rnr_ns_menu_sidebar_image'] ) ? $nastik_car_slide_opts['rnr_ns_menu_sidebar_image'] : array();
				foreach ( $nastik_image_ids as $nastik_image_id ) {
				$nastik_image = RWMB_Image_Field::file_info( $nastik_image_id, array( 'size' => '' ) ); ?>
				<?php if ( !empty( $nastik_navi ) ) { ?>
				<?php if ( !empty( $nastik_navn ) ) { ?>
                <li><a class="scroll-link fbgs" href="<?php echo esc_html($nastik_navi);?>" data-bgscr="<?php echo esc_url(($nastik_image['url']));?>" data-bgtex="<?php echo esc_html($nastik_navn);?>"><span><?php echo esc_html($nastik_navn);?></span></a></li>
				<?php } ?>
				<?php } ?>
				<?php } ?>
				<?php } } ;?>
				<?php } ;?>
				</ul>
            </nav>
            <div class="arrowpagenav"></div>
        </div>
        <!--page-scroll-nav end-->
		<?php }
		else  { ?>
		<?php } ;?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content();?>
		<?php endwhile; ?>
		<?php wp_reset_postdata();?>
	<div class="limit-box fl-wrap"></div>
	</div>
<!--content  end -->
</div>

<?php get_footer(); ?>	