<?php 
/**
* Spa and Salon Metabox.
*
* @package Spa_and_Salon
*
*/ 

function spa_and_salon_add_sidebar_layout_box(){
    $screens = array( 'post', 'page' );
    foreach( $screens as $screen ){
        add_meta_box( 
            'spa_and_salon_sidebar_layout',
            __( 'Sidebar Layout', 'spa-and-salon-pro' ),
            'spa_and_salon_sidebar_layout_callback', 
            $screen,
            'normal',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'spa_and_salon_add_sidebar_layout_box' );

$spa_and_salon_sidebar_layout = array(
        'default-sidebar' => array(
                                'value' => 'default-sidebar',
                                'thumbnail' => get_template_directory_uri() . '/images/default-sidebar.png'
                            ),
        'left-sidebar' => array(
                                'value' => 'left-sidebar',
                                'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
                            ),
        'right-sidebar' => array(
                                'value' => 'right-sidebar',
                                'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                            ),
);

function spa_and_salon_sidebar_layout_callback(){
    global $post , $spa_and_salon_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'spa_and_salon_sidebar_nonce' );
    $sidebars = spa_and_salon_get_dynamnic_sidebar( true, true, true );
    $sidebar  = get_post_meta( $post->ID, '_spa_and_salon_sidebar', true );
?>
 
<table class="form-table page-meta-box">
    <tr>
        <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'spa-and-salon-pro' ); ?></em></td>
    </tr>

    <tr>
        <td>
        <?php  
            foreach( $spa_and_salon_sidebar_layout as $field ){  
                $layout = get_post_meta( $post->ID, '_spa_and_salon_sidebar_layout', true ); ?>
            
            <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="spa_and_salon_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'right-sidebar' ); }?>/>
                <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                    <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['value'] ); ?>" />                    
                </label>
            </div>
            <?php } // end foreach 
            ?>
            <div class="clear"></div>
        </td>
    </tr>
    
    <tr>
        <td colspan="3"><em class="f13"><?php esc_html_e( 'Choose Sidebar', 'spa-and-salon-pro' ); ?></em></td>
    </tr>
    
    <tr>
        <td>
            <select name="spa_and_salon_sidebar">
            <?php 
                foreach( $sidebars as $k => $v ){ ?>
                    <option value="<?php echo esc_attr( $k ); ?>" <?php selected( $sidebar, $k ); if( empty( $sidebar ) && $k == 'default-sidebar' ){ echo "selected='selected'";}?> ><?php echo esc_html( $v ); ?></option>
                <?php }
            ?>
            </select>
        </td>    
    </tr>
    
    <tr>
        <td><em class="f13"><?php printf( esc_html__( 'You can set up the sidebar content from %s', 'spa-and-salon-pro' ), '<a href="'. esc_url( admin_url( 'widgets.php' ) ) .'">here</a>' ); ?></em></td>
    </tr>
    
</table>
 
<?php }

function spa_and_salon_save_sidebar_layout( $post_id ){
      global $spa_and_salon_sidebar_layout , $post;

       // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'spa_and_salon_sidebar_nonce' ] ) || !wp_verify_nonce( $_POST[ 'spa_and_salon_sidebar_nonce' ], basename( __FILE__ ) ) )
        return;
    
 // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;

    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }
    
    // Make sure that it is set.
	if ( ! isset( $_POST['spa_and_salon_sidebar'] ) ) {
		return;		
	}

    foreach( $spa_and_salon_sidebar_layout as $field ){  
        //Execute this saving function
        $old = get_post_meta( $post_id, '_spa_and_salon_sidebar_layout', true ); 
        $new = sanitize_text_field( $_POST['spa_and_salon_sidebar_layout'] );
        if ( $new && $new != $old ) {  		
            update_post_meta( $post_id, '_spa_and_salon_sidebar_layout', $new );  
        } elseif ('' == $new && $old ) {  
            delete_post_meta( $post_id,'_spa_and_salon_sidebar_layout',  $old );  
        } 
    } // end foreach     
     
    // Sanitize user input.
	$sidebar = sanitize_text_field( $_POST['spa_and_salon_sidebar'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_spa_and_salon_sidebar', $sidebar );       
}
add_action('save_post' , 'spa_and_salon_save_sidebar_layout');

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function member_detail_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function member_detail_add_meta_box() {
	add_meta_box(
		'member_detail-member-detail',
		__( 'Team Detail', 'spa-and-salon-pro' ),
		'member_detail_html',
		'spa_team',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'member_detail_add_meta_box' );

function member_detail_html( $post) {
	wp_nonce_field( '_member_detail_nonce', 'member_detail_nonce' ); ?>

	<p>
		<label for="member_detail_member_position"><?php _e( 'Team Position', 'spa-and-salon-pro' ); ?></label><br>
		<input type="text" name="member_detail_member_position" id="member_detail_member_position" value="<?php echo member_detail_get_meta( 'member_detail_member_position' ); ?>">
	</p><?php
}

function member_detail_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['member_detail_nonce'] ) || ! wp_verify_nonce( $_POST['member_detail_nonce'], '_member_detail_nonce' ) ) return;	
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['member_detail_member_position'] ) )
		update_post_meta( $post_id, 'member_detail_member_position', esc_attr( $_POST['member_detail_member_position'] ) );
}
add_action( 'save_post', 'member_detail_save' );

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function plan_options_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function plan_options_add_meta_box() {
	add_meta_box(
		'plan_options-plan-options',
		__( 'Plan Options', 'spa-and-salon-pro' ),
		'plan_options_html',
		'spa_plans',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'plan_options_add_meta_box' );

function plan_options_html( $post) {
	wp_nonce_field( '_plan_options_nonce', 'plan_options_nonce' ); ?>

	<p>
		<label for="plan_options_price"><?php _e( 'Enter Price', 'spa-and-salon-pro' ); ?></label><br>
		<input type="text" name="plan_options_price" id="plan_options_price" value="<?php echo plan_options_get_meta( 'plan_options_price' ); ?>">
	</p><?php
}

function plan_options_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['plan_options_nonce'] ) || ! wp_verify_nonce( $_POST['plan_options_nonce'], '_plan_options_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['plan_options_price'] ) )
		update_post_meta( $post_id, 'plan_options_price', esc_attr( $_POST['plan_options_price'] ) );
}
add_action( 'save_post', 'plan_options_save' );

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function client_detail_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function client_detail_add_meta_box() {
	add_meta_box(
		'client_detail-client-detail',
		__( 'Client Detail', 'spa-and-salon-pro' ),
		'client_detail_html',
		'spa_testimonials',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'client_detail_add_meta_box' );

function client_detail_html( $post) {
	wp_nonce_field( '_client_detail_nonce', 'client_detail_nonce' ); ?>

	<p>
		<label for="client_detail_enter_client_designation"><?php _e( 'Enter Client Designation', 'spa-and-salon-pro' ); ?></label><br>
		<input type="text" name="client_detail_enter_client_designation" id="client_detail_enter_client_designation" value="<?php echo client_detail_get_meta( 'client_detail_enter_client_designation' ); ?>">
	</p><?php
}

function client_detail_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['client_detail_nonce'] ) || ! wp_verify_nonce( $_POST['client_detail_nonce'], '_client_detail_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['client_detail_enter_client_designation'] ) )
		update_post_meta( $post_id, 'client_detail_enter_client_designation', esc_attr( $_POST['client_detail_enter_client_designation'] ) );
}
add_action( 'save_post', 'client_detail_save' );

/*
	Usage: client_detail_get_meta( 'client_detail_enter_client_designation' )
*/

