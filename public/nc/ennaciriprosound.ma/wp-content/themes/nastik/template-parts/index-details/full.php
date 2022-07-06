<?php $nastik_options = get_option('nastik'); ?>
<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
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
                        <div class="fixed-column-tilte fcw-title"><span><?php if(!empty($nastik_options['blogtitle'])):?><?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('blogtitle',''));?><?php else :?><?php esc_html_e('My Blog','nastik');?><?php endif;?></span></div>
                    </div>
                    <!-- fixed-column-wrap end -->
<!-- column-wrap -->
                    <div class="column-wrap  ">
                        <!--content -->
                        <div class="content">
                            <!-- fixed-top-panel -->
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
                                    <?php if (nastik_AfterSetupTheme::return_thme_option('headertaglist_opt')!='st1'){ ?>
									<?php if( has_tag() ) {?>
									<!-- filter tag   -->
                                    <div class="tag-filter blog-btn-filter">
                                        <div class="blog-btn"><?php if(!empty($nastik_options['tag_list_bt_title1'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('tag_list_bt_title1',''));?> <?php else: ?><?php esc_html_e('Tags ','nastik');?><?php endif;?><i class="fa fa-tags" aria-hidden="true"></i></div>
                                        <ul>
											<?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
										</ul>
                                    </div>
                                    <!-- filter tag end  -->
									<?php } ;?>
									<?php } ;?>
                                    <?php if (nastik_AfterSetupTheme::return_thme_option('headercatlist_opt')!='st1'){ ?>
                                    <!-- filter category    -->
                                    <div class="category-filter blog-btn-filter">
                                        <div class="blog-btn"><?php if(!empty($nastik_options['cat_list_bt_title1'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('cat_list_bt_title1',''));?> <?php else: ?><?php esc_html_e('Categories ','nastik');?><?php endif;?> <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                                       <?php the_category( '', '', '' ); ?>
                                       
                                    </div>
                                    <!-- filter category end  --> 
									<?php } ;?>
                                </div>
                                <div class="blog-search-wrap"><form action="<?php echo esc_url( home_url( '/'  ) ); ?>"><input name="s" id="se" type="text" class="search" placeholder="<?php if(!empty($nastik_options['search_bt_title2'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('search_bt_title2',''));?>..<?php else: ?><?php esc_html_e('Type and click Enter to search..','nastik');?><?php endif;?>" value="" /></form></div>
                            </div>
                            <!-- fixed-top-panel end -->
                            <!--section -->
                            <section   class="hidden-section bot-element">
                                <div class="col-wc_dec"></div>
                                <div class="container">
                                    <div class="section-title fl-wrap post-title">
                                        <h3><?php the_title();?></h3>
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
									<?php if (nastik_AfterSetupTheme::return_thme_option('blog_details_user')=='st2'){ ?>
                                    <!-- post-author-->                                   
                                    <div class="post-author">
                                        <div class="author-img">
                                            <?php
													// Display author avatar
													echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( '', 80 ) ); ?>	
                                        </div>
                                        <div class="author-content">
                                            <h5><a href="#"><?php the_author();?></a></h5>
                                            <p><?php the_author_meta('description'); ?></p>
                                            <div class="author-social">
                                                <ul>
                                                    <?php if ( get_the_author_meta('facebook') ) : ?>
														<li><a href="<?php the_author_meta('facebook'); ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
														<?php endif;?>
														<?php if ( get_the_author_meta('twitter') ) : ?>
														<li><a href="<?php the_author_meta('twitter'); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
														<?php endif;?>
														<?php if ( get_the_author_meta('instagram') ) : ?>
														<li><a href="<?php the_author_meta('instagram'); ?>" target="_blank" ><i class="fab fa-instagram"></i></a></li>
														<?php endif;?>
														<?php if ( get_the_author_meta('tumblr') ) : ?>
														<li><a href="<?php the_author_meta('tumblr'); ?>" target="_blank" ><i class="fab fa-tumblr"></i></a></li>
														<?php endif;?>
														<?php if ( get_the_author_meta('pinterest') ) : ?>
														<li><a href="<?php the_author_meta('pinterest'); ?>" target="_blank" ><i class="fab fa-pinterest"></i></a></li>
														<?php endif;?>
														<?php if ( get_the_author_meta('youtube') ) : ?>
														<li><a href="<?php the_author_meta('youtube'); ?>" target="_blank" ><i class="fab fa-youtube"></i></a></li>
														<?php endif;?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--post-author end--> 
									<?php } ;?>									
                                    <?php if ( comments_open() || get_comments_number() ) { ?>
                                    <div id="comments" class="single-post-comm">
                                        <?php comments_template();?>
                                    </div>
                                    <!--comments end -->   
									<?php }?>  
                                    <!--content-nav_holder-->            
                                    <div class="content-nav_holder fl-wrap blog-nav">
                                        <div class="pr-bg pr-bg-white"></div>
                                        <div class="content-nav">
                                            <ul>
                                                <li>
											<?php $nastik_previous_post = get_previous_post();
                                            $nastik_url = is_object( $nastik_previous_post ) ? get_permalink( $nastik_previous_post->ID ) : '';
                                            $nastik_title = is_object( $nastik_previous_post ) ? get_the_title( $nastik_previous_post->ID ) : '';
											if ($nastik_previous_post) { 
											$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $nastik_previous_post->ID ), 'nastik_portfolio_image' );
											}
											?>
											<?php  if ($nastik_previous_post) { ?>
                                                    <a href="<?php echo esc_url( $nastik_url ) ?>" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($nastik_options['translet_opt_18'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_18',''));?> - <?php else: ?><?php esc_html_e('Prev - ','nastik');?><?php endif;?><?php echo esc_html( $nastik_title ) ?></span></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											<?php if(!empty($nastik_options['blogpageurl'])):?>
											<a href="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('blogpageurl',''));?>" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($nastik_options['translet_opt_25'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_25',''));?><?php else: ?><?php esc_html_e('Back To Blog','nastik');?><?php endif;?></span></a>
											<?php else :?>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($nastik_options['translet_opt_21'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_21',''));?><?php else: ?><?php esc_html_e('Back To Home','nastik');?><?php endif;?></span></a>
											<?php endif;?>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                                <li>
											<?php $nastik_next_post = get_next_post();
                                            $nastik_url = is_object( $nastik_next_post ) ? get_permalink( $nastik_next_post->ID ) : '';
                                            $nastik_title = is_object( $nastik_next_post ) ? get_the_title( $nastik_next_post->ID ) : ''; 
											if ($nastik_next_post) {
											$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $nastik_next_post->ID ), 'nastik_portfolio_image' );
											}
											?>
											<?php if ($nastik_next_post) { ?>
                                                    <a href="<?php echo esc_url( $nastik_url ) ?>" class="rn ajax"><span ><?php if(!empty($nastik_options['translet_opt_20'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_20',''));?> - <?php else: ?><?php esc_html_e('Next - ','nastik');?><?php endif;?><?php echo esc_html( $nastik_title ) ?></span> <i class="fal fa-long-arrow-right"></i></a>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } else { ?>
											<?php if(!empty($nastik_options['blogpageurl'])):?>
											<a href="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('blogpageurl',''));?>" class="rn ajax"><span ><?php if(!empty($nastik_options['translet_opt_25'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_25',''));?><?php else: ?><?php esc_html_e('Back To Blog','nastik');?><?php endif;?></span> <i class="fal fa-long-arrow-right"></i></a>
											<?php else : ?>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="rn ajax"><span ><?php if(!empty($nastik_options['translet_opt_21'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_21',''));?><?php else: ?><?php esc_html_e('Back To Home','nastik');?><?php endif;?></span> <i class="fal fa-long-arrow-right"></i></a>
											<?php endif;?>
                                                    <div class="content-nav-media">
                                                        <div class="bg"  data-bg="<?php echo esc_url($nastik_image[0]);?>"></div>
                                                    </div>
											<?php } ;?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--content-nav_holder end -->                                          
                                    <div class="sec-number">01.</div>
                                </div>
                                <div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>
                            </section>
                            <!--section end -->  
                            <div class="limit-box fl-wrap"></div>
                        </div>
                    </div>
                    <!--content  end -->
<?php endwhile;  endif; wp_reset_postdata(); ?>