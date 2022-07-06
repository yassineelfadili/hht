<?php if(get_post_meta($post->ID,'rnr_bl-video',true)):?>
<div class="media-wrap   fl-wrap">
<div class="resp-video">
<iframe src="<?php echo esc_url(get_post_meta($post->ID,'rnr_bl-video',true));?>"></iframe>
</div>
</div>
<?php endif;?>