<?php if ( is_home() ) { ?>
<?php if(!empty($nastik_options['blogtitle'])):?>
<div class="content-holder scroll-content" data-pagetitle="<?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('blogtitle',''));?>">
<?php else: ?>
<div class="content-holder scroll-content" data-pagetitle="<?php esc_html_e('My Blog','nastik');?>">
<?php endif;?>
<?php } else if ( is_category() ) { ?>
<div class="content-holder scroll-content" data-pagetitle="<?php single_cat_title( '', true ); ?>">
<?php } else if ( is_tag() ) { ?>
<div class="content-holder scroll-content" data-pagetitle="<?php single_tag_title(); ?>">
<?php } else if ( is_archive()  ) { ?>
<?php if (class_exists('WooCommerce')) { ?>
<?php if ( is_shop()   ) { ?>
<div class="content-holder scroll-content" data-pagetitle="<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?><?php woocommerce_page_title(); ?><?php endif;?>">
<?php } else if ( is_product_category()   ) { ?>
<div class="content-holder scroll-content" data-pagetitle="<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?><?php woocommerce_page_title(); ?><?php endif;?>">
<?php } ;?>
<?php } else { ?>
<div class="content-holder scroll-content" data-pagetitle="<?php single_month_title(' '); ?>">
<?php } ;?>
<?php } else if ( is_search()   ) { ?>
<div class="content-holder scroll-content" data-pagetitle="<?php esc_html_e('Search Page','nastik');?>">
<?php } else if ( is_404()   ) { ?>
<div class="content-holder scroll-content" data-pagetitle="<?php esc_html_e('Error 404','nastik');?>">
<?php } else { ?>
<div class="content-holder scroll-content" data-pagetitle="<?php the_title(); ?>">
<?php } ;?>			