<?php $nastik_options = get_option('nastik'); ?>
<?php get_header();?>
<?php global $nastik_image;?>
<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
<?php if (has_post_thumbnail( $post->ID ) ):
$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
<?php endif;?>
<!-- fixed-column-wrap -->       
                    <div class="fixed-column-wrap">
                        <div class="progress-bar-wrap">
                            <div class="progress-bar color-bg"></div>
                        </div>
                        <div class="column-image fl-wrap full-height">
						<?php $nastik_back_image = rwmb_meta( 'rnr_ns_service_details_page_header_back_st1','type=image&size=' ); ?>
						<?php if ( ! empty( $nastik_back_image ) ) { ?>
						<?php foreach ( $nastik_back_image as $nastik_back_images ){ ?>
                            <div class="bg"  data-bg="<?php echo esc_url(($nastik_back_images['url']));?>"></div>
						<?php } ;?>
						<?php } else { ?>
						<div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
						<?php } ;?>
                            <div class="overlay"></div>
                            <div class="column-image-anim"></div>
                        </div>
                        <div class="fcw-dec"></div>
                        <div class="fixed-column-tilte fcw-title"><h1><span><?php if (( get_post_meta($post->ID,'rnr_ns_service_details_page_header_title_st1',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_service_details_page_header_title_st1',true)); ?><?php else: ?><?php the_title();?><?php endif;?></h1></span></div>
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
                                        <span><?php if(get_post_meta($post->ID,'rnr_ns_service_details_page_header_translate_op1_st1',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_service_details_page_header_translate_op1_st1',true));?> <?php else : ?><?php esc_html_e('Scroll down  to discover','nastik');?><?php endif;?></span>
                                    </div>
									
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ajax back-to-home-btn"><span><?php if(get_post_meta($post->ID,'rnr_ns_service_details_page_header_translate_op1_st2',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_service_details_page_header_translate_op1_st2',true));?> <?php else : ?><?php esc_html_e('Back to home','nastik');?><?php endif;?></span></a>
									
                                </div>
                            </div>
                            <!--section -->
                            <section   class="hidden-section bot-element no-bottom-padding class-min-height">
							
                                <div class="col-wc_dec"></div>
							
									
                                <div class="container wr-default-page">
                                    
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
                               
                                </div>
								<div class="clearfix"></div>
								
							
                                <div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>
													
                                
                            </section>
                            <!--section end -->
                            <div class="limit-box fl-wrap"></div>
                        </div>
                    </div>
                    <!--content  end -->
<?php endwhile;  endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>