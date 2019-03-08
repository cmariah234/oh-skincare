<?php
/**
 * Spa And Salon Pro Theme Info
 *
 * @package Spa_And_Salon_Pro
 */

function spa_and_salon_pro_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info', 
        array(
            'title'    => __( 'Information Links' , 'spa-and-salon-pro' ),
            'priority' => 6,
		)
    );

	/** Important Links */
	$wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<ul>';
	$theme_info .= sprintf( __( '<li>View demo: %1$sClick here.%2$s</li>', 'spa-and-salon-pro' ),  '<a href="' . esc_url( 'http://raratheme.com/previews/?theme=spa-and-salon-pro' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>View documentation: %1$sClick here.%2$s</li>', 'spa-and-salon-pro' ),  '<a href="' . esc_url( 'http://raratheme.com/documentation/spa-and-salon-pro/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Theme info: %1$sClick here.%2$s</li>', 'spa-and-salon-pro' ),  '<a href="' . esc_url( 'https://raratheme.com/wordpress-themes/spa-and-salon-pro/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Support ticket: %1$sClick here.%2$s</li>', 'spa-and-salon-pro' ),  '<a href="' . esc_url( 'https://raratheme.com/support-ticket/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>More WordPress Themes: %1$sClick here.%2$s</li>', 'spa-and-salon-pro' ),  '<a href="' . esc_url( 'https://raratheme.com/wordpress-themes/' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</ul>';

	$wp_customize->add_control( new Spa_And_Salon_Pro_Theme_Info( $wp_customize,
        'theme_info_theme',
            array(
                'label'       => __( 'Important Links' , 'spa-and-salon-pro' ),
                'section'     => 'theme_info',
                'description' => $theme_info
    		)
        )
    );

}
add_action( 'customize_register', 'spa_and_salon_pro_customizer_theme_info' );


if( class_exists( 'WP_Customize_control' ) ){

	class Spa_And_Salon_Pro_Theme_Info extends WP_Customize_Control
	{
    	public function render_content(){ ?>
    	    <span class="customize-control-title">
    			<?php echo esc_html( $this->label ); ?>
    		</span>
    
    		<?php if( $this->description ){ ?>
    			<span class="description customize-control-description">
    			<?php echo wp_kses_post($this->description); ?>
    			</span>
    		<?php }
        }
    }//editor close
    
}//class close