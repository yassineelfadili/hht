<?php if (has_post_thumbnail( $post->ID ) ):?>


<div class="media-wrap   fl-wrap">
<?php 
$nastik_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
<?php if ( is_single() ) { ?>
<img src="<?php echo esc_url($nastik_image[0]);?>"  class="respimg-blog" alt="<?php the_title_attribute();?>">
<?php } else { ?>
<a href="<?php the_permalink();?>" class="ajax">
<img src="<?php echo esc_url($nastik_image[0]);?>"  class="respimg-blog" alt="<?php the_title_attribute();?>">
</a>
<?php } ;?>
</div>

<?php endif;?>