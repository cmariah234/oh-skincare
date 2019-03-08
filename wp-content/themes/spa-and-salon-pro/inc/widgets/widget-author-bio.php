<?php
/**
 * Widget Author Bio
 *
 * @package Spa_And_Salon
 */
 
// register Spa_And_Salon_Author_Bio widget
function spa_and_salon_register_author_bio_widget() {
    register_widget( 'Spa_And_Salon_Author_Bio' );
}
add_action( 'widgets_init', 'spa_and_salon_register_author_bio_widget' );
 
 /**
 * Adds Spa_And_Salon_Author_Bio widget.
 */
class Spa_And_Salon_Author_Bio extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'spa_and_salon_author_bio', // Base ID
			__( 'RARA: Author Bio', 'spa-and-salon-pro' ), // Name
			array( 'description' => __( 'An Author Bio Widget', 'spa-and-salon-pro' ), ) // Args
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
        
        $title         = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$content       = ! empty( $instance['content'] ) ? $instance['content'] : '';
        $image         = ! empty( $instance['image'] ) ? $instance['image'] : '';
        $label         = ! empty( $instance['label'] ) ? $instance['label'] : '';
        $link          = ! empty( $instance['link'] ) ? $instance['link'] : '';
        $attachment_id = spa_and_salon_get_image_id( $image );
        $image_array   = wp_get_attachment_image_src( $attachment_id, 'spa-and-salon-with-sidebar' );
        $image         = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $image);
                
        echo $args['before_widget'];
        
        if( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title']; 
        ?>
            <?php if( $image ){ ?>
                <div class="image-holder">
                    <img src="<?php echo esc_url( $image_array[0] ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
				</div>
			<?php } ?>                
            
            <?php echo wpautop( wp_kses_post( $content ) ); ?>
            
            <?php if( $link && $label ){ ?>
            <a href="<?php echo esc_url( $link ); ?>" class="readmore"><?php echo esc_html( $label );?></a>
            <?php } ?>
                    
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
        
        $title   = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$content = ! empty( $instance['content'] ) ? $instance['content'] : '';
        $image   = ! empty( $instance['image'] ) ? $instance['image'] : '';
        $label   = ! empty( $instance['label'] ) ? $instance['label'] : '';
        $link    = ! empty( $instance['link'] ) ? $instance['link'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php esc_html_e( 'Content', 'spa-and-salon-pro' ); ?></label>
            <textarea name="<?php echo esc_attr( $this->get_field_name( 'content' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php echo wp_kses_post( $content ); ?></textarea>
        </p>
        
        <?php spa_and_salon_get_image_field( $this->get_field_id( 'image' ), $this->get_field_name( 'image' ), $image, __( 'Upload Image', 'spa-and-salon-pro' ) ); ?>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'label' ) ); ?>"><?php esc_html_e( 'Button Label', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'label' ) ); ?>" type="text" value="<?php echo esc_attr( $label ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Button Link', 'spa-and-salon-pro' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_url( $link ); ?>" />
            
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
		
        $instance['title']   = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['content'] = ! empty( $new_instance['content'] ) ? wp_kses_post( $new_instance['content'] ) : '';
        $instance['image']   = ! empty( $new_instance['image'] ) ? esc_url_raw( $new_instance['image'] ) : '';
        $instance['label']   = ! empty( $new_instance['label'] ) ? sanitize_text_field( $new_instance['label'] ) : '';
        $instance['link']    = ! empty( $new_instance['link'] ) ? esc_url_raw( $new_instance['link'] ) : '';
        
		return $instance;
        
	}

} // class Spa_And_Salon_Author_Bio