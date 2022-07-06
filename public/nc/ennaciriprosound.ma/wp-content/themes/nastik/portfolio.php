<?php $nastik_options = get_option('nastik');?>
<?php get_header();?>
<?php
/*Template Name:Portfolio Page Template*/
?>
 
		 <?php if(get_post_meta($post->ID,'rnr_wr_portfolio_pagetype',true)=='st1'){ ?> 
         <?php get_template_part('template-parts/portfolio/fullscreen-grid');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_portfolio_pagetype',true)=='st2'){ ?> 
         <?php get_template_part('template-parts/portfolio/fullscreen-grid-2');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_portfolio_pagetype',true)=='st3'){ ?> 
         <?php get_template_part('template-parts/portfolio/column-grid');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_portfolio_pagetype',true)=='st4'){ ?> 
         <?php get_template_part('template-parts/portfolio/column-grid-2');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_portfolio_pagetype',true)=='st5'){ ?> 
         <?php get_template_part('template-parts/portfolio/boxed-grid');?>
		 <?php }
		 else  { ?>
		 <?php get_template_part('template-parts/portfolio/fullscreen-grid');?>
		 <?php }?>
<?php get_footer(); ?>