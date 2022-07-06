									<?php $nastik_images = rwmb_meta( 'rnr_wr_galleryimg_blog','type=image&size=' ); ?>
									<?php if ( ! empty( $nastik_images ) ) { ?>							
									
									<div class="media-wrap  lightgallery  fl-wrap">
                                        <div class="single-slider-wrap">
                                            <div class="single-slider fl-wrap">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper lightgallery">
													<?php foreach ( $nastik_images as $nastik_image ){ ?>
                                                        <div class="swiper-slide hov_zoom"><img src="<?php echo esc_url(($nastik_image['url']));?>" alt="<?php echo esc_attr(($nastik_image['title']));?>"><a href="<?php echo esc_url(($nastik_image['url']));?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                     <?php } ;?>   
                                                    </div>
                                                </div>
                                                <div class="ss-slider-cont ss-slider-cont-prev  "><i class="fal fa-long-arrow-left"></i></div>
                                                <div class="ss-slider-cont ss-slider-cont-next  "><i class="fal fa-long-arrow-right"></i></div>
                                                <div class="ss-slider-controls">
                                                    <div class="ss-slider-pagination"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php } ;?>