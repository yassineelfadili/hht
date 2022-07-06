<?php $nastik_options = get_option('nastik'); ?>
<!-- fixed-column-wrap -->       
                    <div class="fixed-column-wrap">
                        <div class="progress-bar-wrap">
                            <div class="progress-bar color-bg"></div>
                        </div>
                        <div class="column-image fl-wrap full-height">
                            <div class="bg"  data-bg="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('blog_sidebar_back_opt','url'));?>"></div>
                            <div class="overlay"></div>
                            <div class="column-image-anim"></div>
                        </div>
                        <div class="fcw-dec"></div>
                        <div class="fixed-column-tilte fcw-title"><span><?php if(!empty($nastik_options['search-page-title'])):?><?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('search-page-title',''));?><?php else :?><?php esc_html_e('Search','nastik');?><?php endif;?></span></div>
                    </div>
                    <!-- fixed-column-wrap end -->
<!-- column-wrap -->
                    <div class="column-wrap  ">
                        <!--content -->
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
                                    <?php if (nastik_AfterSetupTheme::return_thme_option('headersearch_opt')!='st1'){ ?>
                                    <div class="search-btn"><i class="fal fa-search"></i><span><?php if(!empty($nastik_options['search_bt_title1'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('search_bt_title1',''));?><?php else: ?><?php esc_html_e('Search','nastik');?><?php endif;?></span></div>
									<?php } ;?>
									<?php if (nastik_AfterSetupTheme::return_thme_option('headercatlist_opt')!='st1'){ ?>
                                    <?php if(!get_post_meta(get_the_ID(), 'category', true)):
									$nastik_post_category = get_terms('category');?>
									<?php if($nastik_post_category):?>
                                    <!-- filter category    -->
                                    <div class="category-filter blog-btn-filter">
                                        <div class="blog-btn"><?php if(!empty($nastik_options['cat_list_bt_title1'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('cat_list_bt_title1',''));?> <?php else: ?><?php esc_html_e('Categories ','nastik');?><?php endif;?> <i class="fa fa-list-ul" aria-hidden="true"></i></div>
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
                                <div class="blog-search-wrap"><form action="<?php echo esc_url( home_url( '/'  ) ); ?>"><input name="s" id="se" type="text" class="search" placeholder="<?php if(!empty($nastik_options['search_bt_title2'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('search_bt_title2',''));?>..<?php else: ?><?php esc_html_e('Type and click Enter to search..','nastik');?><?php endif;?>" value="" /></form></div>
                            </div>
                            <!-- fixed-top-panel end -->
							<?php if(have_posts()) : ?>
							<?php global $post, $post_id;
							$nastik_counter=1;
							?>
							<?php while ( have_posts() ) : the_post();?>
                            <!--section -->
                            <section   class="hidden-section article bot-element">
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if ($nastik_counter == 1) :?>
                                <div class="col-wc_dec"></div>
							<?php endif;?>
                                <div class="container">
                                    <div class="section-title fl-wrap post-title">
                                        <h3><a href="<?php the_permalink()?>" class="ajax"><?php the_title();?></a></h3>
                                        <div class="post-header"> <a href="<?php the_permalink()?>"><?php the_time( get_option( 'date_format' ) ); ?></a><?php if( has_category() ) {?><span><?php if(!empty($nastik_options['translet_opt_4'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_4',''));?>: <?php else: ?><?php esc_html_e('Category : ','nastik');?><?php endif;?> </span><?php the_category(' ') ?><?php }?> </div>
                                    </div>
                                    <!-- blog media -->
                                            <?php if( has_post_format( 'image' ) !='') :?>
											<?php get_template_part('template-parts/posttype/image');?>	
											<?php elseif( has_post_format( 'video' ) !='') :?>
											<?php get_template_part('template-parts/posttype/video');?>
											<?php elseif( has_post_format( 'gallery' ) !='') :?>
											<?php get_template_part('template-parts/posttype/gallery');?>
											<?php else :?>
											<?php get_template_part('template-parts/posttype/image');?>	
											<?php endif;?>
                                    <!-- blog media end --> 
                                    <div class="post-block fl-wrap">
                                        <div class="post-opt fl-wrap">
										<?php
										if(!empty($nastik_options['translet_opt_8'])):
										$nastik_comment_text= esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_8',''));;
										else: 
										$nastik_comment_text='Comment';
										endif;
										if(!empty($nastik_options['translet_opt_9'])):
										$nastik_comment_text2= esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_9',''));;
										else: 
										$nastik_comment_text2='Comment';
										endif;
										?>
                                            <ul>
                                                <li><a href="<?php the_permalink()?>"><i class="fal fa-user"></i> <?php the_author();?></a></li>
                                                <li><a href="<?php the_permalink()?>"><i class="fal fa-comments-alt"></i> <?php echo esc_attr(comments_number( '0 '.$nastik_comment_text.'', '1 '.$nastik_comment_text.'', '% '.$nastik_comment_text2.'' )); ?></a></li>
												<?php if(function_exists('the_views')) {?>
                                                <li><span><i class="fal fa-eye"></i> <?php  the_views(); ?></span></li>
												<?php } ?>
                                            </ul>
                                        </div>
                                        <?php if( wp_link_pages('echo=0') ): ?>
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
										<?php else : ?>
                                        <?php the_excerpt();?>
										<?php endif;?>
                                        <a href="<?php the_permalink();?>" class="btn ajax  fl-btn color-bg"><?php if(!empty($nastik_options['translet_opt_5'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_5',''));?><?php else: ?><?php esc_html_e('Read more','nastik');?><?php endif;?></a>
                                    </div>
                                    <div class="sec-number">0<?php echo esc_attr($nastik_counter);?>.</div>
                                </div>
                                </div>
                            </section>
                            <!--section end -->
							<div class="section-separator bot-element"><span class="fl-wrap"></span></div>
                             <?php 
							 $nastik_counter++;
							 endwhile; ?>
							 <?php wp_reset_postdata();?>
							 <?php else : ?>
							 <section   class="hidden-section h-100vh bot-element">
							<div class="col-wc_dec"></div>
								<div class="container">
								<div class="error-wrap error-search-wrap fl-wrap">
											<h3><?php if(!empty($nastik_options['translet_opt_23'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_23',''));?><?php else: ?><?php esc_html_e('No Item Found','nastik');?><?php endif;?></h3>
											<p><?php if(!empty($nastik_options['translet_opt_24'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_24',''));?><?php else: ?><?php esc_html_e('Please Search Again.','nastik');?><?php endif;?></p>
											<div class="clearfix"></div>
											<form action="<?php echo esc_url( home_url( '/'  ) ); ?>">
												<input name="s" id="se2" type="text" class="search" placeholder="<?php if(!empty($nastik_options['translet_opt_7'])):?><?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('translet_opt_7',''));?><?php else: ?><?php esc_attr_e('Search..','nastik');?><?php endif;?>" value="<?php if(!empty($nastik_options['translet_opt_7'])):?><?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('translet_opt_7',''));?><?php else: ?><?php esc_attr_e('Search..','nastik');?><?php endif;?>">
												<button class="search-submit color-bg" id="err_submit_btn"><i class="fa fa-search"></i> </button>
											</form>
												
											
										</div> 
								</div>
							</section>
							 <?php endif;?>
                            <!--pagination-->   
                            <?php if (function_exists("nastik_pagination")) {
							nastik_pagination($wp_query->max_num_pages);
							} ?>
                            <!--pagination end-->                             
                            <div class="limit-box fl-wrap"></div>
                        </div>
                    </div>
                    <!--content  end -->