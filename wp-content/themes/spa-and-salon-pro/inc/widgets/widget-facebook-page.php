<?php
/**
 * Facebook Page Plugin widget
 *
 * @package Spa_And_Salon
 */

// register spa_and_salon_Facebook_Page_Widget widget.
function spa_and_salon_register_facebook_page_widget(){
    register_widget( 'spa_and_salon_Facebook_Page_Widget' );
}
add_action('widgets_init', 'spa_and_salon_register_facebook_page_widget');
 
 /**
 * Adds spa_and_salon_Facebook_Page_Widget widget.
 */
class spa_and_salon_Facebook_Page_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
			'spa_and_salon_facebook_page_widget', // Base ID
			__( 'RARA: Facebook Page Plugin', 'spa-and-salon-pro' ), // Name
			array( 'description' => __( 'A widget that shows Facebook Page Box', 'spa-and-salon-pro' ), ) // Args
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
        
        $tab                = '';
        $title              = ! empty( $instance['title'] ) ? $instance['title'] : '';		
        $page_url           = ! empty( $instance['page_url']) ? esc_url_raw( $instance['page_url'] ) : '';
        $width              = ! empty( $instance['width'] ) ? absint( $instance['width'] ) : 500;
        $height             = ! empty( $instance['height'] ) ? absint( $instance['height'] ) : 100;
        $container_width    = ( ! empty( $instance['container_width'] ) && $instance['container_width'] == 1 ) ? 'true' : 'false';
        $show_faces         = ( ! empty( $instance['show_faces'] ) && $instance['show_faces'] == 1 ) ? 'true' : 'false';
        $small_header       = ( ! empty( $instance['small_header'] ) && $instance['small_header'] == 1 ) ? 'true' : 'false';
        $hide_cover_photo   = ( ! empty( $instance['hide_cover_photo'] ) && $instance['hide_cover_photo'] == 1 ) ? 'true' : 'false';
        $show_timeline_tab  = ! empty( $instance['show_timeline_tab'] ) ? $instance['show_timeline_tab'] : '';
        $show_event_tab     = ! empty( $instance['show_event_tab'] ) ? $instance['show_event_tab'] : '';
        $show_msg_tab       = ! empty( $instance['show_msg_tab'] ) ? $instance['show_msg_tab'] : '';
        
        if( $show_event_tab || $show_msg_tab || $show_timeline_tab ){
            $tab = 'data-tabs="';
            $tabs = array();
            
            if( $show_timeline_tab ) $tabs[] .= 'timeline';
            if( $show_event_tab )   $tabs[] .= 'events';
            if( $show_msg_tab )     $tabs[] .= 'messages';            
            
            $tab .= implode( ', ', $tabs );
            $tab .= '"';            
        }
        
        echo $args['before_widget']; ?>
        <div class="spa-and-salon-facebook-page-box">
        <?php if( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title']; ?>
        <div class="fb-page" data-href="<?php echo $page_url; ?>" data-height="<?php echo $height; ?>" data-width="<?php echo $width; ?>" data-adapt-container-width="<?php echo $container_width; ?>" data-hide-cover="<?php echo $hide_cover_photo; ?>" data-show-facepile="<?php echo $show_faces; ?>" data-small-header="<?php echo $small_header;?>" <?php echo $tab; ?> ></div>
        </div>
        
        <?php 
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
        
        $default = array( 
            'title' 	        => '', 
            'page_url' 	        => '', 
            'width' 		    => 500, 
            'height' 		    => 100, 
            'container_width'   => 1, 
            'show_faces' 	    => '',
            'small_header'      => '',
            'hide_cover_photo'  => '',
            'show_timeline_tab' => '',
            'show_event_tab'    => '',
            'show_msg_tab'      => '',            
        );
        $instance = wp_parse_args( (array) $instance, $default );
        
        $title              = $instance['title'];		
        $page_url           = $instance['page_url'];
        $width              = $instance['width'];
        $height             = $instance['height'];
        $container_width    = $instance['container_width'];
        $show_faces         = $instance['show_faces'];
        $small_header       = $instance['small_header'];
        $hide_cover_photo   = $instance['hide_cover_photo'];
        $show_timeline_tab  = $instance['show_timeline_tab'];
        $show_event_tab     = $instance['show_event_tab'];
        $show_msg_tab       = $instance['show_msg_tab'];
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />            
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php esc_html_e( 'Facebook Page URL', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" type="text" value="<?php echo esc_url( $page_url ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php esc_html_e( 'Width', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="number" step="1" min="180" max="500" value="<?php echo esc_attr( $width ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php esc_html_e( 'Height', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="number" step="1" min="70" value="<?php echo esc_attr( $height ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'container_width' ); ?>" name="<?php echo $this->get_field_name( 'container_width' ); ?>" type="checkbox" value="1" <?php checked( '1', $container_width ); ?>/>
            <label for="<?php echo $this->get_field_id( 'container_width' ); ?>"><?php esc_html_e( 'Adapt to plugin container width', 'spa-and-salon-pro' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_faces' ); ?>" name="<?php echo $this->get_field_name( 'show_faces' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_faces ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_faces' ); ?>"><?php esc_html_e( "Show Friend's Faces", 'spa-and-salon-pro' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'small_header' ); ?>" name="<?php echo $this->get_field_name( 'small_header' ); ?>" type="checkbox" value="1" <?php checked( '1', $small_header ); ?>/>
            <label for="<?php echo $this->get_field_id( 'small_header' ); ?>"><?php esc_html_e( 'Use Small Header', 'spa-and-salon-pro' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'hide_cover_photo' ); ?>" name="<?php echo $this->get_field_name( 'hide_cover_photo' ); ?>" type="checkbox" value="1" <?php checked( '1', $hide_cover_photo ); ?>/>
            <label for="<?php echo $this->get_field_id( 'hide_cover_photo' ); ?>"><?php esc_html_e( 'Hide Cover Photo', 'spa-and-salon-pro' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_timeline_tab' ); ?>" name="<?php echo $this->get_field_name( 'show_timeline_tab' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_timeline_tab ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_timeline_tab' ); ?>"><?php esc_html_e( 'Show Timeline Tab', 'spa-and-salon-pro' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_event_tab' ); ?>" name="<?php echo $this->get_field_name( 'show_event_tab' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_event_tab ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_event_tab' ); ?>"><?php esc_html_e( 'Show Event Tab', 'spa-and-salon-pro' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_msg_tab' ); ?>" name="<?php echo $this->get_field_name( 'show_msg_tab' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_msg_tab ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_msg_tab' ); ?>"><?php esc_html_e( 'Show Message Tab', 'spa-and-salon-pro' ); ?></label>
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
		
        $instance['title']              = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['page_url']           = ! empty( $new_instance['page_url']) ? esc_url_raw( $new_instance['page_url'] ) : '';
        $instance['width']              = ! empty( $new_instance['width'] ) ? absint( $new_instance['width'] ) : 500;
        $instance['height']             = ! empty( $new_instance['height'] ) ? absint( $new_instance['height'] ) : 100;
        $instance['container_width']    = ! empty( $new_instance['container_width'] ) ? esc_attr( $new_instance['container_width'] ) : '';
        $instance['show_faces']         = ! empty( $new_instance['show_faces'] ) ? esc_attr( $new_instance['show_faces'] ) : '';
        $instance['small_header']       = ! empty( $new_instance['small_header'] ) ? esc_attr( $new_instance['small_header'] ) : '';
        $instance['hide_cover_photo']   = ! empty( $new_instance['hide_cover_photo'] ) ? esc_attr( $new_instance['hide_cover_photo'] ) : '';
        $instance['show_timeline_tab']  = ! empty( $new_instance['show_timeline_tab'] ) ? esc_attr( $new_instance['show_timeline_tab'] ) : '';
        $instance['show_event_tab']     = ! empty( $new_instance['show_event_tab'] ) ? esc_attr( $new_instance['show_event_tab'] ) : '';
        $instance['show_msg_tab']       = ! empty( $new_instance['show_msg_tab'] ) ? esc_attr( $new_instance['show_msg_tab'] ) : '';
		return $instance;
	}

}  // class spa_and_salon_Facebook_Page_Widget 