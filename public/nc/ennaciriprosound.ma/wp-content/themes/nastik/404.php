<?php $nastik_options = get_option('nastik'); ?>
<?php get_header();?>
 <!-- hero-wrap -->
                    <div class="hero-wrap fl-wrap full-height">
                        <div class="bg"  data-bg="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('404back','url'));?>"></div>
                        <div class="overlay"></div>
                        <div class="error-wrap fl-wrap">
                            <div class="container">
                                <h2><?php esc_html_e('404','nastik');?></h2>
                                <p><?php if(!empty($nastik_options['404_page_title'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('404_page_title',''));?><?php else :?><?php esc_html_e('We','nastik');?>'<?php esc_html_e('re sorry, but the Page you were looking for, couldn','nastik');?>'<?php esc_html_e('t be found.','nastik');?><?php endif;?></p>
                                <div class="clearfix"></div>
                                <form action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                                    <input name="s" id="se2" type="text" class="search" placeholder="<?php if(!empty($nastik_options['404_page_title_2'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('404_page_title_2',''));?>...<?php else: ?><?php esc_attr_e('Search..','nastik');?><?php endif;?>" value="<?php if(!empty($nastik_options['404_page_title_2'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('404_page_title_2',''));?>...<?php else: ?><?php esc_attr_e('Search..','nastik');?><?php endif;?>">
                                    <button class="search-submit color-bg" id="err_submit_btn"><i class="fa fa-search"></i> </button>
                                </form>
                                <div class="clearfix"></div>
                                <p><?php if(!empty($nastik_options['404_page_title_3'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('404_page_title_3',''));?><?php else: ?><?php esc_html_e('Or','nastik');?><?php endif;?></p>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn color-bg"><?php if(!empty($nastik_options['404_page_title_4'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('404_page_title_4',''));?><?php else: ?><?php esc_html_e('Back to Home Page ','nastik');?><?php endif;?></a>
                            </div>
                        </div>
                        <div class="hero-corner"></div>
                        <div class="hero-corner2"></div>
                        <div class="hero-corner3"></div>
                    </div>
                    <!-- hero-wrap end -->
<?php get_footer(); ?>	