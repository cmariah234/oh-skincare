<?php
/**
 * Widget Category Post
 *
 * @package Spa_And_Salon
 */
 
// register spa_and_salon_Category_Post widget
function spa_and_salon_register_category_post_widget() {
    register_widget( 'spa_and_salon_Category_Post' );
}
add_action( 'widgets_init', 'spa_and_salon_register_category_post_widget' );
 
 /**
 * Adds spa_and_salon_Category_Post widget.
 */
class spa_and_salon_Category_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'spa_and_salon_category_post', // Base ID
			__( 'RARA: Category Post', 'spa-and-salon-pro' ), // Name
			array( 'description' => __( 'A Category Recent Post Widget', 'spa-and-salon-pro' ), ) // Args
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
	   
        $title          = !empty( $instance['title'] ) ? $instance['title'] : '';
        $num_post       = !empty( $instance['num_post'] ) ? absint( $instance['num_post'] ) : 3 ;
        $show_thumbnail = !empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : '';
        $show_postdate  = !empty( $instance['show_postdate'] ) ? $instance['show_postdate'] : '';
        $cat            = !empty( $instance['cat'] ) ? $instance['cat'] : '';
        
        $qry = new WP_Query( array(
            'post_type'             => 'post',
            'cat'                   => $cat,
            'post_status'           => 'publish',
            'posts_per_page'        => $num_post,
            'ignore_sticky_posts'   => true
        ) );
        if( $qry->have_posts() ){
            echo $args['before_widget'];
            if( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
            ?>
            <ul>
            <?php
                while( $qry->have_posts() ){
                    $qry->the_post();
                ?>
                    <li>
                        <?php if( has_post_thumbnail() && $show_thumbnail ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <?php the_post_thumbnail( 'spa-and-salon-service', array( 'itemprop' => 'image' ) );?>
                            </a>
                        <?php }elseif( ! has_post_thumbnail() && $show_thumbnail ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-preview.png' ); ?>" alt="<?php the_title_attribute(); ?>" itemprop="image"/>
                            </a>
                        <?php }?>
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <div class="entry-meta">
                            <?php if( $show_postdate ){ ?>
                                <span class="posted-on"><a href="<?php the_permalink(); ?>">
                                <time datetime="<?php printf( __( '%1$s', 'spa-and-salon-pro' ), get_the_date('Y-m-d') ); ?>">
                                <?php printf( __( '%1$s', 'spa-and-salon-pro' ), get_the_date('F jS, Y') ); ?></time></a></span>
                            <?php } ?>
                            </div>
                         </header>                       
                    </li>      
                <?php    
                }
            ?>
            </ul>
            <?php
            wp_reset_postdata(); 
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
        
        $title          = !empty( $instance['title'] ) ? $instance['title'] : '';
        $num_post       = !empty( $instance['num_post'] ) ? absint( $instance['num_post'] ) : 3 ;
        $show_thumbnail = !empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : '';
        $show_postdate  = !empty( $instance['show_postdate'] ) ? $instance['show_postdate'] : '';
        $cat            = !empty( $instance['cat'] ) ? $instance['cat'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php esc_html_e( 'Category:', 'spa-and-salon-pro' ); ?></label> 
			<?php wp_dropdown_categories( Array(
						'orderby'            => 'ID', 
						'order'              => 'ASC',
						'show_count'         => 1,
						'hide_empty'         => 1,
						'hide_if_empty'      => true,
						'echo'               => 1,
						'selected'           => $cat,
						'hierarchical'       => 1, 
						'name'               => $this->get_field_name( 'cat' ),
						'id'                 => $this->get_field_id( 'cat' ),
						'taxonomy'           => 'category',
					) ); ?>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'num_post' ); ?>"><?php esc_html_e( 'Number of Posts', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_post' ); ?>" name="<?php echo $this->get_field_name( 'num_post' ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $num_post ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_thumbnail ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'spa-and-salon-pro' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_postdate' ); ?>" name="<?php echo $this->get_field_name( 'show_postdate' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_postdate ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_postdate' ); ?>"><?php esc_html_e( 'Show Post Date', 'spa-and-salon-pro' ); ?></label>
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
		
        $instance['title']          = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['cat']            = !empty( $new_instance['cat'] ) ? strip_tags( $new_instance['cat'] ) : '' ;
        $instance['num_post']       = !empty( $new_instance['num_post'] ) ? absint($new_instance['num_post']) : 3 ;        
        $instance['show_thumbnail'] = !empty( $new_instance['show_thumbnail'] ) ? esc_attr( $new_instance['show_thumbnail'] ) : '';
        $instance['show_postdate']  = !empty( $new_instance['show_postdate'] ) ? esc_attr( $new_instance['show_postdate'] ) : '';
		return $instance;
	}

} // class spa_and_salon_Category_Post 