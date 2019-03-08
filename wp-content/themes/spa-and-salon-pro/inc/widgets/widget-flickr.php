<?php
/**
 * Widget Flickr
 *
 * @package Spa_And_Salon
 */
 
// register spa_and_salon_Flickr_Widget widget
function spa_and_salon_register_flickr_widget() {
    register_widget( 'spa_and_salon_Flickr_Widget' );
}
add_action( 'widgets_init', 'spa_and_salon_register_flickr_widget' );
 
 /**
 * Adds spa_and_salon_Flickr_Widget widget.
 */
class spa_and_salon_Flickr_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'spa_and_salon_flickr_widget', // Base ID
            __( 'RARA: Flickr', 'spa-and-salon-pro' ), // Name
            array( 'description' => __( 'A Flickr Widget. Use Once per page.', 'spa-and-salon-pro' ), ) // Args
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
        
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Flickr Photos', 'spa-and-salon-pro' );
        $flickr_id  = ! empty( $instance['flickr_id'] ) ? $instance['flickr_id'] : '';
        $number     = ! empty( $instance['number'] ) ? $instance['number'] : 6;
        $row_number = ! empty( $instance['row_number'] ) ? $instance['row_number'] : 2;
        
        echo $args['before_widget'];
     
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
        }
     
        ?>
        <ul id="flickrcbox" class="flicker_widget row col-<?php echo $row_number; ?>"></ul>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                
                jQuery('#flickrcbox').jflickrfeed({
                    limit: <?php echo absint( $number ); ?>,
                    qstrings: {
                        id: '<?php echo strip_tags( $flickr_id ); ?>'
                    },
                    itemTemplate: '<li><a target="_blank" href="{{image_b}}"><img src="{{image_q}}" alt="{{title}}" /></a></li>'
                });

            });
        </script>
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
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Flickr Photos', 'spa-and-salon-pro' );
        $flickr_id  = ! empty( $instance['flickr_id'] ) ? $instance['flickr_id'] : '';
        $number     = ! empty( $instance['number'] ) ? $instance['number'] : 6;
        $row_number = ! empty( $instance['row_number'] ) ? $instance['row_number'] : 2;
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title', 'spa-and-salon-pro' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('flickr_id'); ?>"><?php esc_html_e( 'Flickr User ID', 'spa-and-salon-pro' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text" value="<?php echo esc_attr( $flickr_id ); ?>" />
                <small><?php printf( esc_html__( 'Dont\'t know your ID. Head on over to %s to find it.', 'spa-and-salon-pro' ), '<a target="_blank" href="' . esc_url( 'http://idgettr.com/' ) . '">' . esc_html__( 'idGettr', 'spa-and-salon-pro' ) . '</a>' ); ?></small>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e( 'Number of Photos', 'spa-and-salon-pro' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" value="<?php echo absint( $number ); ?>" min="1" max="20" />
                <small><?php esc_html_e( 'Set how many photos you want to show.  Flickr seems to limit its feeds to 20. So you can use maximum 20 photos.', 'spa-and-salon-pro' ); ?></small>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('row_number'); ?>">Number of Photos per row:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('row_number'); ?>" name="<?php echo $this->get_field_name('row_number'); ?>" type="number" value="<?php echo absint( $row_number ); ?>" max="6" min="1" />
                <small><?php esc_html_e( 'Set how many photos you want to show in a row. So you can use minimum 1 photo and maximum 6 photos.', 'spa-and-salon-pro' ); ?></small>
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

        $instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['flickr_id']  = ( ! empty( $new_instance['flickr_id'] ) ) ? strip_tags( $new_instance['flickr_id'] ) : '';
        $instance['number']     = ( ! empty( $new_instance['number'] ) ) ? absint( $new_instance['number'] ) : 6;
        $instance['row_number'] = ( ! empty( $new_instance['row_number'] ) ) ? absint( $new_instance['row_number'] ) : 2;

        return $instance;
    }

} // class spa_and_salon_Flickr_Widget