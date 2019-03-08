<?php
/**
 * Twitter Feeds widget
 *
 * @package Spa_And_Salon
 */
 
 // register spa_and_salon_Twitter_Feeds_Widget widget.
function spa_and_salon_register_twitter_feeds_widget(){
    register_widget( 'spa_and_salon_Twitter_Feeds_Widget' );
}
add_action('widgets_init', 'spa_and_salon_register_twitter_feeds_widget');
 
 /**
 * Adds spa_and_salon_Twitter_Feeds_Widget widget.
 */
class spa_and_salon_Twitter_Feeds_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'spa_and_salon_twitter_feeds_widget', // Base ID
            __( 'RARA: Latest Tweets', 'spa-and-salon-pro' ), // Name
			array( 'description' => __( 'A widget that shows latest tweets', 'spa-and-salon-pro' ), ) // Args			
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
		
        extract( $args );
        if( !empty( $instance['title'] ) ) $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
          
		echo $before_widget;
          				
		if ( ! empty( $title ) ) echo $before_title . $title . $after_title;
        
		//check settings and die if not set
		if( empty( $instance['consumerkey'] ) || empty( $instance['consumersecret'] ) || empty( $instance['accesstoken'] ) || empty( $instance['accesstokensecret'] ) || empty( $instance['cachetime'] ) || empty( $instance['username'] ) ){
			echo __( '<strong>Please fill all widget settings!</strong>', 'spa-and-salon-pro' ) . $after_widget; return; 
        }
		
        //check if cache needs update
		$last_cache_time = get_option( 'spa_and_salon_last_cache_time' );
		$diff = time() - $last_cache_time;
		$crt = $instance['cachetime'] * 3600;						
		
        //	yes, it needs update			
		//require_once('twitteroauth.php');
		if( $diff >= $crt || empty( $last_cache_time ) ){							
		
            if( !require_once( 'twitteroauth.php' ) ){ 
                echo __( '<strong>Couldn\'t find twitteroauth.php!</strong>', 'spa-and-salon-pro' ) . $after_widget; 
                return; 
            }														
            
            function getConnectionWithAccessToken( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret ) {
                $connection = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret );
                return $connection;
            }
            
            $connection = getConnectionWithAccessToken( $instance['consumerkey'], $instance['consumersecret'], $instance['accesstoken'], $instance['accesstokensecret'] );
            
            $tweets = $connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $instance['username'] . "&count=20") or die( __( 'Couldn\'t retrieve tweets! Wrong username?', 'spa-and-salon-pro' ) );
            
            if( !empty( $tweets->errors ) ){
                
                if( $tweets->errors[0]->message == 'Invalid or expired token' ){
				    echo '<strong>' . $tweets->errors[0]->message . '!</strong><br />' . esc_html__( 'You\'ll need to regenerate it ', 'spa-and-salon-pro' ) . '<a href="' . esc_url( 'https://dev.twitter.com/apps' ) . '" target="_blank">' . esc_html__( 'here', 'spa-and-salon-pro' ) .'</a>!' . $after_widget;
                }else{ 
                    echo '<strong>' . $tweets->errors[0]->message . '</strong>' . $after_widget; 
                }
			return;
            }
            
            for($i = 0;$i <= count($tweets); $i++){
    			if(!empty($tweets[$i])){
    				$tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
    				$tweets_array[$i]['text'] = $tweets[$i]->text;			
    				$tweets_array[$i]['status_id'] = $tweets[$i]->id_str;			
    			}
    		}			
		
            //save tweets to wp option 		
            update_option( 'spa_and_salon_tweets', serialize( $tweets_array ) );							
            update_option( 'spa_and_salon_last_cache_time', time() );		
            
		}
        
		$spa_and_salon_tweets = maybe_unserialize( get_option( 'spa_and_salon_tweets' ) );
		
        if( !empty( $spa_and_salon_tweets ) ){
			print '<div class="spa_and_salon_recent_tweets tweets"><ul>';
				$fctr = '1';
				foreach( $spa_and_salon_tweets as $tweet ){								
					
                    print '<li><span>'.$this->convert_links( $tweet['text'] ).'</span><br /><a class="twitter_time" target="_blank" href="http://twitter.com/'.$instance['username'].'/statuses/'.$tweet['status_id'].'">'.$this->relative_time( $tweet['created_at'] ).'</a></li>';
					
                    if( $fctr == $instance['tweetstoshow'] ) break;
					
                    $fctr++;
				}
			print '</ul></div>';
		}
		echo $after_widget;
	}
    
    		
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ){
		$html = '';
        $defaults = array( 
            'title'             => '', 
            'consumerkey'       => '', 
            'consumersecret'    => '', 
            'accesstoken'       => '', 
            'accesstokensecret' => '', 
            'cachetime'         => 1, 
            'username'          => '', 
            'tweetstoshow'      => 3 
        );
		
        $instance = wp_parse_args( (array) $instance, $defaults );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'spa-and-salon-pro' ); ?></label>
        <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'consumerkey' ); ?>"><?php esc_html_e( 'API Key', 'spa-and-salon-pro'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name( 'consumerkey' ); ?>" id="<?php echo $this->get_field_id( 'consumerkey' ); ?>" value="<?php echo esc_attr( $instance['consumerkey'] ); ?>" class="widefat" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'consumersecret' ); ?>"><?php esc_html_e( 'API Secret', 'spa-and-salon-pro' ); ?></label>
        <input type="text" name="<?php echo $this->get_field_name( 'consumersecret' );?>" id="<?php echo $this->get_field_id( 'consumersecret' ); ?>" value="<?php echo esc_attr( $instance['consumersecret'] ); ?>" class="widefat" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'accesstoken' ); ?>"><?php esc_html_e( 'Access Token', 'spa-and-salon-pro' ); ?></label>
        <input type="text" name="<?php echo $this->get_field_name( 'accesstoken' ); ?>" id="<?php echo $this->get_field_id( 'accesstoken' ); ?>" value="<?php echo esc_attr( $instance['accesstoken'] ); ?>" class="widefat" />
    </p>
    									
	<p>
        <label for="<?php echo $this->get_field_id( 'accesstokensecret' ); ?>"><?php esc_html_e( 'Access Token Secret', 'spa-and-salon-pro' ); ?></label>
        <input type="text" name="<?php echo $this->get_field_name( 'accesstokensecret' ); ?>" id="<?php echo $this->get_field_id( 'accesstokensecret' ); ?>" value="<?php echo esc_attr( $instance['accesstokensecret'] ); ?>" class="widefat" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'cachetime' ); ?>"><?php esc_html_e( 'Cache Tweets in every', 'spa-and-salon-pro' ); ?></label>
        <input type="number" min="1" step="1" name="<?php echo $this->get_field_name( 'cachetime' ); ?>" id="<?php echo $this->get_field_id( 'cachetime' ); ?>" value="<?php echo esc_attr( $instance['cachetime'] ); ?>" class="small-text" /><?php esc_html_e( ' hours', 'spa-and-salon-pro' ); ?>
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php esc_html_e( 'Twitter Username', 'spa-and-salon-pro' ); ?></label>
        <input type="text" name="<?php echo $this->get_field_name( 'username' ); ?>" id="<?php echo $this->get_field_id( 'username' ); ?>" value="<?php echo esc_attr( $instance['username'] ); ?>" class="widefat" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'tweetstoshow' ); ?>"><?php esc_html_e( 'Number of tweets (max 20)', 'spa-and-salon-pro' ); ?></label>
        <input type="number" min="1" max="20" step="1" name="<?php echo $this->get_field_name( 'tweetstoshow' ); ?>" id="<?php echo $this->get_field_id( 'username' ); ?>" value="<?php echo esc_attr( $instance['tweetstoshow'] ); ?>" class="widefat" />
    </p>
    
    <p>
    <?php printf( esc_html__( 'Visit %s in a new tab, sign in with your account, click on Create a new application and create your own keys in case you don\'t have already.', 'spa-and-salon-pro' ), '<a href="' . esc_url( 'https://dev.twitter.com/apps/' ) . '" target="_blank">' . esc_html__( 'this link', 'spa-and-salon-pro' ) . '</a>' ); ?>
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
		$instance['title']            = strip_tags( $new_instance['title'] );
		$instance['consumerkey']      = strip_tags( $new_instance['consumerkey'] );
		$instance['consumersecret']   = strip_tags( $new_instance['consumersecret'] );
		$instance['accesstoken']      = strip_tags( $new_instance['accesstoken'] );
		$instance['accesstokensecret']= strip_tags( $new_instance['accesstokensecret'] );
		$instance['cachetime']        = ! empty( $new_instance['cachetime'] ) ? absint( $new_instance['cachetime'] ) : 1;
		$instance['username']         = strip_tags( $new_instance['username'] );
		$instance['tweetstoshow']     = ! empty( $new_instance['tweetstoshow'] ) ? absint( $new_instance['tweetstoshow'] ) : 3;
		
        if( $old_instance['username'] != $new_instance['username'] ) delete_option( 'spa_and_salon_last_cache_time' );
		
        return $instance;
	}
	
    //convert links to clickable format
    function convert_links( $status ){
    	
        $status = preg_replace_callback( '/((http:\/\/|https:\/\/)[^ )]+)/', create_function( '$matches', 'return "<a href=\"$matches[1]\" title=\"$matches[1]\" target=\"_blank\" >". ((strlen($matches[1])>=250 ? substr($matches[1],0,250)."...":$matches[1]))."</a>";' ), $status ); // convert link to url
    	
        $status = preg_replace( "/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" target=\"_blank\" >$1</a>", $status ); // convert @ to follow
    	
        $status = preg_replace( "/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" target=\"_blank\" >$1</a>", $status ); // convert # to search
    	
        return $status; // return the status
    }
    					
    //convert dates to readable format
    function relative_time($a) {		
    	
        $b = strtotime( "now" );  //get current timestampt
    	$c = strtotime( $a ); //get timestamp when tweet created
    	$d = $b - $c; //get difference
    	$minute = 60; //calculate different time values
    	$hour = $minute * 60;
    	$day = $hour * 24;
    	$week = $day * 7;				
    	
        if( is_numeric( $d ) && $d > 0 ) {				
    		if( $d < 3 ) return esc_html__( "right now", 'spa-and-salon-pro' ); //if less then 3 seconds
    		if( $d < $minute ) return floor($d) . esc_html__( " seconds ago", 'spa-and-salon-pro' ); //if less then minute
    		if( $d < $minute * 2 ) return esc_html__( "about 1 minute ago", 'spa-and-salon-pro' ); //if less then 2 minutes
    		if( $d < $hour ) return floor($d / $minute) . esc_html__( " minutes ago", 'spa-and-salon-pro' ); //if less then hour
    		if( $d < $hour * 2 ) return esc_html__( "about 1 hour ago", 'spa-and-salon-pro' ); //if less then 2 hours
    		if( $d < $day ) return floor($d / $hour) . esc_html__( " hours ago", 'spa-and-salon-pro' ); //if less then day
    		if( $d > $day && $d < $day * 2 ) return esc_html__( "yesterday", 'spa-and-salon-pro' ); //if more then day, but less then 2 days
    		if( $d < $day * 365 ) return floor($d / $day) . esc_html__( " days ago", 'spa-and-salon-pro' ); //if less then year
    		return esc_html__( "over a year ago", 'spa-and-salon-pro' ); //else return more than a year
    	}
    }

} // class spa_and_salon_Twitter_Feeds_Widget