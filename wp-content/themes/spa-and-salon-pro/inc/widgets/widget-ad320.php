<?php
/**
 * 320 X 350 AD widget
 *
 * @package Spa_And_Salon
 */

// register spa_and_salon_320_Widget widget
function spa_and_salon_register_320_widget(){
    register_widget( 'spa_and_salon_320_Widget' );
}
add_action('widgets_init', 'spa_and_salon_register_320_widget');
 
 /**
 * Adds spa_and_salon_320_Widget widget.
 */
class spa_and_salon_320_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
			'spa_and_salon_320_widget', // Base ID
			__( 'RARA: AD 320 X 320', 'spa-and-salon-pro' ), // Name
			array( 'description' => __( 'A widget for 320 x 320 ad (Single banner)', 'spa-and-salon-pro' ), ) // Args
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
        $html 	        = '';
        $title          = ! empty( $instance['title'] ) ? $instance['title'] : '' ;		
        $adcode         = ! empty( $instance['adcode'] ) ? $instance['adcode'] : '';
        $image          = ! empty( $instance['image'] ) ? esc_url_raw( $instance['image'] ) : '';
        $url            = ! empty( $instance['url'] ) ? esc_url_raw( $instance['url'] ) : '';
        $attachment_id  = spa_and_salon_get_image_id( $image );
        $image_array    = wp_get_attachment_image_src( $attachment_id, 'full');
        $image          = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $image);
        
        echo $args['before_widget']; 
        if( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
        
        if ( $adcode != '' ) {
            $html .= $adcode;
        } elseif ( $image != '' ){
            $html .= '<div class="ads320-wrap">';
            
            if ( $url != '' ) $html .= '<a href="' . esc_url( $url ) . '" target="_blank">';
            
            $html .= '<img src="' . esc_url( $image_array[0] ) . '" alt="" />';
            
            if ( $url != '' ) $html .= '</a>';
                
            $html .= '</div>';
        }

        print $html;
        
        echo $args['after_widget'];
    }

    /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title  = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        $adcode = ! empty( $instance['adcode'] ) ? $instance['adcode'] : '';
        $image  = ! empty( $instance['image'] ) ? esc_url_raw( $instance['image'] ) : '';
        $url    = ! empty( $instance['url'] ) ? esc_url_raw( $instance['url'] ) : '';
        
        /* Make the ad code read-only if the user can't work with unfiltered HTML. */
        $read_only = '';
        if ( !current_user_can( 'unfiltered_html' ) ) {
            $read_only = ' readonly="readonly"';
        }
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />            
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'adcode' ) ); ?>"><?php esc_html_e( 'Ad Code', 'spa-and-salon-pro' ); ?></label>
            <textarea name="<?php echo esc_attr( $this->get_field_name( 'adcode' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'adcode' ) ); ?>"<?php echo esc_attr( $read_only ); ?>><?php print $adcode; ?></textarea>
        </p>
        
        <p><strong><?php esc_html_e( 'or', 'spa-and-salon-pro' ); ?></strong></p>
        
        <?php spa_and_salon_get_image_field( $this->get_field_id( 'image' ), $this->get_field_name( 'image' ), $image, __( 'Upload Image', 'spa-and-salon-pro' ) ); ?>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php esc_html_e( 'Link URL', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_url( $url ); ?>" />
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
		
        $instance['title']  = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['adcode'] = ! empty( $new_instance['adcode'] ) ? $new_instance['adcode'] : '';
        $instance['image']  = ! empty( $new_instance['image'] ) ? esc_url_raw( $new_instance['image'] ) : '';
        $instance['url']    = ! empty( $new_instance['url']) ? esc_url_raw( $new_instance['url'] ) : '';
        
        if ( !current_user_can( 'unfiltered_html' ) )
        $instance['adcode'] = $old_instance['adcode'];
            
		return $instance;
	}

}  // class spa_and_salon_320_Widget 