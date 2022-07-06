<?php $nastik_options = get_option('nastik'); ?>
<!-- nav-holder-->
                    <div class="nav-holder but-hol">
                        <div class="nav-scroll-bar-wrap fl-wrap">
							<?php if (nastik_AfterSetupTheme::return_thme_option('textlogo')=='st2'){ ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ajax logo_menu"><img src="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('logopic','url'));?>" alt="<?php  bloginfo('name'); ?>"></a>
							<?php }
							else{ ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ajax logo_menu">
							<?php if(!empty($nastik_options['logotext'])):?>
							<h1 class="ns-text-logo"><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('logotext',''));?></h1>
							<?php else:?>
							<h1 class="ns-text-logo"><?php  bloginfo('name'); ?></h1>
							<?php endif;?>
							</a>
							<?php } ;?>
                            <div class="nav-container fl-wrap">
                                <!-- nav -->
                                <nav class="nav-inner" id="menu">
                                    <ul>
									<?php
									$defaults = array(
									'theme_location'  => 'top-menu',
									'menu'            => 'nav',
									'container'       => '',
									'container_class' => '',
									'menu_class'      => 'navbar-main-menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '%3$s',
									'depth'           => 0,
									'walker'          => new nastik_Walker
									);
									if(has_nav_menu('top-menu')) {
									wp_nav_menu( $defaults );
									}
									else {
									};
									?>
                                    </ul>
                                </nav>
                                <!-- nav end-->
                            </div>
                        </div>
						<?php if (nastik_AfterSetupTheme::return_thme_option('headershare_opt')=='st2'){ ?>
                        <div class="share-wrapper">
						<?php if(!empty($nastik_options['share_bt_title1'])):?>
						<span class="share-title"><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('share_bt_title1',''));?> : </span>
						<?php else: ?>
						<span class="share-title"><?php esc_html_e('Share : ','nastik');?></span>
						<?php endif;?>
                        <div class="share-container"></div>
                        </div>
						<?php } ;?>
                        <div class="nav-holder-line"></div>
                    </div>
                    <div class="nav-holder-dec color-bg"></div>
                    <div class="nav-overlay"></div>
                    <!-- nav-holder end -->  
                    