<?php $nastik_options = get_option('nastik'); ?>
					<?php if (nastik_AfterSetupTheme::return_thme_option('main_en_footer_opt')!='st2'){ ?>
					<!--footer-->
                    <div class="height-emulator fl-wrap"></div>
					<?php global $nastik_disable_padding_top;?>
					<?php if (nastik_AfterSetupTheme::return_thme_option('widget_en_footer_opt')!='st2'){ 
					$nastik_disable_padding_top='style=padding-top:0px;';
					} ;?>
                    <footer class="main-footer fixed-footer" <?php echo esc_attr($nastik_disable_padding_top);?>>
                        <div class="container">
						<?php if (nastik_AfterSetupTheme::return_thme_option('widget_en_footer_opt')!='st1'){ ?>
                            <div class="footer-inner fl-wrap">
                                <div class="row">
								<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                                    <div class="col-md-6">
										<div class="footer-box fl-wrap">
											<?php dynamic_sidebar( 'footer-widget-1' ); ?> 
										</div>
                                    </div>
								<?php endif;?>
								<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                                    <div class="col-md-6">
                                        <div class="footer-box fl-wrap">
										<?php dynamic_sidebar( 'footer-widget-2' ); ?> 
										</div>
                                    </div>
									<?php endif;?>
                                </div>
                            </div>
							<?php } ;?>
                            <div class="subfooter fl-wrap">
                                <!-- policy-box-->
                                <div class="policy-box">
                                    <?php $nastik_copy = nastik_AfterSetupTheme::return_thme_option('copyright');
									  echo $nastik_copy;
									 ?>
                                </div>
                                <!-- policy-box end-->                     
                                <div class="to-top to-top-btn color-bg"><span><?php if(!empty($nastik_options['translet_opt_2'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_2',''));?><?php else: ?><?php esc_html_e('To top','nastik');?><?php endif;?></span></div>
                            </div>
                        </div>
                        <div class="sec-lines"></div>
                        <div class="footer-canvas">
                            <div class="dots gallery__dots" data-dots=""></div>
                        </div>
                    </footer>
                    <!--footer  end -->
					<?php } ;?>
                </div>
                <!-- content-holder end -->
            </div>
            <!--wrapper end -->
            <!-- cursor-->
			<?php if(!empty($nastik_options['opt-theme-style'])):?>
			<?php $nastik_mouse_color= esc_attr(nastik_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>
			<?php else : ?>
			<?php $nastik_mouse_color= '#F68338';?>
			<?php endif;?>
            <div class="element">
                <div class="element-item" data-mouseback="<?php echo esc_attr($nastik_mouse_color);?>" data-mouseborder="<?php echo esc_attr($nastik_mouse_color);?>"></div>
            </div>
            <!-- cursor end-->          
        </div>
        <!-- Main end -->
		<div class="gallery-items hidden"></div>
<?php wp_footer(); ?>
</body>
</html>