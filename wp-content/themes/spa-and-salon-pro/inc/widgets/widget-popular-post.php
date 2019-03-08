<?php
/**
 * Widget Popular Post
 *
 * @package Spa_And_Salon
 */
 
// register spa_and_salon_Popular_Post widget
function spa_and_salon_register_popular_post_widget() {
    register_widget( 'spa_and_salon_Popular_Post' );
}
add_action( 'widgets_init', 'spa_and_salon_register_popular_post_widget' );
 
 /**
 * Adds spa_and_salon_Popular_Post widget.
 */
class spa_and_salon_Popular_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'spa_and_salon_popular_post', // Base ID
			__( 'RARA: Popular Post', 'spa-and-salon-pro' ), // Name
			array( 'description' => __( 'A Popular Post Widget', 'spa-and-salon-pro' ), ) // Args
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
        $num_post    = ! empty( $instance['num_post'] ) ? absint($instance['num_post']) : 3 ;
        $show_thumb  = ! empty( $instance['show_thumbnail'] ) ? esc_attr( $instance['show_thumbnail'] ) : '';
        $show_date   = ! empty( $instance['show_postdate'] ) ? esc_attr( $instance['show_postdate'] ) : '';
        $based_on    = ! empty( $instance['based_on'] ) ? $instance['based_on'] : 'views';
        $comment_num = ! empty( $instance['comment_num'] ) ? $instance['comment_num'] : '';
        $view_count  = ! empty( $instance['view_count'] ) ? $instance['view_count'] : '';
        
        $cat = get_theme_mod( 'spa_and_salon_exclude_categories' );
        if( $cat ) $cat = array_diff( array_unique( $cat ), array('') );
        
        $arg = array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => $num_post,
            'ignore_sticky_posts'   => true,
            'category__not_in'      => $cat
        );
        
        if( $based_on == 'views' ){
            $arg['orderby'] = 'meta_value_num';
            $arg['meta_key'] = '_spa_and_salon_view_count';
        }elseif( $based_on == 'comments' ){
            $arg['orderby'] = 'comment_count';
        }
        
        $qry = new WP_Query( $arg );
                
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
                        <?php if( has_post_thumbnail() && $show_thumb ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <?php the_post_thumbnail( 'spa-and-salon-service', array( 'itemprop' => 'image' ) );?>
                            </a>
                        <?php }elseif( ! has_post_thumbnail() && $show_thumb ){ ?>
                            <a href="<?php the_permalink();?>" class="post-thumbnail">
                                <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-preview.png' ); ?>" alt="<?php the_title_attribute(); ?>" itemprop="image"/>
                            </a>
                        <?php }?>
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <?php if( $show_date || $comment_num || $view_count ){?>
                                <div class="entry-meta">
                                    <?php if( $show_date ){?>
                                    <span class="posted-on"><a href="<?php the_permalink(); ?>">
                                        <time datetime="<?php printf( __( '%1$s', 'spa-and-salon-pro' ), get_the_date('Y-m-d') ); ?>">
                                        <?php printf( __( '%1$s', 'spa-and-salon-pro' ), get_the_date('F jS, Y') ); ?></time>
                                    </a></span>
                                    <?php }
                                    if( $based_on == 'views' && $view_count ){ ?>
                                        <span class="view-count"><?php echo esc_html( spa_and_salon_get_views( get_the_ID() ) );?></span>
                                    <?php }elseif( $based_on == 'comments' && $comment_num ){ ?>
                                        <span class="comment-count"><?php comments_number(); ?></span>
                                    <?php } ?>
                                </div>
                            <?php }?>                            
                         </header>                       
                    </li>        
                <?php    
                }
            ?>
            </ul>
            <?php
            echo $args['after_widget'];   
        }
        wp_reset_postdata();  
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title          = ! empty( $instance['title'] ) ? strip_tags( $instance['title'] ) : '';
        $num_post       = ! empty( $instance['num_post'] ) ? absint($instance['num_post']) : 3 ;
        $show_thumbnail = ! empty( $instance['show_thumbnail'] ) ? esc_attr( $instance['show_thumbnail'] ) : '';
        $show_postdate  = ! empty( $instance['show_postdate'] ) ? esc_attr( $instance['show_postdate'] ) : '';
        $based_on       = !empty( $instance['based_on'] ) ? $instance['based_on'] : 'views';
        $comment_num    = !empty( $instance['comment_num'] ) ? $instance['comment_num'] : '';
        $view_count     = !empty( $instance['view_count'] ) ? $instance['view_count'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'num_post' ); ?>"><?php _e( 'Number of Posts', 'spa-and-salon-pro' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_post' ); ?>" name="<?php echo $this->get_field_name( 'num_post' ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $num_post ); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'based_on' ); ?>"><?php esc_html_e( 'Popular based on:', 'spa-and-salon-pro' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'based_on' ); ?>" name="<?php echo $this->get_field_name( 'based_on' ); ?>">
				<option value="views" <?php selected( $based_on, 'views' ); ?>><?php esc_html_e( 'Post Views', 'spa-and-salon-pro' ); ?></option>
				<option value="comments" <?php selected( $based_on, 'comments' ); ?>><?php esc_html_e( 'Comment Count', 'spa-and-salon-pro' ); ?></option>
			</select>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_thumbnail ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php _e( 'Show Post Thumbnail', 'spa-and-salon-pro' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo $this->get_field_id( 'show_postdate' ); ?>" name="<?php echo $this->get_field_name( 'show_postdate' ); ?>" type="checkbox" value="1" <?php checked( '1', $show_postdate ); ?>/>
            <label for="<?php echo $this->get_field_id( 'show_postdate' ); ?>"><?php _e( 'Show Post Date', 'spa-and-salon-pro' ); ?></label>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'comment_num' ); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'comment_num' ); ?>" name="<?php echo $this->get_field_name('comment_num' ); ?>" value="1" <?php checked( 1, $comment_num ); ?> />
				<?php esc_html_e( 'Show number of comments', 'spa-and-salon-pro' ); ?>
			</label>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'view_count' ); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'view_count' ); ?>" name="<?php echo $this->get_field_name('view_count' ); ?>" value="1" <?php checked( 1, $view_count ); ?> />
				<?php esc_html_e( 'Show number of views', 'spa-and-salon-pro' ); ?>
			</label>
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
		
        $instance['title']          = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['num_post']       = ! empty( $new_instance['num_post'] ) ? absint( $new_instance['num_post'] ) : 3 ;        
        $instance['show_thumbnail'] = ! empty( $new_instance['show_thumbnail'] ) ? esc_attr( $new_instance['show_thumbnail'] ) : '';
        $instance['show_postdate']  = ! empty( $new_instance['show_postdate'] ) ? esc_attr( $new_instance['show_postdate'] ) : '';
        $instance['based_on']       = ! empty( $new_instance['based_on'] ) ? $new_instance['based_on'] : 'views';      
        $instance['comment_num']    = ! empty( $new_instance['comment_num'] ) ? $new_instance[ 'comment_num' ] : '';
        $instance['view_count']     = ! empty( $new_instance['view_count'] ) ? $new_instance[ 'view_count' ] : '';
		
        return $instance;
                
	}

} // class spa_and_salon_Popular_Post 