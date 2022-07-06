<?php $nastik_options = get_option('nastik'); ?>
<?php global $nastik_image;?>
<?php if (has_post_thumbnail( $post->ID ) ):
$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
<?php endif;?>
<!-- fixed-column-wrap -->       
                    <div class="fixed-column-wrap">
                        <div class="progress-bar-wrap">
                            <div class="progress-bar color-bg"></div>
                        </div>
                        <div class="column-image fl-wrap full-height">
                            <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                            <div class="overlay"></div>
                            <div class="column-image-anim"></div>
                        </div>
                        <div class="fcw-dec"></div>
                        <div class="fixed-column-tilte fcw-title"><h1><span><?php if (( get_post_meta($post->ID,'rnr_ns_page_header_title_opt',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_header_title_opt',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h1></span></div>
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
                                        <span><?php if(get_post_meta($post->ID,'rnr_ns_page_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll down  to discover','nastik');?><?php endif;?></span>
                                    </div>
									<?php if (class_exists('WooCommerce')) { ?>
									<?php  if ( is_cart() ) { ?>
									<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="ajax back-to-home-btn"><span><?php if(!empty($nastik_options['translet_opt_26'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_26',''));?><?php else: ?><?php esc_html_e('Back To Shop','nastik');?><?php endif;?></span></a>
									<?php } else if ( is_checkout() ) { ?>
									<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="ajax back-to-home-btn"><span><?php if(!empty($nastik_options['translet_opt_26'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_26',''));?><?php else: ?><?php esc_html_e('Back To Shop','nastik');?><?php endif;?></span></a>
									<?php } else if ( is_account_page() ) { ?>
									<a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="ajax back-to-home-btn"><span><?php if(!empty($nastik_options['translet_opt_26'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_26',''));?><?php else: ?><?php esc_html_e('Back To Shop','nastik');?><?php endif;?></span></a>
									<?php } else { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ajax back-to-home-btn"><span><?php if(get_post_meta($post->ID,'rnr_ns_page_header_translate_opt2',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_header_translate_opt2',true));?> <?php else : ?><?php esc_html_e('Back to home','nastik');?><?php endif;?></span></a>
									<?php } ;?>
									<?php } else { ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ajax back-to-home-btn"><span><?php if(get_post_meta($post->ID,'rnr_ns_page_header_translate_opt2',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_header_translate_opt2',true));?> <?php else : ?><?php esc_html_e('Back to home','nastik');?><?php endif;?></span></a>
									<?php } ;?>
                                </div>
                            </div>
                            <!--section -->
                            <section   class="hidden-section bot-element no-bottom-padding class-min-height">
							<?php if(get_post_meta($post->ID,'rnr_wr_pagetype_top_block',true)!='st2'){ ?>
                                <div class="col-wc_dec"></div>
							<?php } ;?>
									<?php 
									global $nastik_content_div_class;
									if(get_post_meta($post->ID,'rnr_wr_pagetype_container',true)=='st2'){
									$nastik_content_div_class="container-disable";
									} else {
									$nastik_content_div_class="container ";
									} ;?>
                                <div class="<?php echo esc_attr ($nastik_content_div_class);?> wr-default-page">
                                    <?php while ( have_posts() ) : the_post(); ?>
												<?php the_content();
												wp_link_pages( array(
												'before'      => '<div class="page-links">',
												'after'       => '</div>',
												'link_before' => '<span>',
												'link_after'  => '</span>',
												'pagelink'    => '%',
												'separator'   => '',
												) );
												?>
                               <?php endwhile; ?>
								<?php wp_reset_postdata();?> 
                                </div>
								<div class="clearfix"></div>
								<div class="order-wrap  hiddec-anim fl-wrap">
							<?php 
							global $nastik_buton_class;
							if(get_post_meta($post->ID,'rnr_ns_page_call_to_button_type',true)!='st2'){
							$nastik_buton_class="ajax";
							} ;?>
                                <div class="container">
								<?php if (( get_post_meta($post->ID,'rnr_ns_page_call_to_button',true))):?>
                                    <div class="order-wrap-container fl-wrap">
                                        <div class="pr-bg pr-bg-white"></div>
                                        <h4><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_call_to_title',true)); ?> </h4>
                                        <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_ns_page_call_to_button',true)); ?>" class="<?php echo sanitize_html_class($nastik_buton_class);?> btn color-bg"><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_call_to_text',true)); ?></a>
                                    </div>
									<?php endif;?>
                                </div>
                            </div>
							<?php if(get_post_meta($post->ID,'rnr_wr_pagetype_bottom_block',true)!='st2'){ ?>
                                <div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>
							<?php } ;?>								
                                
                            </section>
                            <!--section end -->
                            <div class="limit-box fl-wrap"></div>
                        </div>
                    </div>
                    <!--content  end -->