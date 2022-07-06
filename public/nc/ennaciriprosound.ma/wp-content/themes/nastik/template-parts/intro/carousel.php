<div class="hero-wrap fl-wrap full-height scroll-con-sec hidden-section" id="sec1" data-scrollax-parent="true">
                        <!-- fw-carousel-wrap -->
                        <div class="fw-carousel-wrap fsc-holder full-height dark-bg fl-wrap">
                            <!-- fw-carousel  -->
                            <div class="grid-carousel   fl-wrap full-height lightgallery">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
									<?php if(get_post_meta($post->ID,'rnr_ns_home_intro_car_new_opt',true)=='st2'){ ?>
									<?php
									$nastik_cus_car_main_opt = rwmb_meta( 'rnr_md_po_car_cus_gallery' );
									if ( ! empty( $nastik_cus_car_main_opt ) ) {
									foreach ( $nastik_cus_car_main_opt as $nastik_cus_car_main_opts ) { ;?>
									<?php $nastik_intro_title = isset( $nastik_cus_car_main_opts['rnr_md_car_cus_gallery_intro_title_opt'] ) ? $nastik_cus_car_main_opts['rnr_md_car_cus_gallery_intro_title_opt'] : ''; ?>
									<?php $nastik_intro_subtitle = isset( $nastik_cus_car_main_opts['rnr_md_car_cus_gallery_intro_sub_title_opt'] ) ? $nastik_cus_car_main_opts['rnr_md_car_cus_gallery_intro_sub_title_opt'] : ''; ?>
									<?php $nastik_intro_buttonurl = isset( $nastik_cus_car_main_opts['rnr_md_car_cus_intro_buttonurl_opt'] ) ? $nastik_cus_car_main_opts['rnr_md_car_cus_intro_buttonurl_opt'] : ''; ?>
									<?php $nastik_image_ids = isset( $nastik_cus_car_main_opts['rnr_md_po_car_cus_gallery_img'] ) ? $nastik_cus_car_main_opts['rnr_md_po_car_cus_gallery_img'] : array();
									foreach ( $nastik_image_ids as $nastik_image_id ) {
									$nastik_image = RWMB_Image_Field::file_info( $nastik_image_id, array( 'size' => '' ) ); ?>
									<!-- swiper-slide-->
                                        <div class="swiper-slide hov_zoom">
                                            <div class="bg"  data-bg="<?php echo esc_url(($nastik_image['url']));?>" ></div>
                                            <a href="<?php echo esc_url(($nastik_image['url']));?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                            <div class="carousel-item_number"></div>
                                            <div class="overlay"></div>
                                            <div class="carousel-title-wrap">
												<?php if ( !empty( $nastik_intro_title ) ) { ?>
                                                <h2><a href="<?php if ( !empty( $nastik_intro_buttonurl ) ) { ?><?php echo esc_url($nastik_intro_buttonurl);?><?php } else { ?>#<?php } ?>"><?php echo esc_html($nastik_intro_title);?><i class="fal fa-long-arrow-right"></i></a></h2>
												<?php } ?>
                                                <p><?php echo esc_html($nastik_intro_subtitle);?></p>
                                            </div>
                                           
                                            <div class="pr-bg"></div>
                                        </div>
                                        <!-- swiper-slide end-->
									<?php } ?>
									<?php } } ;?>
									<?php } else { ?>
									<?php global $post, $post_id;?>
									<?php $nastik_showpost= get_post_meta($post->ID, 'rnr_ns_intro_car_po_co', true); $nastik_categoryname= get_post_meta($post->ID, 'rnr_ns_intro_car_po', true);
									$nastik_postoffset= get_post_meta($post->ID, 'rnr_ns_intro_opt_car_postoffset', true);
									$nastik_paged=(get_query_var('paged'))?get_query_var('paged'):1;
									$nastik_loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page'=>$nastik_showpost, 'portfolio_category'=> $nastik_categoryname, 'offset' => $nastik_postoffset, 'paged'=>$nastik_paged ) ); ?>
									<?php $nastik_counter = 01;?>
									<?php while ( $nastik_loop->have_posts() ) : $nastik_loop->the_post();?>
						
									<?php $nastik_portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');?>
									<?php 
									$nastik_class = ""; 
									$nastik_categories = ""; 
									foreach ($nastik_portfolio_category as $nastik_item) {
										$nastik_class.=esc_attr($nastik_item->slug . ' ');
										$nastik_categories.='<a>';
										$nastik_categories.=esc_attr($nastik_item->name . '  ');
										$nastik_categories.='</a>';
									}?>
									<?php if (has_post_thumbnail( $post->ID ) ):
									$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
                                        <!-- swiper-slide-->
                                        <div class="swiper-slide hov_zoom">
                                            <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>" ></div>
                                            <a href="<?php echo esc_url($nastik_image[0]);?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                            <div class="carousel-item_number">.0<?php echo esc_html($nastik_counter);?></div>
                                            <div class="overlay"></div>
                                            <div class="carousel-title-wrap">
                                                <h2><a href="<?php the_permalink();?>" class="ajax"><?php the_title();?><i class="fal fa-long-arrow-right"></i></a></h2>
                                                <?php the_excerpt();?>
                                            </div>
                                            <div class="carousle-item-number"><span>0<?php echo esc_html($nastik_counter);?>.</span></div>
                                            <div class="pr-bg"></div>
                                        </div>
                                        <!-- swiper-slide end-->
                                        <?php endif;?>
										<?php $nastik_counter++;?>
										<?php endwhile;
										wp_reset_postdata();?>
										<?php } ;?>
                                    </div>
                                </div>
                            </div>
                            <!-- fw-carousel end -->
                            <div class="ss-slider-cont ss-slider-cont-prev  "><i class="fal fa-long-arrow-left"></i></div>
                            <div class="ss-slider-cont ss-slider-cont-next  "><i class="fal fa-long-arrow-right"></i></div>
                        </div>
                        <!-- fw-carousel-wrap end --> 
                        <!-- hero  elements--> 
                        <div class="hero-border hb-top"></div>
                        <div class="hero-border hb-bottom"></div>
                        <div class="hero-border hb-right"></div>
                        <!-- hero  elements end--> 
                    </div>