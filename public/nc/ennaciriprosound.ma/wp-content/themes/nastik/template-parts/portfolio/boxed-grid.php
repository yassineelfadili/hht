<?php $nastik_options = get_option('nastik'); ?>

<!--content -->
                    <div class="content">
                        <!-- section  --> 
                        <section class="header-section hidden-section" data-scrollax-parent="true">
						<?php if (has_post_thumbnail( $post->ID ) ):
					    $nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
						<?php endif;?>
                            <div class="bg par-elem"  data-bg="<?php echo esc_url($nastik_image[0]);?>" data-scrollax="properties: { translateY: '30%' }"></div>
                            <div class="overlay"></div>
                            <div class="container">
                                <div class="single-page-title hiddec-anim fl-wrap">
									<?php if (( get_post_meta($post->ID,'rnr_ns_port_page_st5_title',true))):?>	
                                    <h1><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_page_st5_title',true)); ?></h1>
									<?php else: ?>
                                    <h1><?php the_title();?></h1>
									<?php endif;?>
									<?php if (( get_post_meta($post->ID,'rnr_ns_port_page_st5_des',true))):?>	
                                    <p><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_page_st5_des',true)); ?>  </p>
									<?php endif;?>
                                </div>
                                <div class="hero-corner"></div>
                                <div class="scroll-down-wrap hiddec-anim">
                                    <div class="mousey">
                                        <div class="scroller"></div>
                                    </div>
                                    <span><?php if(get_post_meta($post->ID,'rnr_ns_port_page_translate_opt3',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_page_translate_opt3',true));?> <?php else : ?><?php esc_html_e('Scroll down  to discover','nastik');?><?php endif;?></span>
                                </div>
                            </div>
                            <div class="fcw-dec"></div>
                        </section>
                        <!-- section end --> 
                        <!-- section --> 
                        <section class="no-bottom-padding">
                            <div class="col-wc_dec"></div>
                            <div class="container">
							<?php if (( get_post_meta($post->ID,'rnr_ns_port_page_filter',true))!='no'):?>
							<?php if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
							$nastik_portfolio_category = get_terms('portfolio_category');?>
							<?php if($nastik_portfolio_category):?>
                                <div class="inline-folio-filters fl-wrap hiddec-anim">
                                    <div class="fixed-filter-panel_title color-bg">
                                        <?php if(get_post_meta($post->ID,'rnr_ns_port_page_translate_opt1',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_page_translate_opt1',true));?> <?php else : ?><?php esc_html_e('Works Filter ','nastik');?><?php endif;?> <i class="fal fa-long-arrow-right"></i>
                                    </div>
                                    <div class="gallery-filters inline-dark-filters">
                                        <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*"><?php if(get_post_meta($post->ID,'rnr_ns_port_page_translate_opt2',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_page_translate_opt2',true));?> <?php else : ?><?php esc_html_e('All projects','nastik');?><?php endif;?></a>
                                        <?php  foreach($nastik_portfolio_category as $nastik_portfolio_cat):?>
										<a href="#" class="gallery-filter" data-filter=".<?php echo esc_attr($nastik_portfolio_cat->slug);?>"><?php echo esc_html($nastik_portfolio_cat->name);?></a>
										<?php endforeach;?>
                                    </div>
                                    <?php if(get_post_meta($post->ID,'rnr_ns_port_page_load_more',true)=='st2'){ ?>
							<div class="folio-counter ns-no-before">
								<div class="all-album"></div>
                            </div>
							<?php } else { ?>
                            <div class="folio-counter">
                                <div class="num-album"></div>
                                <div class="all-album"></div>
                            </div>
							<?php } ;?>
                                </div>
								<?php endif;?>
								<?php endif;?>
								<?php endif;?>
                                <!-- portfolio start -->
								<div class="container-after  fl-wrap  ">
								<?php 
								$nastik_showpost= get_post_meta($post->ID, 'rnr_ns_port_page_item_show_opt', true); 
								$nastik_loadpost= get_post_meta($post->ID, 'rnr_ns_port_page_item_load_opt', true);
								?>
                                <div class="gallery-items min-pad     fl-wrap  hiddec-anim" <?php if(get_post_meta($post->ID,'rnr_ns_port_page_load_more',true)=='st2'){ ?>data-load-item="<?php echo esc_attr($nastik_loadpost);?>" <?php } else { ?>data-load-item="<?php echo esc_attr($nastik_showpost);?>"<?php } ;?> data-button-text="<?php if(get_post_meta($post->ID,'rnr_ns_port_page_translate_opt5',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_page_translate_opt5',true));?> <?php else : ?><?php esc_html_e('Load More','nastik');?><?php endif;?>">
								<?php global $post, $post_id;?>
								<?php 
								$nastik_categoryname= get_post_meta($post->ID, 'rnr_ns_port_page_cat_opt', true);
								$nastik_offset= get_post_meta($post->ID, 'rnr_ns_port_page_offset_opt', true);
								$nastik_paged=(get_query_var('paged'))?get_query_var('paged'):1;
								$nastik_loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page'=>$nastik_showpost, 'portfolio_category'=> $nastik_categoryname, 'paged'=>$nastik_paged, 'offset' => $nastik_offset ) ); ?>
								<?php while ( $nastik_loop->have_posts() ) : $nastik_loop->the_post();?>
								<?php $nastik_portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');?>
								<?php 
								$nastik_class = ""; 
								$nastik_categories = ""; 
								foreach ($nastik_portfolio_category as $nastik_item) {
								$nastik_class.=esc_attr($nastik_item->slug . ' ');
								$nastik_categories.='<a href="'.get_category_link($nastik_item->term_id).'">';
								$nastik_categories.=esc_attr($nastik_item->name . '  ');
								$nastik_categories.='</a>';
								}?>
								<?php if (has_post_thumbnail( $post->ID ) ):
								$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
                                    <!-- gallery-item-->
                                    <div class="gallery-item  <?php echo (get_post_meta($post->ID,'rnr_post-box-width',true)) ?> <?php echo esc_attr($nastik_class);?>">
                                        <div class="grid-item-holder hov_zoom">
                                            <?php if (nastik_AfterSetupTheme::return_thme_option('port_page_img_url_opt')=='st2'){ ?>
											<a href="<?php the_permalink();?>" class="ajax"><img  src="<?php echo esc_url($nastik_image[0]);?>" alt="<?php the_title_attribute();?>"></a>
											<?php } else { ?>
											<img  src="<?php echo esc_url($nastik_image[0]);?>" alt="<?php the_title_attribute();?>">
											<?php } ;?>
                                            <?php if(get_post_meta($post->ID,'rnr_post-popup-option',true)=='st2'){ ?> 
											<?php if (( get_post_meta($post->ID,'rnr_post_popup_video',true))):?>
											<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_post_popup_video',true)); ?>" class="box-media-zoom   image-popup"><i class="fal fa-play"></i></a>
											<?php endif;?>
											<?php } else { ?>
											<a href="<?php echo esc_url($nastik_image[0]);?>" class="box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
											<?php } ;?>
                                            <div class="grid-det">
                                                <div class="grid-det_category"><?php echo balanceTags($nastik_categories);?></div>
                                                <div class="grid-det-item">
                                                    <a href="<?php the_permalink();?>" class="ajax grid-det_link"><?php the_title();?><i class="fal fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pr-bg"></div>
                                    </div>
                                    <!-- gallery-item end-->
                                    <?php endif;?>
									<?php endwhile;
									wp_reset_postdata();?>   
                                </div>
                                </div>
								<div class="clear"></div>
                                <!-- portfolio end -->
                            </div>
                            <div class="clearfix"></div>
							
                            <div class="order-wrap  hiddec-anim fl-wrap">
							<?php 
							global $nastik_buton_class;
							if(get_post_meta($post->ID,'rnr_ns_port_call_to_button_type',true)!='st2'){
							$nastik_buton_class="ajax";
							} ;?>
                                <div class="container">
								<?php if (( get_post_meta($post->ID,'rnr_ns_port_call_to_button',true))):?>
                                    <div class="order-wrap-container fl-wrap">
                                        <div class="pr-bg pr-bg-white"></div>
                                        <h4><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_call_to_title',true)); ?> </h4>
                                        <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_ns_port_call_to_button',true)); ?>" class="<?php echo sanitize_html_class($nastik_buton_class);?> btn color-bg"><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_call_to_text',true)); ?></a>
                                    </div>
									<?php endif;?>
                                </div>
                            </div>
							
                            <div class="sec-lines"></div>
                            <div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>
                        </section>
                    </div>
                    <!--content  end -->
                    <div class="limit-box fl-wrap"></div>
