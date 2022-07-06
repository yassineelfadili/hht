<div class="hero-wrap fl-wrap full-height scroll-con-sec hidden-section" id="sec1" data-scrollax-parent="true">
 <?php echo do_shortcode(get_post_meta($post->ID,'rnr_ns_rev_shortcode_opt',true)) ?> 
 <?php if(get_post_meta($post->ID,'rnr_ns_intro_rev_image_overlay',true)!='st2'){ ?>
    <div class="overlay"></div>
<?php } ;?>
        <div class="half-hero-wrap">
            <div class="pr-bg"></div>
				<?php if(get_post_meta($post->ID,'rnr_ns_intro_rev_image_right_side_con',true)!='st1'){ ?>
                <div class="rotate_text hero-decor-let">
				<?php
				$nastik_left_con = rwmb_meta( 'rnr_ns_intro_rev_image_rightside_con_opt' );
				if ( ! empty( $nastik_left_con ) ) {
				foreach ( $nastik_left_con as $nastik_left_cons ) { ;?>
				<?php $nastik_intro_text_left = isset( $nastik_left_cons['rnr_ns_intro_rev_image_con_text'] ) ? $nastik_left_cons['rnr_ns_intro_rev_image_con_text'] : ''; ?><?php if ( !empty( $nastik_intro_text_left ) ) { ?>
                    <div><?php echo esc_html($nastik_intro_text_left);?></div>
				<?php } ?>
				<?php } } ;?>
                </div>
			<?php } ;?>
			<?php 
					global $nastik_title_tag;
					if(get_post_meta($post->ID,'rnr_wr_intro_rev_image_title_tag',true)=='h2') { 
						$nastik_title_tag ='h2';
					} 
					else if(get_post_meta($post->ID,'rnr_wr_intro_rev_image_title_tag',true)=='h3') {
						$nastik_title_tag ='h3';												
					}
					else if(get_post_meta($post->ID,'rnr_wr_intro_rev_image_title_tag',true)=='h4') {
						$nastik_title_tag ='h4';												
					}
					else if(get_post_meta($post->ID,'rnr_wr_intro_rev_image_title_tag',true)=='h5') {
						$nastik_title_tag ='h5';												
					}
					else if(get_post_meta($post->ID,'rnr_wr_intro_rev_image_title_tag',true)=='h6') {
						$nastik_title_tag ='h6';												
					}
					else {
						$nastik_title_tag ='h1';
					}
				?>
			<?php if (( get_post_meta($post->ID,'rnr_ns_intro_rev_image_title',true))):?>
			<<?php echo esc_attr($nastik_title_tag);?> class="hero-intro-title"><?php echo do_shortcode(get_post_meta($post->ID,'rnr_ns_intro_rev_image_title',true)); ?></<?php echo esc_attr($nastik_title_tag);?>>
			<?php endif;?>
			<?php if (( get_post_meta($post->ID,'rnr_ns_intro_rev_image_sub_title',true))):?>
			<h4><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_intro_rev_image_sub_title',true)); ?></h4>
			<?php endif;?>
			<div class="clearfix"></div>
			<?php 
			global $nastik_buton_class;
			if(get_post_meta($post->ID,'rnr_ns_intro_rev_image_button_type',true)!='st2'){
			$nastik_buton_class="custom-scroll-link";
			} ;?>
			<?php if (( get_post_meta($post->ID,'rnr_ns_intro_rev_image_button_url',true))):?>
			<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_ns_intro_rev_image_button_url',true)); ?>" class="btn fl-btn <?php echo sanitize_html_class($nastik_buton_class);?>  color-bg"><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_intro_rev_image_button_text',true)); ?></a>
			<?php endif;?>
        </div>
        <!-- hero  elements  --> 
        <div class="hero-border hb-top"></div>
        <div class="hero-border hb-bottom"></div>
        <div class="hero-border hb-right"></div>
		<?php if(get_post_meta($post->ID,'rnr_ns_intro_rev_image_corner_border',true)!='st2'){ ?>
		<div class="hero-corner hiddec-anim"></div>
        <div class="hero-corner2 hiddec-anim"></div>
        <div class="hero-corner3 hiddec-anim"></div>
		<?php } ;?>
		<?php if (( get_post_meta($post->ID,'rnr_ns_intro_rev_image_scroll_button_text',true))):?>
        <div class="scroll-down-wrap sdw_hero hiddec-anim">
            <div class="mousey">
				<div class="scroller"></div>
            </div>
            <span><?php echo esc_html(get_post_meta($post->ID,'rnr_ns_intro_rev_image_scroll_button_text',true)); ?></span>
        </div>
		<?php endif;?>
    <!-- hero  elements end--> 
</div>