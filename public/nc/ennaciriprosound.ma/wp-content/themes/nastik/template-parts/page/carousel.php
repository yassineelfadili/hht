<?php $nastik_options = get_option('nastik'); ?>
 <!--content -->
                    <div class="content">
                        <!-- section  --> 
						<!-- fw-carousel-wrap -->
                        <div class="fw-carousel-wrap show-case-slider-wrap   fl-wrap page-new-car-class">
                            <!-- fw-carousel  -->
                            <div class="fw-carousel  fs-gallery-wrap fl-wrap full-height lightgallery" data-mousecontrol="0">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
									<?php
									$nastik_car_slide_opt = rwmb_meta( 'rnr_so_page_po_gallery' );
									if ( ! empty( $nastik_car_slide_opt ) ) {
									foreach ( $nastik_car_slide_opt as $nastik_car_slide_opts ) { ;?>
									<?php $nastik_gallery_pop = isset( $nastik_car_slide_opts['rnr_ns_page_gallery_video_opt'] ) ? $nastik_car_slide_opts['rnr_ns_page_gallery_video_opt'] : ''; ?>
									<?php $nastik_image_ids = isset( $nastik_car_slide_opts['rnr_page-image-popu'] ) ? $nastik_car_slide_opts['rnr_page-image-popu'] : array();
									foreach ( $nastik_image_ids as $nastik_image_id ) {
									$nastik_image = RWMB_Image_Field::file_info( $nastik_image_id, array( 'size' => '' ) ); ?>
                                        <!-- swiper-slide-->
                                        <div class="swiper-slide hov_zoom">
                                            <img  src="<?php echo esc_url(($nastik_image['url']));?>"   alt="<?php echo esc_html(($nastik_image['title']));?>">
                                            <?php if ( !empty( $nastik_gallery_pop ) ) { ?>
											<a href="<?php echo esc_html($nastik_gallery_pop);?>" class="box-media-zoom   image-popup"><i class="fal fa-play"></i></a>
											<?php } else { ?>
											<a href="<?php echo esc_url(($nastik_image['url']));?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
											<?php } ;?>
                                            <span class="slide-numb"></span>
											<?php if(get_post_meta($post->ID,'rnr_ns_page_car_info_enable_opt',true)=='st2'){?>
                                            <div class="show-info">
												<?php if (( get_post_meta($post->ID,'rnr_ns_page_car_info_translate_opt',true))):?>
                                                <span><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_car_info_translate_opt',true)); ?></span>
												<?php else : ?>
                                                <span><?php esc_html_e('Info','nastik');?></span>
												<?php endif;?>
                                                <div class="tooltip-info">
                                                    <h5><?php echo esc_html(($nastik_image['title']));?></h5>
                                                    <p><?php echo esc_html(($nastik_image['caption']));?></p>
                                                </div>
                                            </div>
											<?php } ;?>
                                            <div class="pr-bg"></div>
                                        </div>
                                        <!-- swiper-slide end-->
                                        <?php } } } ;?>
                                    </div>
                                </div>
                            </div>
                            <!-- fw-carousel end -->
                            <div class="fw-carousel-button-prev fcb"><i class="fal fa-angle-left"></i></div>
                            <div class="fw-carousel-button-next fcb"><i class="fal fa-angle-right"></i></div>
                            <div class="fw-carousel_pagination-wrap">
                                <div class="container">
                                    <div class="fw-carousel_pagination"></div>
                                </div>
                            </div>
                        </div>
                        <!-- fw-carousel-wrap end -->
                        <!-- section end --> 
                        <!-- section --> 
                        <section class="no-bottom-padding">
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
							<?php if(get_post_meta($post->ID,'rnr_wr_pagetype_sec_line_opt',true)!='st2'){ ?>
                                <div class="sec-lines"></div>
							<?php } ;?>
                            <?php if(get_post_meta($post->ID,'rnr_wr_pagetype_bottom_block',true)!='st2'){ ?>
                                <div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>
							<?php } ;?>
                        </section>
                    </div>
                    <!--content  end -->
                    <div class="limit-box fl-wrap"></div>