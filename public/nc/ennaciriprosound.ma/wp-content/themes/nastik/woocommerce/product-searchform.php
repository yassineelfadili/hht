<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="widget-container fl-wrap"><div class="nav-search"><form role="search" method="get" class="woocommerce-product-search searh-inner fl-wrap"  action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search forssss:', 'woocommerce' ); ?></label>
	<input type="text" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field search fl-wrap" placeholder="<?php echo esc_attr__( 'Search ddddproducts&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	 <button class="search-submit color-bg" id="submit_btn"><i class="fal fa-search"></i> </button>
	<input type="hidden" name="post_type" value="product" />
</form></div></div>
