<?php $nastik_options = get_option('nastik'); ?>
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
<div class="content">
<!-- fixed-top-panel-->
                            <div class="fixed-top-panel fl-wrap">
                                <div class="sp-fix-header fl-wrap">
                                    <div class="scroll-down-wrap hide_onmobile">
                                        <div class="mousey">
                                            <div class="scroller"></div>
                                        </div>
                                        <span><?php if(!empty($nastik_options['translet_opt_3'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_3',''));?><?php else: ?><?php esc_html_e('Scroll down  to discover','nastik');?><?php endif;?></span>
                                    </div>
									<?php if (nastik_AfterSetupTheme::return_thme_option('shop_headersearch_opt')!='st1'){ ?>
                                    <div class="search-btn"><i class="fal fa-search"></i><span><?php if(!empty($nastik_options['shop_search_bt_title1'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('shop_search_bt_title1',''));?><?php else: ?><?php esc_html_e('Search','nastik');?><?php endif;?></span></div>
									<?php } ;?>
									<?php if (nastik_AfterSetupTheme::return_thme_option('shop_headercatlist_opt')!='st1'){ ?>
                                    <?php if(!get_post_meta(get_the_ID(), 'product_cat', true)):
									$nastik_post_category = get_terms('product_cat');?>
									<?php if($nastik_post_category):?>
                                    <!-- filter category    -->
                                    <div class="category-filter blog-btn-filter">
                                        <div class="blog-btn"><?php if(!empty($nastik_options['shop_cat_list_bt_title1'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('shop_cat_list_bt_title1',''));?> <?php else: ?><?php esc_html_e('Categories ','nastik');?><?php endif;?> <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                                        <ul>
                                            <?php  foreach($nastik_post_category as $nastik_post_cat):?>
                                            <li><a href="<?php echo get_category_link($nastik_post_cat->term_id); ?>"><?php echo esc_html($nastik_post_cat->name);?></a></li>
											<?php endforeach;?>
                                        </ul>
                                    </div>
                                    <!-- filter category end  --> 
									<?php endif;?>
									<?php endif;?>
									<?php } ;?>
                                </div>
                                <div class="blog-search-wrap"><form action="<?php echo esc_url( home_url( '/'  ) ); ?>"><input name="s" id="se" type="text" class="search" placeholder="<?php if(!empty($nastik_options['shop_search_bt_title2'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('shop_search_bt_title2',''));?>..<?php else: ?><?php esc_html_e('Type and click Enter to search..','nastik');?><?php endif;?>" value="" /><input type="hidden" name="post_type" value="product" /></form></div>
                            </div>
                            <!-- fixed-top-panel end -->                   
                        <!-- section  --> 
                        <section class="header-section hidden-section" data-scrollax-parent="true">
						<?php $nastik_shop_back = nastik_AfterSetupTheme::return_thme_option('shopheaderimg','url');
						$nastik_dot="'";
						?>
						<?php if ( is_product_category() ){
						global $wp_query;
						$nastik_cat = $wp_query->get_queried_object();
						$nastik_thumbnail_id = get_term_meta( $nastik_cat->term_id, 'thumbnail_id', true );
						$nastik_image = wp_get_attachment_url( $nastik_thumbnail_id );
						if ( $nastik_image ) {
						echo '<div class="bg par-elem"  data-bg="'.$nastik_image.'" data-scrollax="properties: { translateY: '.$nastik_dot.'30%'.$nastik_dot.' }"></div>';
						}
						else {
						echo '<div class="bg par-elem"  data-bg="'.$nastik_shop_back.'" data-scrollax="properties: { translateY: '.$nastik_dot.'30%'.$nastik_dot.' }"></div>';
						}
						} else { ?>
                        <div class="bg par-elem"  data-bg="<?php echo esc_url($nastik_shop_back);?>" data-scrollax="properties: { translateY: '30%' }"></div>
						<?php } ;?>
                            
                            <div class="overlay"></div>
                            <div class="container">
                                <div class="single-page-title hiddec-anim fl-wrap">
									<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                                    <h1><?php woocommerce_page_title(); ?></h1>
									<?php endif; ?>
									<?php if ( is_product_category() ){ ?>
									<?php
									/**
									 * Hook: woocommerce_archive_description.
									 *
									 * @hooked woocommerce_taxonomy_archive_description - 10
									 * @hooked woocommerce_product_archive_description - 10
									 */
									do_action( 'woocommerce_archive_description' );
									?> 
									<?php } else {?>
									<?php if(!empty($nastik_options['shopsubtitle'])):?>
									<p> 
									<?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('shopsubtitle',''));?>
									</p>
									<?php endif;?>
									<?php } ;?>
                                    
                                </div>
                                <div class="hero-corner"></div>
 
                            </div>
                            <div class="fcw-dec"></div>
                        </section>
                        <!-- section end --> 
<section>
<div class="col-wc_dec"></div>
<div class="container">
<div class="row">
<div class="col-md-8">
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );?>
</div>
<?php

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );


?>
<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
   <!-- sidebar   --> 
   <div class="col-md-4 pull-left">
   <?php dynamic_sidebar( 'sidebar-3' ); ?>                                          
   </div>
   <!-- sidebar end --> 
	<?php endif;?>
</div>
</div>
<div class="sec-lines"></div>
<div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>
</section>

</div>
<div class="limit-box fl-wrap"></div>
<?php else : ?>
<!---no sidebar start---->
				<!-- fixed-column-wrap -->       
                    <div class="fixed-column-wrap">
                        <div class="progress-bar-wrap">
                            <div class="progress-bar color-bg"></div>
                        </div>
                        <div class="column-image fl-wrap full-height">
						<?php $nastik_shop_back = nastik_AfterSetupTheme::return_thme_option('shopheaderimg','url');
						$nastik_dot="'";
						?>
						<?php if ( is_product_category() ){
						global $wp_query;
						$nastik_cat = $wp_query->get_queried_object();
						$nastik_thumbnail_id = get_term_meta( $nastik_cat->term_id, 'thumbnail_id', true );
						$nastik_image = wp_get_attachment_url( $nastik_thumbnail_id );
						if ( $nastik_image ) {
						echo '<div class="bg"  data-bg="'.$nastik_image.'"></div>';
						}
						else {
						echo ' <div class="bg"  data-bg="'.$nastik_shop_back.'"></div>';
						}
						} else { ?>
                         <div class="bg"  data-bg="<?php echo esc_url($nastik_shop_back);?>"></div>
						<?php } ;?>
                            
                            <div class="overlay"></div>
                            <div class="column-image-anim"></div>
                        </div>
                        <div class="fcw-dec"></div>
                        <div class="fixed-column-tilte fcw-title"><span><?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?><?php woocommerce_page_title(); ?><?php endif; ?></span></div>
						
                    </div>
                    <!-- fixed-column-wrap end -->
<!-- column-wrap -->
                    <div class="column-wrap  ">
                        <!--content -->
                        <div class="content">
                            <div class="fixed-top-panel fl-wrap">
                                <div class="sp-fix-header fl-wrap">
                                    <div class="scroll-down-wrap">
                                        <div class="mousey">
                                            <div class="scroller"></div>
                                        </div>
                                        <span><?php if(!empty($nastik_options['translet_opt_3'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_3',''));?><?php else: ?><?php esc_html_e('Scroll down  to discover','nastik');?><?php endif;?></span>
                                    </div>
                                    
									<?php if (nastik_AfterSetupTheme::return_thme_option('shop_headersearch_opt')!='st1'){ ?>
                                    <div class="search-btn"><i class="fal fa-search"></i><span><?php if(!empty($nastik_options['shop_search_bt_title1'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('shop_search_bt_title1',''));?><?php else: ?><?php esc_html_e('Search','nastik');?><?php endif;?></span></div>
									<?php } ;?>
									<?php if (nastik_AfterSetupTheme::return_thme_option('shop_headercatlist_opt')!='st1'){ ?>
                                    <?php if(!get_post_meta(get_the_ID(), 'product_cat', true)):
									$nastik_post_category = get_terms('product_cat');?>
									<?php if($nastik_post_category):?>
                                    <!-- filter category    -->
                                    <div class="category-filter blog-btn-filter">
                                        <div class="blog-btn"><?php if(!empty($nastik_options['shop_cat_list_bt_title1'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('shop_cat_list_bt_title1',''));?> <?php else: ?><?php esc_html_e('Categories ','nastik');?><?php endif;?> <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                                        <ul>
                                            <?php  foreach($nastik_post_category as $nastik_post_cat):?>
                                            <li><a href="<?php echo get_category_link($nastik_post_cat->term_id); ?>"><?php echo esc_html($nastik_post_cat->name);?></a></li>
											<?php endforeach;?>
                                        </ul>
                                    </div>
                                    <!-- filter category end  --> 
									<?php endif;?>
									<?php endif;?>
									<?php } ;?>
                                </div>
								<div class="blog-search-wrap"><form action="<?php echo esc_url( home_url( '/'  ) ); ?>"><input name="s" id="se" type="text" class="search" placeholder="<?php if(!empty($nastik_options['shop_search_bt_title2'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('shop_search_bt_title2',''));?>..<?php else: ?><?php esc_html_e('Type and click Enter to search..','nastik');?><?php endif;?>" value="" /><input type="hidden" name="post_type" value="product" /></form></div>
                            </div>
                            <!--section -->
                            <section   class="hidden-section bot-element no-bottom-padding">
							
                                <div class="col-wc_dec"></div>
							
                                <div class="container wr-default-page">
                               <?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );?>
                                </div>
								<div class="clearfix"></div>
							
							
                                <div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>
													
                                
                            </section>
                            <!--section end -->
                            <div class="limit-box fl-wrap"></div>
                        </div>
                    </div>
                    <!--content  end -->
<!---no sidebar end---->
<?php endif;?>
