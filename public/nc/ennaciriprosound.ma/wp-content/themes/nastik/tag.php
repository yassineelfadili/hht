<?php $nastik_options = get_option('nastik'); ?>
<?php get_header();?>
<?php if ($nastik_options['blogtyle']=="st2") {?>
<?php get_template_part('template-parts/index/blog-left');?>
<?php } else if ($nastik_options['blogtyle']=="st3") {?>
<?php get_template_part('template-parts/index/full');?>
<?php } else { ?>
<?php get_template_part('template-parts/index/blog-right');?>
<?php } ;?>
<?php get_footer(); ?>		