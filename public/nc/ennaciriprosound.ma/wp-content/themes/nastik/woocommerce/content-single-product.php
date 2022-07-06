<?php $nastik_options = get_option('nastik'); ?>
<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;



if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<?php if ($nastik_options['shop_details_page_opt']=="st2") {?>
<?php $nastik_shop_back = nastik_AfterSetupTheme::return_thme_option('shopheaderimgdt','url');?>
<!-- fixed-column-wrap -->       
                    <div class="fixed-column-wrap">
                        <div class="progress-bar-wrap">
                            <div class="progress-bar color-bg"></div>
                        </div>
                        <div class="column-image fl-wrap full-height">
                            <div class="bg"  data-bg="<?php echo esc_url($nastik_shop_back);?>"></div>
                            <div class="overlay"></div>
                            <div class="column-image-anim"></div>
                        </div>
                        <div class="fcw-dec"></div>
                        <div class="fixed-column-tilte fcw-title"><span><?php if(!empty($nastik_options['shoptitledt'])):?><?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('shoptitledt',''));?><?php else :?><?php esc_html_e('My Shop','nastik');?><?php endif;?></span></div>
                    </div>
<!-- fixed-column-wrap end -->
<!-- column-wrap -->
                    <div class="column-wrap  ">
                        <!--content -->
                        <div class="content">
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
									$nastik_post_category = wp_get_post_terms($post->ID,'product_cat');?>
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
							
									
                                <div class="container">
                                    <?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
?>
<div class="row">
<div class="col-md-4">
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
</div>
</div>
<div class="col-md-8">
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	
</div>
</div>
<div class="col-md-12">
<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<!--content-nav_holder-->            
                                    <div class="content-nav_holder fl-wrap blog-nav">
                                        <div class="pr-bg pr-bg-white"></div>
                                        <div class="content-nav">
                                            <ul>
                                                <li>
											<?php $nastik_previous_post = get_previous_post();
                                            $nastik_url = is_object( $nastik_previous_post ) ? get_permalink( $nastik_previous_post->ID ) : '';
                                            $nastik_title = is_object( $nastik_previous_post ) ? get_the_title( $nastik_previous_post->ID ) : '';
											if ($nastik_previous_post) { 
											$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $nastik_previous_post->ID ), 'nastik_portfolio_image' );
											}
											?>
											<?php  if ($nastik_previous_post) { ?>
                                                    <a href="<?php echo esc_url( $nastik_url ) ?>" class="ln"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($nastik_options['translet_opt_18'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_18',''));?> - <?php else: ?><?php esc_html_e('Prev - ','nastik');?><?php endif;?><?php echo esc_html( $nastik_title ) ?></span></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="ln"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($nastik_options['translet_opt_26'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_26',''));?><?php else: ?><?php esc_html_e('Back To Shop','nastik');?><?php endif;?></span></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                                <li>
											<?php $nastik_next_post = get_next_post();
                                            $nastik_url = is_object( $nastik_next_post ) ? get_permalink( $nastik_next_post->ID ) : '';
                                            $nastik_title = is_object( $nastik_next_post ) ? get_the_title( $nastik_next_post->ID ) : ''; 
											if ($nastik_next_post) {
											$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $nastik_next_post->ID ), 'nastik_portfolio_image' );
											}
											?>
											<?php if ($nastik_next_post) { ?>
                                                    <a href="<?php echo esc_url( $nastik_url ) ?>" class="rn"><span ><?php if(!empty($nastik_options['translet_opt_20'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_20',''));?> - <?php else: ?><?php esc_html_e('Next - ','nastik');?><?php endif;?><?php echo esc_html( $nastik_title ) ?></span> <i class="fal fa-long-arrow-right"></i></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="rn"><span ><?php if(!empty($nastik_options['translet_opt_26'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_26',''));?><?php else: ?><?php esc_html_e('Back To Shop','nastik');?><?php endif;?></span> <i class="fal fa-long-arrow-right"></i></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--content-nav_holder end -->
<?php do_action( 'woocommerce_after_single_product' ); ?> 
                                </div>
								<div class="clearfix"></div>
								<div class="order-wrap  hiddec-anim fl-wrap">
								</div>
							
                                
												
                                
                            </section>
                            <!--section end -->
                            <div class="limit-box fl-wrap"></div>
                        </div>
                    </div>
                    <!--content  end -->
<?php } else { ?>
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
									$nastik_post_category = wp_get_post_terms($post->ID,'product_cat');?>
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
						<?php $nastik_shop_back = nastik_AfterSetupTheme::return_thme_option('shopheaderimgdt','url');?>
                        <section class="header-section hidden-section" data-scrollax-parent="true">
                            <div class="bg par-elem"  data-bg="<?php echo esc_url($nastik_shop_back);?>" data-scrollax="properties: { translateY: '30%' }"></div>
                            <div class="overlay"></div>
                            <div class="container">
                                <div class="single-page-title hiddec-anim fl-wrap">
                                    <h1><?php if(!empty($nastik_options['shoptitledt'])):?><?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('shoptitledt',''));?><?php else :?><?php esc_html_e('My Shop','nastik');?><?php endif;?></h1>
                                    <p><?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('shopsubtitledt',''));?>  </p>
                                </div>
                                <div class="hero-corner"></div>
 
                            </div>
                            <div class="fcw-dec"></div>
                        </section>
                        <!-- section end --> 
