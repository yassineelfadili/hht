<?php $nastik_options = get_option('nastik'); ?>
 <!--content -->
                    <div class="content">
                        <!-- section  --> 
						<?php if (has_post_thumbnail( $post->ID ) ):
					    $nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
						<?php endif;?>
                        <section class="header-section hidden-section" data-scrollax-parent="true">
                            <div class="bg par-elem"  data-bg="<?php echo esc_url($nastik_image[0]);?>" data-scrollax="properties: { translateY: '30%' }"></div>
                            <div class="overlay"></div>
                            <div class="container">
                                <div class="single-page-title hiddec-anim fl-wrap">
                                    <?php if (( get_post_meta($post->ID,'rnr_ns_page_header_title_opt',true))):?>	
                                    <h1><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_header_title_opt',true)); ?></h1>
									<?php else: ?>
                                    <h1><?php the_title();?></h1>
									<?php endif;?>
									<?php if (( get_post_meta($post->ID,'rnr_ns_page_header_sub_title_opt',true))):?>	
                                    <p><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_header_sub_title_opt',true)); ?>  </p>
									<?php endif;?>
                                </div>
                                <div class="hero-corner"></div>
                                <div class="scroll-down-wrap hiddec-anim">
                                    <div class="mousey">
                                        <div class="scroller"></div>
                                    </div>
                                    <span><?php if(get_post_meta($post->ID,'rnr_ns_page_header_translate_opt',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_page_header_translate_opt',true));?> <?php else : ?><?php esc_html_e('Scroll down  to discover','nastik');?><?php endif;?></span>
                                </div>
                            </div>
                            <div class="fcw-dec"></div>
                        </section>
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