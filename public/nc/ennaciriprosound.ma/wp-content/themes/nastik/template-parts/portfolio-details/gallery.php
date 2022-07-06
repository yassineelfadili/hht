<?php $nastik_options = get_option('nastik'); ?>
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
					<?php $nastik_back_image = rwmb_meta( 'rnr_ns_port_details_page_header_back_st4','type=image&size=' ); ?>
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
                        <div class="fixed-column-tilte fcw-title"><span><?php the_title();?></span></div>
                    </div>
                    <!-- fixed-column-wrap end -->
<!-- column-wrap -->
                    <div class="column-wrap  ">
                        <!--content -->
                        <div class="content">
                            <!--fixed-top-panel -->
                            <div class="fixed-top-panel fl-wrap">
                                <div class="sp-fix-header fl-wrap">
                                    <div class="scroll-down-wrap">
                                        <div class="mousey">
                                            <div class="scroller"></div>
                                        </div>
                                        <span><?php if(get_post_meta($post->ID,'rnr_ns_port_details_page_header_translate_op1_st4',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_details_page_header_translate_op1_st4',true));?> <?php else : ?><?php esc_html_e('Scroll down  to discover','nastik');?><?php endif;?></span>
                                    </div>
									<?php 
									global $nastik_buton_class;
									if(get_post_meta($post->ID,'rnr_ns_port_details_page_header_url_type_st4',true)!='st2'){
									$nastik_buton_class="ajax";
									} ;?>
									<?php if(get_post_meta($post->ID,'rnr_ns_port_details_page_header_button_url_st4',true)):?>
                                    <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_ns_port_details_page_header_button_url_st4',true));?>" class="<?php echo sanitize_html_class($nastik_buton_class);?> back-to-home-btn"><span><?php if(get_post_meta($post->ID,'rnr_ns_port_details_page_header_button_text_st4',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_details_page_header_button_text_st4',true));?> <?php else : ?><?php esc_html_e('Back to portfolio','nastik');?><?php endif;?></span></a>
									<?php endif;?>
                                </div>
                            </div>
                            <!--fixed-top-panel end-->
                            <!--section -->
                            <section   class="hidden-section">
                                <div class="col-wc_dec"></div>
                                <div class="container">
                                    <div class="section-title fl-wrap bot-element">
										<?php if (( get_post_meta($post->ID,'rnr_ns_port_details_page_header_title_st4',true))):?>
                                        <h3><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_details_page_header_title_st4',true)); ?></h3>
										<?php else: ?>
                                        <h3><?php the_title();?></h3>
										<?php endif;?>
                                        <?php if (( get_post_meta($post->ID,'rnr_ns_port_details_page_header_desc_st4',true))):?>	
										<p><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_details_page_header_desc_st4',true)); ?>  </p>
										<?php endif;?>
                                    </div>
                                    <!-- portfolio start -->
									<div class="container-after  fl-wrap  " >
									<?php 
									$nastik_loadpost= get_post_meta($post->ID, 'rnr_ns_port_dtpage_item_load_opt', true);
									?>
                                    <div class="gallery-items min-pad  lightgallery   fl-wrap  bot-element" <?php if(get_post_meta($post->ID,'rnr_ns_port_dtpage_load_more',true)=='st2'){ ?>data-load-item="<?php echo esc_attr($nastik_loadpost);?>" <?php } else { ?>data-load-item="4000000"<?php } ;?> data-button-text="<?php if(get_post_meta($post->ID,'rnr_ns_port_dtpage_translate_opt5',true)):?><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_dtpage_translate_opt5',true));?> <?php else : ?><?php esc_html_e('Load More','nastik');?><?php endif;?>">
									<?php
									$nastik_car_slide_opt = rwmb_meta( 'rnr_so_drt_po_gallery' );
									if ( ! empty( $nastik_car_slide_opt ) ) {
									foreach ( $nastik_car_slide_opt as $nastik_car_slide_opts ) { ;?>
									<?php $nastik_column = isset( $nastik_car_slide_opts['rnr_md_pot_gallery_column'] ) ? $nastik_car_slide_opts['rnr_md_pot_gallery_column'] : ''; ?>
									<?php $nastik_gallery_pop = isset( $nastik_car_slide_opts['rnr_ns_port_gallery_video_opt'] ) ? $nastik_car_slide_opts['rnr_ns_port_gallery_video_opt'] : ''; ?>
									<?php $nastik_image_ids = isset( $nastik_car_slide_opts['rnr_portfolio-image-popu'] ) ? $nastik_car_slide_opts['rnr_portfolio-image-popu'] : array();
									foreach ( $nastik_image_ids as $nastik_image_id ) {
									$nastik_image = RWMB_Image_Field::file_info( $nastik_image_id, array( 'size' => '' ) ); ?>
                                        <!-- gallery-item-->
                                        <div class="gallery-item  <?php echo esc_attr($nastik_column);?>">
                                            <div class="grid-item-holder hov_zoom">
                                                <img  src="<?php echo esc_url(($nastik_image['url']));?>"    alt="<?php echo esc_attr(($nastik_image['title']));?>">
                                            <?php if ( !empty( $nastik_gallery_pop ) ) { ?>
											<a href="<?php echo esc_html($nastik_gallery_pop);?>" class="box-media-zoom   image-popup"><i class="fal fa-play"></i></a>
											<?php } else { ?>
											<a href="<?php echo esc_url(($nastik_image['url']));?>" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
											<?php } ;?>
                                            </div>
                                        </div>
                                        <!-- gallery-item end-->
                                    <?php } } } ;?>  
                                    </div>
                                    </div>
									<div class="clear"></div>
                                    <!-- portfolio end --> 
                                    <!-- text-block  --> 
                                    <div class="text-block fl-wrap">
                                        <div class="row">
                                    <?php 
									global $nastik_content_div_class;
									if(get_post_meta($post->ID,'rnr_ns_port_details_info_enable_opt',true)=='st2'){
									$nastik_content_div_class="col-md-8 sin-anim";
									} else {
									$nastik_content_div_class="col-md-12";
									} ;?>
                                        <div class="<?php echo esc_attr ($nastik_content_div_class);?>">
											<?php if (( get_post_meta($post->ID,'rnr_ns_port_details_con_sec_title_opt',true))):?>
                                            <h3 class="pr-subtitle"> <?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_details_con_sec_title_opt',true)); ?></h3>
											<?php endif;?>
                                            <?php the_content();?>
										<?php if (( get_post_meta($post->ID,'rnr_wr_port_accor_opt',true))=='st2'):?>
										<?php if (( get_post_meta($post->ID,'rnr_ns_port_accordion_title',true))):?>
                                        <h3 class="pr-subtitle mar-top"> <?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_accordion_title',true)); ?></h3>
										<?php endif;?>
                                        <!-- accordion-->                            
                                        <div class="accordion mar-top">
											<?php
											$nastik_acc_tab_opt = rwmb_meta( 'rnr_so_acc_tab_opt' );
											if ( ! empty( $nastik_acc_tab_opt ) ) {
											foreach ( $nastik_acc_tab_opt as $nastik_acc_tab_opts ) { ;?>
											
											<?php $nastik_acco_title = isset( $nastik_acc_tab_opts['rnr_so_acc_title_opt'] ) ? $nastik_acc_tab_opts['rnr_so_acc_title_opt'] : ''; ?>
											<?php $nastik_acco_con = isset( $nastik_acc_tab_opts['rnr_so_acc_con_opt'] ) ? $nastik_acc_tab_opts['rnr_so_acc_con_opt'] : ''; ?>
											<?php $nastik_acco_active = isset( $nastik_acc_tab_opts['rnr_so_acc_accon_opt'] ) ? $nastik_acc_tab_opts['rnr_so_acc_accon_opt'] : ''; ?>
											
											<?php 
											if($nastik_acco_active == "st2") {
											$nastik_tab_title_act ='act-accordion';
											$nastik_tab_content_act ='visible';
											}
											else {
											$nastik_tab_title_act ='';
											$nastik_tab_content_act ='';
											}
											
											?>
											
                                            <a class="toggle <?php echo esc_attr($nastik_tab_title_act);?>" href="#"> <?php echo esc_html($nastik_acco_title);?>   <span></span></a>
                                            <div class="accordion-inner <?php echo esc_attr($nastik_tab_content_act);?>">
                                                <?php echo balanceTags($nastik_acco_con);?>
                                            </div>
											<?php } } ;?>
                                            
                                        </div>
                                        <!-- accordion end --> 
										<?php endif;?>										
                                        </div>
										<?php if(get_post_meta($post->ID,'rnr_ns_port_details_info_enable_opt',true)=='st2'){ ?>
                                        <div class="col-md-4">
                                            <div class="pr-bg pr-bg-white"></div>
                                            <div class="project-details fl-wrap">
                                                <ul>
													<?php
													$nastik_project_info = rwmb_meta( 'rnr_ns_port_details_info_opt' );
														if ( ! empty( $nastik_project_info ) ) {
														foreach ( $nastik_project_info as $nastik_project_opts ) { ;?>
                                                    <li><span><?php echo esc_html($nastik_project_opts['car_opt_in_tit']);?> :</span> <?php echo balanceTags($nastik_project_opts['car_opt_in_con']);?> </li>
													<?php } } ;?> 
                                                    
                                                </ul>
												<?php 
												global $nastik_buton_target;
												if(get_post_meta($post->ID,'rnr_ns_port_button_target_opt',true)=='st2'){
												$nastik_buton_target="_blank";
												} else {
												$nastik_buton_target="_self";
												} ;?>
												<?php if (( get_post_meta($post->ID,'rnr_bl-port-button-opt',true))):?>
                                                <a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_bl-port-button-opt',true)); ?>" class="btn color-bg fl-wrap" target="<?php echo esc_attr($nastik_buton_target);?>"><?php echo esc_html(get_post_meta($post->ID,'rnr_bl-port-button_text-opt',true)); ?></a>
												<?php endif;?>
												<?php if (( get_post_meta($post->ID,'rnr_ns_port_extrainfo',true))):?>
												<div class="clear"></div>
												<div class="main-about-text-area port-extrainfo-ns">
												<?php echo do_shortcode(get_post_meta($post->ID,'rnr_ns_port_extrainfo',true)) ?> 
												</div>
												<?php endif;?>
                                            </div>
                                        </div>
										<?php } ;?>
                                        </div>
                                    </div>
                                    <!-- text-block end --> 
                                    <div class="limit-box2 fl-wrap"></div>
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
											<?php if(!empty($nastik_options['portpageurl'])):?>
											<a href="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('portpageurl',''));?>" class="ln ajax"><i class="fal fa-long-arrow-left"></i><span><?php if(!empty($nastik_options['translet_opt_22'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_22',''));?><?php else: ?><?php esc_html_e('Back To Portfolio','nastik');?><?php endif;?></span></a>
											<?php else : ?>
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
											<?php if(!empty($nastik_options['portpageurl'])):?>
											<a href="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('portpageurl',''));?>" class="rn ajax"><span ><?php if(!empty($nastik_options['translet_opt_22'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_22',''));?><?php else: ?><?php esc_html_e('Back To Portfolio','nastik');?><?php endif;?></span> <i class="fal fa-long-arrow-right"></i></a>
											<?php else :?>
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
								<?php if (( get_post_meta($post->ID,'rnr_ns_port_details_page_header_right_title_st4',true))):?><div class="sec-number"><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_port_details_page_header_right_title_st4',true)); ?></div>
								<?php endif;?>
                                </div>
                                <div class="col-wc_dec col-wc_dec2 col-wc_dec3"></div>
                            </section>
                            <!--section end -->
                            <div class="limit-box fl-wrap"></div>
                        </div>
                    </div>
                    <!--content  end -->
<?php endwhile;  endif; wp_reset_postdata(); ?>
