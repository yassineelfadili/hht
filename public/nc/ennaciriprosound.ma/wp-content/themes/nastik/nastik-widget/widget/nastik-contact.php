<?php

class nastik_contact_widget extends WP_Widget {
    var $settings = array( 'title', 'phone', 'phone_title','email', 'email_title', 'address', 'address_title', 'mailchimlist', 'formdesc');

    function __construct() {
        $widget_ops = array('description' => 'Use this widget to add any type of Contact Details as a widget.' );
        parent::__construct(false, __('Nastik - Contact Widget', 'nastik'),$widget_ops);
}


function widget($args, $instance) {
        $settings = $this->nastik_get_settings();
        extract( $args, EXTR_SKIP );
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : ( ' Subscribe / Contacts' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $instance = wp_parse_args( $instance, $settings );
        extract( $instance, EXTR_SKIP );

      
        echo $before_widget;
		 if ( $title ) echo $before_title . $title . $after_title; 
		if ( $mailchimlist != '' ) {
		echo '<p>'.$formdesc.'</p>';
        echo '<div class="subcribe-form fl-wrap">';
		echo do_shortcode($mailchimlist);
        echo '</div>';
		}
		echo '<div class="footer-contacts fl-wrap">';
		echo '<ul>';
		if ( $phone_title != '' ) {
		echo '<li><i class="fal fa-phone"></i><span>'.$phone_title.':</span><a href="tel:'.$phone.'">'.$phone.'</a></li>';
		}
		if ( $email_title != '' ) {
		echo '<li><i class="fal fa-envelope"></i><span>'.$email_title.':</span><a href="mailto:'.$email.'">'.$email.'</a></li>';
		}
		if ( $address_title != '' ) {
		echo '<li><i class="fal fa-map-marker"></i><span>'.$address_title.':</span><a>'.$address.'</a></li>';
		}
		echo '</ul>';
		echo '</div>';
		
		
       echo $after_widget;      
    }
	
	


function update( $new_instance, $old_instance ) {
        foreach ( array( 'title', 'phone', 'phone_title','email', 'email_title', 'address', 'address_title', 'mailchimlist', 'formdesc' ) as $setting )
            $new_instance[$setting] = strip_tags( $new_instance[$setting] );
        // Users without unfiltered_html cannot update this arbitrary HTML field
        if ( !current_user_can( 'unfiltered_html' ) )
            $new_instance['address'] = $old_instance['address'];
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
        <label for="<?php echo $this->get_field_id('phone_title'); ?>"><?php esc_html_e('Data Phone Title:','nastik'); ?><br><?php esc_html_e('e.x: Call','nastik'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('phone_title'); ?>" value="<?php echo esc_attr( $phone_title ); ?>" class="widefat" id="<?php echo $this->get_field_id('phone_title'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('phone'); ?>"><?php esc_html_e('Phone Number:','nastik'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo esc_attr( $phone ); ?>" class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" />
    </p>
    
	<p>
        <label for="<?php echo $this->get_field_id('email_title'); ?>"><?php esc_html_e('Data E-mail Title:','nastik'); ?><br><?php esc_html_e('e.x: Write','nastik'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('email_title'); ?>" value="<?php echo esc_attr( $email_title ); ?>" class="widefat" id="<?php echo $this->get_field_id('email_title'); ?>" />
    </p>
   
    <p>
        <label for="<?php echo $this->get_field_id('email'); ?>"><?php esc_html_e('E-mail:','nastik'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo esc_attr( $email ); ?>" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('address_title'); ?>"><?php esc_html_e('Data Address Title:','nastik'); ?><br><?php esc_html_e('e.x: Find us','nastik'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('address_title'); ?>" value="<?php echo esc_attr( $address_title ); ?>" class="widefat" id="<?php echo $this->get_field_id('address_title'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('address'); ?>"><?php esc_html_e('Address:','nastik'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('address'); ?>" value="<?php echo esc_attr( $address ); ?>" class="widefat" id="<?php echo $this->get_field_id('address'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('mailchimlist'); ?>"><?php esc_html_e('MailChimp Form Shortcode','nastik'); ?><br><?php esc_html_e('ex: [mc4wp_form id="264"]','nastik'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('mailchimlist'); ?>" value="<?php echo esc_attr( $mailchimlist ); ?>" class="widefat" id="<?php echo $this->get_field_id('mailchimlist'); ?>" />
    </p>
	
	<p>
        <label for="<?php echo $this->get_field_id('formdesc'); ?>"><?php esc_html_e('Form Description:','nastik'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('formdesc'); ?>" value="<?php echo esc_attr( $formdesc ); ?>" class="widefat" id="<?php echo $this->get_field_id('formdesc'); ?>" />
        
    </p>
	
	
    

    <?php 

    }
}

register_widget('nastik_contact_widget');