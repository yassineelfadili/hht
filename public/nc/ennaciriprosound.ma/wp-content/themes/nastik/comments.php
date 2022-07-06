<?php $nastik_options = get_option('nastik'); ?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php
	
	if ( have_comments() ) : ?>
	<?php
	global $nastik_comment_meta_text, $nastik_comment_meta_text2, $nastik_comment_meta_text3;
	if(!empty($nastik_options['translet_opt_10'])):
	$nastik_comment_meta_text= esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_10',''));;
	else: 
	$nastik_comment_meta_text='One thought on';
	endif;
	if(!empty($nastik_options['translet_opt_11'])):
	$nastik_comment_meta_text2= esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_11',''));;
	else: 
	$nastik_comment_meta_text2='thought on';
	endif;
	if(!empty($nastik_options['translet_opt_12'])):
	$nastik_comment_meta_text3= esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_12',''));;
	else: 
	$nastik_comment_meta_text3='thoughts on';
	endif;
	?>
		<h6 id="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					
					esc_html_e( ''.$nastik_comment_meta_text.' &ldquo;%1$s&rdquo;', 'nastik' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( 
					esc_html( _nx( '%1$s '.$nastik_comment_meta_text2.' &ldquo;%2$s&rdquo;', '%1$s '.$nastik_comment_meta_text3.' &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'nastik' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h6>
		
		<!-- .comments-title -->

		<?php the_comments_navigation(); ?>
		
		<ul class="commentlist clearafix">
			
			<?php
				wp_list_comments( array(
					'callback'   => 'nastik_comment',
					'short_ping' => true,
				) );
			?>
		</ul><!-- .comment-list -->
		<div class="clearfix"></div>
		
		<?php the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php if(!empty($nastik_options['translet_opt_13'])):?><?php echo esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_13',''));?><?php else: ?><?php esc_html_e( 'Comments are closed.', 'nastik' ); ?><?php endif;?></p>
		
		<?php
		endif;
	endif; // Check for have_comments().
	
	global $nastik_comment_your_name, $nastik_comment_your_email, $nastik_comment_your_comment, $nastik_comment_send_commen;
	if(!empty($nastik_options['translet_opt_14'])):
	$nastik_comment_your_name= esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_14',''));;
	else: 
	$nastik_comment_your_name='Your Name';
	endif;
	if(!empty($nastik_options['translet_opt_15'])):
	$nastik_comment_your_email= esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_15',''));;
	else: 
	$nastik_comment_your_email='Your Email';
	endif;
	if(!empty($nastik_options['translet_opt_16'])):
	$nastik_comment_your_comment= esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_16',''));;
	else: 
	$nastik_comment_your_comment='Your Comment';
	endif;
	if(!empty($nastik_options['translet_opt_17'])):
	$nastik_comment_send_comment= esc_html(nastik_AfterSetupTheme::return_thme_option('translet_opt_17',''));;
	else: 
	$nastik_comment_send_comment='Submit Comment';
	endif;
	
		 $nastik_args = array(
		'fields' => apply_filters(
		'comment_form_default_fields', array(
			
			'author' =>'<div class="row"><div class="col-md-6">' . '<label><i class="fal fa-user"></i></label><input id="author"  placeholder="'. $nastik_comment_your_name .'*" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="40"/>'.
				
				'</div>'
				,
			'email'  => '<div class="col-md-6">' . '<label><i class="fal fa-envelope-open"></i></label><input id="email" placeholder="'.$nastik_comment_your_email.'*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="40"/>'  .
				
				'</div></div>',
			
		)
		),
		'comment_field' => '' .
		'<textarea id="comment" class="form-control" name="comment" cols="40" rows="3" placeholder="'.$nastik_comment_your_comment.'*" aria-required="true"></textarea>' .
		'',
		'comment_notes_after' => '<button class="btn  color-bg">'.$nastik_comment_send_comment.'</button>',
		'title_reply' => '<div class="comment-title-area crunchify-text"> <h6> <span>' . esc_html__( 'Leave a Reply', 'nastik' ) . '</span>'.'</h6></div>'
		
	);
	comment_form($nastik_args);
	?>
	