<section>
<div class="col-wc_dec"></div>
<div class="container">
<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
?>
<div class="row">
<div class="col-md-4">
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
</div>
</div>
<div class="col-md-8">
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>
</div>
<!--content-nav_holder-->            
                                    <div class="content-nav_holder fl-wrap blog-nav">
                                        <div class="pr-bg pr-bg-white"></div>
                                        <div class="content-nav">
                                            <ul>
                                                <li>
											<?php $nastik_previous_post = get_previous_post();
                                            $nastik_url = is_object( $nastik_previous_post ) ? get_permalink( $nastik_previous_post->ID ) : '';
                                            $nastik_title = is_object( $nastik_previous_post ) ? get_the_title( $nastik_previous_post->ID ) : '';
											if ($nastik_previous_post) { 
											$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $nastik_previous_post->ID ), 'nastik_portfolio_image' );
											}
											?>
											<?php  if ($nastik_previous_post) { ?>
                                                    <a href="<?php echo esc_url( $nastik_url ) ?>" class="ln"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($nastik_options['translet_opt_18'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_18',''));?> - <?php else: ?><?php esc_html_e('Prev - ','nastik');?><?php endif;?><?php echo esc_html( $nastik_title ) ?></span></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="ln"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($nastik_options['translet_opt_26'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_26',''));?><?php else: ?><?php esc_html_e('Back To Shop','nastik');?><?php endif;?></span></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                                <li>
											<?php $nastik_next_post = get_next_post();
                                            $nastik_url = is_object( $nastik_next_post ) ? get_permalink( $nastik_next_post->ID ) : '';
                                            $nastik_title = is_object( $nastik_next_post ) ? get_the_title( $nastik_next_post->ID ) : ''; 
											if ($nastik_next_post) {
											$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $nastik_next_post->ID ), 'nastik_portfolio_image' );
											}
											?>
											<?php if ($nastik_next_post) { ?>
                                                    <a href="<?php echo esc_url( $nastik_url ) ?>" class="rn"><span ><?php if(!empty($nastik_options['translet_opt_20'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_20',''));?> - <?php else: ?><?php esc_html_e('Next - ','nastik');?><?php endif;?><?php echo esc_html( $nastik_title ) ?></span> <i class="fal fa-long-arrow-right"></i></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="rn"><span ><?php if(!empty($nastik_options['translet_opt_26'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_26',''));?><?php else: ?><?php esc_html_e('Back To Shop','nastik');?><?php endif;?></span> <i class="fal fa-long-arrow-right"></i></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--content-nav_holder end -->
<?php do_action( 'woocommerce_after_single_product' ); ?>
</div>
</div>
<div class="sec-lines"></div>
<div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>
</section>
</div>
<div class="limit-box fl-wrap"></div>
<?php } ;?>