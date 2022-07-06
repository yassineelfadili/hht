<?php
add_action('wp_head', 'nastik_custom_colors', 160);
function nastik_custom_colors() { 
$nastik_options = get_option('nastik');
?>
 
 <style type="text/css" class="nastik-custom-dynamic-css">
 <?php if(!empty($nastik_options['opt-theme-style'])):?>
 @charset "utf-8";
/*--
	Color styles
--*/
.color-bg , .header-contacts li:before , .top-header:after , .header-social:before , .section-title:before , .line-item:first-child:before  , .line-item:last-child:before , #twitts-container ul li:before , .main-about h2:before , .hs_init .swiper-scrollbar-drag , .page-scroll-nav li  a.act-scrlink:before  , .resum-header:before , .custom-skillbar , .half-bg-title:before  , .parallax-text h3:before  , .content-inner .cf-inner .inner h2:before , .swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-main , .nav-button span , .folio-btn-dot:before , .page-scroll-nav li a.actscr-link:before  , .fixed-column-tilte:before , .arrowpagenav:before , .page-scroll-nav:after , .order-wrap h3:before , .hero-slider-wrap_pagination .swiper-pagination-bullet.swiper-pagination-bullet-active:before , .half-hero-wrap h1:before, .half-hero-wrap .hero-intro-title:before , .scroller    , .section-separator span:after , .page-load_bg span:before , .video-promo-text h3:before , .dec-img:before  , .filter-panel .folio-counter:after , .grid-item-holder:hover .grid-det:before , .single-page-title:before , .inline-folio-filters .folio-counter:after , .map-container:before , .fixed-top-panel .scroll-down-wrap:before , .back-to-home-btn:before  , .accordion a.toggle span:before, .accordion a.toggle span:after , .fw-carousel_pagination .swiper-pagination-bullet:before , .pagination  a.current-page ,   .ss-slider-pagination .swiper-pagination-bullet:before , .section-entry h1:before , .fcb:hover ,  .ss-slider-cont:hover  , .tcb:hover, .vc-section button,
.vc-section input[type=submit], .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .subcribe-form .mc4wp-form input[type="submit"], .subcribe-form .mc4wp-form button, .footer-box  .mc4wp-form button,
.footer-box  .mc4wp-form input[type="submit"], .wpcf7 input[type=submit]    {
	background:<?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;
}
.aside-social li a   , .sliding-menu a:hover , .sliding-menu a.act-link ,   .footer-title  span ,  .footer-contacts li i , #twitts-container .timePosted a:before , .main-about h2 span   , .carousel-title-wrap h2 a i , .box-media-zoom ,  .page-scroll-nav li  a:hover , .page-scroll-nav li  a.actscr-link   , .dec-list li:before , .resum-header i , .video-box-btn , .parallax-text h4 span , .content-back i  , .serv-price-wrap , .swiper-slide-active .testi-link , .folio-btn-tooltip , .share-container  a:hover   , .process-wrap li:after , .process-wrap li h4 , .half-hero-wrap h1 span , .hsc , .pr-list li   , .inline-facts-wrap h6 , .nav-button:hover .menu-button-text , .arrowpagenav a:hover , .to-top-btn:hover , .filter-panel .folio-counter div.all-album , .grid-det_category a  , .gallery-filters a.gallery-filter-active , .inline-dark-filters a.gallery-filter-active:hover , .contacts-wrap li h4 , .leaflet-control-zoom a , .project-details ul li , .project-details ul li a , .content-nav li:hover a  , .fcb , .post-header span , .post-opt li i , .blog-btn i  , .blog-btn-filter ul li a:hover , .search-btn i , .ss-slider-cont , .team-social li a , .author-social li a , .header-social li a:hover , .lg-actions .lg-next, .lg-actions .lg-prev , .lg-toolbar .lg-icon  , .element-item.closeicon:before , .tcb  , #twitts-container a:hover , .subcribe-form .subscribe-button:hover , .grid-det_link:hover, .main-about-text-area ul li:before, .resum-content ul li:before, .widget_tag_cloud a, .current-menu-parent > a, .current-menu-item > a , .shop-items .grid-det_link:hover, .woocommerce-message::before, td a, .widget_calendar #today, .widget_tag_cloud a, .widget_product_tag_cloud a, .hero-intro-title span {
	color:<?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;
}
.loader {
	border-top: 10px solid  <?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;
	border-right: 10px solid <?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;
	border-bottom: 10px solid <?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;
}
.footer-inner:after  , .element-item, .woocommerce-message, .widget_search  form input,
.widget_product_search form input{
	border-color:<?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;
}

.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .shop_table tbody tr .product-remove a:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{
background-color:<?php echo esc_attr(nastik_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;
}
<?php endif;?>
<?php if (nastik_AfterSetupTheme::return_thme_option('enablecursor')=='st1'){ ?>
.element{display:none;}
<?php } ;?>

 </style>
 
 
 <?php 
	}
?>