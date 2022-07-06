<?php

class nastik_twitter_feed_widget extends WP_Widget {
    var $settings = array( 'nastik_user_name', 'title');

    function __construct() {
        $widget_ops = array('description' => 'Recent Tweets.' );
        parent::__construct(false, __('Nastik Twitter Feed', 'nastik'),$widget_ops);
}


function widget($args, $instance) {
        $settings = $this->nastik_get_settings();
        extract( $args, EXTR_SKIP );
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : ( 'Last Twits' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $instance = wp_parse_args( $instance, $settings );
        extract( $instance, EXTR_SKIP );

      
        echo $before_widget;
		 if ( $title != '' ) { echo $before_title . $title . $after_title; 
		 }
		
		
		if ( $nastik_user_name != '' ) {
		echo '<div class="twitter-swiper-container fl-wrap" id="twitts-container" data-profilename="'.$nastik_user_name.'"></div>';
		}
		
		
		
       echo $after_widget;      
    }
	
	


function update( $new_instance, $old_instance ) {
        foreach ( array( 'title', 'nastik_user_name' ) as $setting )
            $new_instance[$setting] = strip_tags( $new_instance[$setting] );
        // Users without unfiltered_html cannot update this arbitrary HTML field
        if ( !current_user_can( 'unfiltered_html' ) )
            $new_instance['nastik_user_name'] = $old_instance['nastik_user_name'];
        return $new_instance;
    }


    function nastik_get_settings() {
        // Set the default to a blank string
        $settings = array_fill_keys( $this->settings, '' );
        // Now set the more specific defaults
        return $settings;
    }

    function form($instance) {
        $instance = wp_parse_args( $instance, $this->nastik_get_settings() );
        extract( $instance, EXTR_SKIP );
?>

    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','nastik'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('nastik_user_name'); ?>"><?php esc_html_e('Twitter User Name :','nastik'); ?><br><?php esc_html_e('e.x:envatomarket','nastik'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('nastik_user_name'); ?>" value="<?php echo esc_attr( $nastik_user_name ); ?>" class="widefat" id="<?php echo $this->get_field_id('nastik_user_name'); ?>" />
    </p>
	
    
	
	
	
    

    <?php 

    }
}

register_widget('nastik_twitter_feed_widget');