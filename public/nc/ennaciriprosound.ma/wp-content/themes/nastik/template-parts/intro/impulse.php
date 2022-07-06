<div class="hero-wrap fl-wrap full-height scroll-con-sec" id="sec1">
                        <div class="impulse-wrap">
                            <div class="pr-bg"></div>
                            <div class="mm-par-wrap">
                                <div class="mm-parallax">
                                    <div class="overlay"></div>
								<?php $nastik_images = rwmb_meta( 'rnr_ns_intro_back_impulse_image','type=image&size=' );
								 foreach ( $nastik_images as $nastik_image ){ ?>
                                    <div class="bg" data-bg="<?php echo esc_url(($nastik_image['url']));?>"></div>
								<?php } ;?>
                                    <div class="hero-wrap-item fl-wrap">
                                        <div class="container">
                                            <div class="fl-wrap section-entry hiddec-anim">
											<?php 
												global $nastik_title_tag;
												if(get_post_meta($post->ID,'rnr_wr_impulse_title_tag',true)=='h2') { 
													$nastik_title_tag ='h2';
												} 
												else if(get_post_meta($post->ID,'rnr_wr_impulse_title_tag',true)=='h3') {
													$nastik_title_tag ='h3';												
												}
												else if(get_post_meta($post->ID,'rnr_wr_impulse_title_tag',true)=='h4') {
													$nastik_title_tag ='h4';												
												}
												else if(get_post_meta($post->ID,'rnr_wr_impulse_title_tag',true)=='h5') {
													$nastik_title_tag ='h5';												
												}
												else if(get_post_meta($post->ID,'rnr_wr_impulse_title_tag',true)=='h6') {
													$nastik_title_tag ='h6';												
												}
												else {
													$nastik_title_tag ='h1';
												}
											?>
											<?php if (( get_post_meta($post->ID,'rnr_ns_intro_impulse_image_title',true))):?>
                                                <<?php echo esc_attr($nastik_title_tag);?> class="hero-impulse-title"><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_intro_impulse_image_title',true)); ?> </<?php echo esc_attr($nastik_title_tag);?>>
											<?php endif;?>
											<?php if (( get_post_meta($post->ID,'rnr_ns_intro_impulse_image_sub_title',true))):?>
                                                <h3><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_intro_impulse_image_sub_title',true)); ?></h3>
											<?php endif;?>
											<?php 
											global $nastik_buton_class;
											if(get_post_meta($post->ID,'rnr_ns_intro_impulse_image_button_type',true)!='st2'){
											$nastik_buton_class="custom-scroll-link";
											} ;?>
											<?php if (( get_post_meta($post->ID,'rnr_ns_intro_impulse_image_button_url',true))):?>
                                                <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_ns_intro_impulse_image_button_url',true)); ?>" class="btn <?php echo sanitize_html_class($nastik_buton_class);?>  color-bg"><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_intro_impulse_image_button_text',true)); ?></a>
											<?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sec-lines"></div>
                        </div>
                        <!-- hero  elements--> 
                        <div class="hero-border hb-top"></div>
                        <div class="hero-border hb-bottom"></div>
                        <div class="hero-border hb-right"></div>
						<?php if(get_post_meta($post->ID,'rnr_ns_intro_impulse_image_corner_border',true)!='st2'){ ?>
                        <div class="hero-corner hiddec-anim"></div>
                        <div class="hero-corner2 hiddec-anim"></div>
                        <div class="hero-corner3 hiddec-anim"></div>
						<?php } ;?>
						<?php if (( get_post_meta($post->ID,'rnr_ns_intro_impulse_image_scroll_button_text',true))):?>
                        <div class="scroll-down-wrap sdw_hero hiddec-anim">
                            <div class="mousey">
                                <div class="scroller"></div>
                            </div>
                            <span><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_intro_impulse_image_scroll_button_text',true)); ?></span>
                        </div>
						<?php endif;?>
                        <!-- hero  elements end--> 
                    </div>