<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php if (has_post_thumbnail( $post->ID ) ):
$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'nastik_shop_cover' );?>
<?php endif;?>
<div <?php wc_product_class( 'gallery-item', $product ); ?>>
<div class="grid-item-holder hov_zoom">

			<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
			<img  src="<?php echo esc_url($nastik_image[0]);?>"    alt="<?php the_title();?>">
			<a href="<?php echo esc_url($nastik_image[0]);?>" class="box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
	<div class="grid-det">
			
			<div class="grid-det-item">
            <a href="<?php the_permalink();?>" class="grid-det_link"><?php the_title();?></a>
            </div>
			<div class="grid-det_category">
			<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			</div>
            
                <?php
			/**
			 * woocommerce_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
			?>
			
			<?php
			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
			
		
    </div>
	

</div>
<div class="pr-bg"></div>
</div>
