<?php
/**
 * Widget Social Links
 *
 * @package Spa_And_Salon
 */

// register spa_and_salon_Social_Links widget 
function spa_and_salon_register_social_links_widget() {
    register_widget( 'spa_and_salon_Social_Links' );
}
add_action( 'widgets_init', 'spa_and_salon_register_social_links_widget' );
 
 /**
 * Adds spa_and_salon_Social_Links widget.
 */
class spa_and_salon_Social_Links extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'spa_and_salon_social_links', // Base ID
			__( 'RARA: Social Links', 'spa-and-salon-pro' ), // Name
			array( 'description' => __( 'A Social Links Widget', 'spa-and-salon-pro' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	   
        $title       = ! empty( $instance['title'] ) ? strip_tags( $instance['title'] ) : '';		
        $facebook    = ! empty( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '' ;
        $twitter     = ! empty( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '' ;
        $instagram   = ! empty( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '' ;
        $gplus       = ! empty( $instance['gplus'] ) ? esc_url( $instance['gplus'] ) : '' ;
        $pinterest   = ! empty( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '' ;
        $linkedin    = ! empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '' ;
        $youtube     = ! empty( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '' ;
        $vimeo       = ! empty( $instance['vimeo'] ) ? esc_url( $instance['vimeo'] ) : '' ;
        $dribbble    = ! empty( $instance['dribbble'] ) ? esc_url( $instance['dribbble'] ) : '' ;
        $foursquare  = ! empty( $instance['foursquare'] ) ? esc_url( $instance['foursquare'] ) : '' ;
        $flickr      = ! empty( $instance['flickr'] ) ? esc_url( $instance['flickr'] ) : '' ;
        $reddit      = ! empty( $instance['reddit'] ) ? esc_url( $instance['reddit'] ) : '' ;
        $skype       = ! empty( $instance['skype'] ) ? esc_url( $instance['skype'] ) : '' ;
        $stumbleupon = ! empty( $instance['stumbleupon'] ) ? esc_url( $instance['stumbleupon'] ) : '' ;
        $tumblr      = ! empty( $instance['tumblr'] ) ? esc_url( $instance['tumblr'] ) : '' ;
        $ok          = ! empty( $instance['ok'] ) ? esc_url( $instance['ok'] ) : '' ;
        $vk          = ! empty( $instance['vk'] ) ? esc_url( $instance['vk'] ) : '' ;
        $xing        = ! empty( $instance['xing'] ) ? esc_url( $instance['xing'] ) : '' ;
        
        if( $facebook || $twitter || $instagram || $gplus || $pinterest || $linkedin || $youtube || $vimeo || $dribbble || $flickr || $reddit || $skype || $stumbleupon || $tumblr || $ok || $vk || $xing ){ 
        echo $args['before_widget'];
        if( $title ) echo $args['before_title'] . apply_filters( 'the_title', $title, $instance, $this->id_base ) . $args['after_title'];
        ?>
            <ul class="social-networks">
				<?php if( $facebook ){ ?>
                <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank" title="<?php esc_html_e( 'Facebook', 'spa-and-salon-pro' ); ?>"><i class="fa fa-facebook"></i></a></li>
				<?php } if( $twitter ){ ?>
                <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank" title="<?php esc_html_e( 'Twitter', 'spa-and-salon-pro' ); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php } if( $instagram ){ ?>
                <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank" title="<?php esc_html_e( 'Instagram', 'spa-and-salon-pro' ); ?>"><i class="fa fa-instagram"></i></a></li>
                <?php } if( $gplus ){ ?>
                <li><a href="<?php echo esc_url( $gplus ); ?>" target="_blank" title="<?php esc_html_e( 'Gooble Plus', 'spa-and-salon-pro' ); ?>"><i class="fa fa-google-plus"></i></a></li>
				<?php } if( $pinterest ){ ?>
                <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank" title="<?php esc_html_e( 'Pinterest', 'spa-and-salon-pro' ); ?>"><i class="fa fa-pinterest-p"></i></a></li>
				<?php } if( $linkedin ){ ?>
                <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" title="<?php esc_html_e( 'Linkedin', 'spa-and-salon-pro' ); ?>"><i class="fa fa-linkedin"></i></a></li>
				<?php } if( $youtube ){ ?>
                <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank" title="<?php esc_html_e( 'YouTube', 'spa-and-salon-pro' ); ?>"><i class="fa fa-youtube"></i></a></li>
                <?php } if( $vimeo ){ ?>
                <li><a href="<?php echo esc_url( $vimeo ); ?>" target="_blank" title="<?php esc_html_e( 'Vimeo', 'spa-and-salon-pro' ); ?>"><i class="fa fa-vimeo"></i></a></li>
                <?php } if( $dribbble ){ ?>
                <li><a href="<?php echo esc_url( $dribbble ); ?>" target="_blank" title="<?php esc_html_e( 'Dribbble', 'spa-and-salon-pro' ); ?>"><i class="fa fa-dribbble"></i></a></li>
                <?php } if( $foursquare ){ ?>
                <li><a href="<?php echo esc_url( $foursquare ); ?>" target="_blank" title="<?php esc_html_e( 'Foursquare', 'spa-and-salon-pro' ); ?>"><i class="fa fa-foursquare"></i></a></li>
                <?php } if( $flickr ){ ?>
                <li><a href="<?php echo esc_url( $flickr ); ?>" target="_blank" title="<?php esc_html_e( 'Flickr', 'spa-and-salon-pro' ); ?>"><i class="fa fa-flickr"></i></a></li>
                <?php } if( $reddit ){ ?>
                <li><a href="<?php echo esc_url( $reddit ); ?>" target="_blank" title="<?php esc_html_e( 'Reddit', 'spa-and-salon-pro' ); ?>"><i class="fa fa-reddit"></i></a></li>
                <?php } if( $skype ){ ?>
                <li><a href="<?php echo esc_url( $skype ); ?>" title="<?php esc_html_e( 'Skype', 'spa-and-salon-pro' ); ?>"><i class="fa fa-skype"></i></a></li>
                <?php } if( $stumbleupon ){ ?>
                <li><a href="<?php echo esc_url( $stumbleupon ); ?>" target="_blank" title="<?php esc_html_e( 'StumbleUpon', 'spa-and-salon-pro' ); ?>"><i class="fa fa-stumbleupon"></i></a></li>
                <?php } if( $tumblr ){ ?>
                <li><a href="<?php echo esc_url( $tumblr ); ?>" target="_blank" title="<?php esc_html_e( 'Tumblr', 'spa-and-salon-pro' ); ?>"><i class="fa fa-tumblr"></i></a></li>
                <?php } if( $ok ){ ?>
                <li><a href="<?php echo esc_url( $ok ); ?>" target="_blank" title="<?php esc_html_e( 'OK', 'spa-and-salon-pro' ); ?>"><i class="fa fa-odnoklassniki"></i></a></li>
                <?php } if( $vk ){ ?>
                <li><a href="<?php echo esc_url( $vk ); ?>" target="_blank" title="<?php esc_html_e( 'VK', 'spa-and-salon-pro' ); ?>"><i class="fa fa-vk"></i></a></li>
                <?php } if( $xing ){ ?>
                <li><a href="<?php echo esc_url( $xing ); ?>" target="_blank" title="<?php esc_html_e( 'Xing', 'spa-and-salon-pro' ); ?>"><i class="fa fa-xing"></i></a></li>
                <?php } ?>                
			</ul>
        <?php
        echo $args['after_widget'];
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title       = ! empty( $instance['title'] ) ? strip_tags( $instance['title'] ) : '';		
        $facebook    = ! empty( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '' ;
        $twitter     = ! empty( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '' ;
        $instagram   = ! empty( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '' ;
        $gplus       = ! empty( $instance['gplus'] ) ? esc_url( $instance['gplus'] ) : '' ;
        $pinterest   = ! empty( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '' ;
        $linkedin    = ! empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '' ;
        $youtube     = ! empty( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '' ;
        $vimeo       = ! empty( $instance['vimeo'] ) ? esc_url( $instance['vimeo'] ) : '' ;
        $dribbble    = ! empty( $instance['dribbble'] ) ? esc_url( $instance['dribbble'] ) : '' ;
        $foursquare  = ! empty( $instance['foursquare'] ) ? esc_url( $instance['foursquare'] ) : '' ;
        $flickr      = ! empty( $instance['flickr'] ) ? esc_url( $instance['flickr'] ) : '' ;
        $reddit      = ! empty( $instance['reddit'] ) ? esc_url( $instance['reddit'] ) : '' ;
        $skype       = ! empty( $instance['skype'] ) ? esc_url( $instance['skype'] ) : '' ;
        $stumbleupon = ! empty( $instance['stumbleupon'] ) ? esc_url( $instance['stumbleupon'] ) : '' ;
        $tumblr      = ! empty( $instance['tumblr'] ) ? esc_url( $instance['tumblr'] ) : '' ;
        $ok          = ! empty( $instance['ok'] ) ? esc_url( $instance['ok'] ) : '' ;
        $vk          = ! empty( $instance['vk'] ) ? esc_url( $instance['vk'] ) : '' ;
        $xing        = ! empty( $instance['xing'] ) ? esc_url( $instance['xing'] ) : '' ;
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_url( $facebook ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_url( $twitter ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_url( $instagram ); ?>" />
		</p>
                
        <p>
            <label for="<?php echo $this->get_field_id( 'gplus' ); ?>"><?php _e( 'Google Plus', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" type="text" value="<?php echo esc_url( $gplus ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_url( $pinterest ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'LinkedIn', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_url( $linkedin ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_url( $youtube ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" type="text" value="<?php echo esc_url( $vimeo ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" type="text" value="<?php echo esc_url( $dribbble ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'foursquare' ); ?>"><?php _e( 'Foursquare', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'foursquare' ); ?>" name="<?php echo $this->get_field_name( 'foursquare' ); ?>" type="text" value="<?php echo esc_url( $foursquare ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" type="text" value="<?php echo esc_url( $flickr ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'reddit' ); ?>"><?php _e( 'Reddit', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'reddit' ); ?>" name="<?php echo $this->get_field_name( 'reddit' ); ?>" type="text" value="<?php echo esc_url( $reddit ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e( 'Skype', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" type="text" value="<?php echo esc_url( $skype ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'stumbleupon' ); ?>"><?php _e( 'StumbleUpon', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'stumbleupon' ); ?>" name="<?php echo $this->get_field_name( 'stumbleupon' ); ?>" type="text" value="<?php echo esc_url( $stumbleupon ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e( 'Tumblr', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" type="text" value="<?php echo esc_url( $tumblr ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'ok' ); ?>"><?php _e( 'OK', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'ok' ); ?>" name="<?php echo $this->get_field_name( 'ok' ); ?>" type="text" value="<?php echo esc_url( $ok ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'vk' ); ?>"><?php _e( 'VK', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'vk' ); ?>" name="<?php echo $this->get_field_name( 'vk' ); ?>" type="text" value="<?php echo esc_url( $vk ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'xing' ); ?>"><?php _e( 'Xing', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'xing' ); ?>" name="<?php echo $this->get_field_name( 'xing' ); ?>" type="text" value="<?php echo esc_url( $xing ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
        $instance = array();
		
        $instance['title']       = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['facebook']    = ! empty( $new_instance['facebook'] ) ? esc_url( $new_instance['facebook'] ) : '';
        $instance['twitter']     = ! empty( $new_instance['twitter'] ) ? esc_url( $new_instance['twitter'] ) : '';
        $instance['instagram']   = ! empty( $new_instance['instagram'] ) ? esc_url( $new_instance['instagram'] ) : '';
        $instance['gplus']       = ! empty( $new_instance['gplus'] ) ? esc_url( $new_instance['gplus'] ) : '' ;
        $instance['pinterest']   = ! empty( $new_instance['pinterest'] ) ? esc_url( $new_instance['pinterest'] ) : '';
        $instance['linkedin']    = ! empty( $new_instance['linkedin'] ) ? esc_url( $new_instance['linkedin'] ) : '';
        $instance['youtube']     = ! empty( $new_instance['youtube'] ) ? esc_url( $new_instance['youtube'] ) : '';
        $instance['vimeo']       = ! empty( $new_instance['vimeo'] ) ? esc_url( $new_instance['vimeo'] ) : '' ;
        $instance['dribbble']    = ! empty( $new_instance['dribbble'] ) ? esc_url( $new_instance['dribbble'] ) : '' ;
        $instance['foursquare']  = ! empty( $new_instance['foursquare'] ) ? esc_url( $new_instance['foursquare'] ) : '' ;
        $instance['flickr']      = ! empty( $new_instance['flickr'] ) ? esc_url( $new_instance['flickr'] ) : '' ;
        $instance['reddit']      = ! empty( $new_instance['reddit'] ) ? esc_url( $new_instance['reddit'] ) : '' ;
        $instance['skype']       = ! empty( $new_instance['skype'] ) ? esc_url( $new_instance['skype'] ) : '' ;
        $instance['stumbleupon'] = ! empty( $new_instance['stumbleupon'] ) ? esc_url( $new_instance['stumbleupon'] ) : '' ;
        $instance['tumblr']      = ! empty( $new_instance['tumblr'] ) ? esc_url( $new_instance['tumblr'] ) : '' ;
        $instance['ok']          = ! empty( $new_instance['ok'] ) ? esc_url( $new_instance['ok'] ) : '' ;
        $instance['vk']          = ! empty( $new_instance['vk'] ) ? esc_url( $new_instance['vk'] ) : '' ;
        $instance['xing']        = ! empty( $new_instance['xing'] ) ? esc_url( $new_instance['xing'] ) : '' ;
        
        return $instance;
                
	}

} // class spa_and_salon_Social_Links 