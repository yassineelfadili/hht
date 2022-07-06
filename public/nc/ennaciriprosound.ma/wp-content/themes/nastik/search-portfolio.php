<?php $nastik_options = get_option('nastik'); ?>
<?php get_header();?>
<!--content -->
                    <div class="content dark-content portf-wrap">
					 <!--fixed-column-wrap end -->      
                        <div class="fixed-column-wrap">
                            <div class="progress-bar-wrap">
                                <div class="progress-bar color-bg"></div>
                            </div>
                            <div class="column-image fl-wrap full-height">
                                <div class="bg"  data-bg="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('port_search_back','url'));?>"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="fcw-dec"></div>
                            <div class="fixed-column-tilte  fcw-title"><span><?php if(!empty($nastik_options['search-page-title'])):?><?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('search-page-title',''));?><?php else :?><?php esc_html_e('Search','nastik');?><?php endif;?></span></div>
                        </div>
                        <!--fixed-column-wrap end -->  
						<!--column-wrap -->
                        <div class="column-wrap  ">						
                        <!--fixed-top-panel-->
						
						<div class="fixed-top-panel fl-wrap">
                                <div class="sp-fix-header fl-wrap">
                                    <div class="scroll-down-wrap">
                                        <div class="mousey">
                                            <div class="scroller"></div>
                                        </div>
                                        <span><?php if(!empty($nastik_options['translet_opt_3'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_3',''));?><?php else: ?><?php esc_html_e('Scroll down  to discover','nastik');?><?php endif;?></span>
                                    </div>
									<?php if (nastik_AfterSetupTheme::return_thme_option('headersearch_port_opt')!='st1'){ ?>
									<div class="search-btn port-no-filter-search"><i class="fal fa-search"></i><span><?php if(!empty($nastik_options['search_bt_title1'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('search_bt_title1',''));?><?php else: ?><?php esc_html_e('Search','nastik');?><?php endif;?></span></div>
									<?php } ;?>
									<?php if(!empty($nastik_options['portpageurl'])):?>
                                    <a href="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('portpageurl',''));?>" class="ajax back-to-home-btn"><span><?php if(!empty($nastik_options['translet_opt_22'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_22',''));?><?php else: ?><?php esc_html_e('Back To Portfolio','nastik');?><?php endif;?></span></a>
									<?php endif;?>
                                </div>
								<div class="blog-search-wrap"><form action="<?php echo esc_url( home_url( '/'  ) ); ?>"><input name="s" id="se" type="text" class="search" placeholder="<?php if(!empty($nastik_options['search_bt_title2'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('search_bt_title2',''));?>..<?php else: ?><?php esc_html_e('Type and click Enter to search..','nastik');?><?php endif;?>" value="" /><input type="hidden" name="post_type" value="portfolio" /></form></div>
                            </div>
						
                        <!--fixed-top-panel end -->
                        <!-- portfolio start -->
                        <div class="gallery-items min-pad  vis-det   fl-wrap  ">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                                    <img  src="<?php echo esc_url($nastik_image[0]);?>"    alt="<?php the_title_attribute();?>">
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
							<?php endwhile; wp_reset_postdata(); ?>  
							<?php else : ?>
							 <!-- gallery-item-->
                            <div class="gallery-items-port-search">
                                <div class="grid-item-holder hov_zoom">
                                <h2><?php if(!empty($nastik_options['translet_opt_23'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_23',''));?><?php else: ?><?php esc_html_e('No Item Found','nastik');?><?php endif;?></h2>
                                </div>
                                <div class="pr-bg"></div>
                            </div>
							<?php endif; wp_reset_postdata(); ?>							
                        </div>
                        <!-- portfolio end -->
                    </div>
                    </div>
                    <!--content  end -->
                    <div class="limit-box fl-wrap"></div>
<?php get_footer(); ?>