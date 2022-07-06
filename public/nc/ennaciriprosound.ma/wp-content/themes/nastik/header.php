<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>> 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $nastik_options = get_option('nastik'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
	<?php 
	wp_head(); 
	?>
</head>
<body <?php body_class(); ?>>
<!--loader-->
        <div class="loader-wrap color-bg">
            <div class="loader-bg"></div>
            <div class="loader-inner">
                <div class="loader"></div>
            </div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
            <header class="main-header">
				<?php if (nastik_AfterSetupTheme::return_thme_option('smalllogo')!='st1'){ ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-holder ajax"><img src="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('logopicsmall','url'));?>" class="nastik-small-logo" alt="<?php  bloginfo('name'); ?>"></a>
				<?php } ;?>
				<?php if(has_nav_menu('top-menu')) { ?>
                <!-- nav-button-wrap-->
                <div class="nav-button nav-button-parent but-hol">
                    <span  class="nos"></span>
                    <span class="ncs"></span>
                    <span class="nbs"></span>
                    <div class="menu-button-text"><?php if(!empty($nastik_options['menu_st_title'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('menu_st_title',''));?><?php else: ?><?php esc_html_e('Menu','nastik');?><?php endif;?></div>
                </div>
				<?php } ;?>
				<?php if (nastik_AfterSetupTheme::return_thme_option('social_show_hide_opt_head')=='st2'){ ?>
                <!-- nav-button-wrap end-->
                <div class="header-social">
                    <ul >
                        <?php if(!empty($nastik_options['facebook'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['facebook']);?>"><i class="fab fa-facebook-f"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['twitter'])):?>
                         <li><a target="_blank" href="<?php echo esc_url($nastik_options['twitter']);?>"><i class="fab fa-twitter"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['pinterest'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['pinterest']);?>"><i class="fab fa-pinterest"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['dribbble'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['dribbble']);?>"><i class="fab fa-dribbble"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['behance'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['behance']);?>"><i class="fab fa-behance"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['gplus'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['gplus']);?>"><i class="fab fa-google-plus"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['linkedin'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['linkedin']);?>"><i class="fab fa-linkedin"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['youtube'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['youtube']);?>"><i class="fab fa-youtube"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['vimeo'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['vimeo']);?>"><i class="fab fa-vimeo"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['slack'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['slack']);?>"><i class="fab fa-slack"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['instagram'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['instagram']);?>"><i class="fab fa-instagram"></i></a></li>
						<?php endif;?>
						
						<?php if(!empty($nastik_options['tumblr'])):?>
                        <li><a target="_blank" href="<?php echo esc_url($nastik_options['tumblr']);?>"><i class="fab fa-tumblr"></i></a></li>
						<?php endif;?>
						<?php
						$nastik_more_social = nastik_AfterSetupTheme::return_thme_option('opt_add_more_social','');
						if ( ! empty( $nastik_more_social ) ) {
						foreach ( $nastik_more_social as $nastik_more_socials ) { ;?>
						<?php echo do_shortcode($nastik_more_socials);?>
						<?php } } ;?> 
                    </ul>
                </div>
				<?php } ;?>
				<?php global $nastik_button_class;?>
				<?php if (nastik_AfterSetupTheme::return_thme_option('headercontact_opt')=='st2'){ ?>
				<?php if (nastik_AfterSetupTheme::return_thme_option('headercontact_url_type')!='st2'){
				$nastik_button_class ='ajax';
				 };?>
                <div class="folio-btn">
                    <a class="folio-btn-item <?php echo sanitize_html_class($nastik_button_class);?>" href="<?php echo esc_url(nastik_AfterSetupTheme::return_thme_option('con_p_url',''));?>"></a>
                    <span class="folio-btn-tooltip"><?php if(!empty($nastik_options['contact_bt_title'])):?>
					<?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('contact_bt_title',''));?>
					<?php else: ?>
					<?php esc_html_e('My Portfolio','nastik');?>
					<?php endif;?></span>
                </div>
				<?php } ;?>
            </header>
            <!-- header end -->
            <!-- wrapper -->
            <div id="wrapper">
			<!-- content-holder  -->	
                
				<?php get_template_part('template-parts/page_title');?>
				<?php get_template_part('template-parts/main-header');?>