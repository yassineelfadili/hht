<?php $nastik_options = get_option('nastik'); ?>
<?php get_header();?>
		 
		 <?php if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st1'){ ?> 
         <?php get_template_part('template-parts/page/top-header');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st2'){ ?> 
         <?php get_template_part('template-parts/page/default');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st3'){ ?> 
		 <?php get_template_part('template-parts/page/carousel');?>
		 <?Php } 
		 else  { ?>
		 <?php get_template_part('template-parts/page/top-header');?>
		 <?php }?>
       
 <?php get_footer(); ?>	 

