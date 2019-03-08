<?php
/**
 * Sanitization Functions
 *
 * @package spa_and_salon
 * 
 */
 
/**
 * Sanitization Functions
 * 
 * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
 */ 
    
function spa_and_salon_sanitize_text( $text ) {
	return wp_kses_post( $text );
}

function spa_and_salon_sanitize_email( $email ) {
	// Sanitize $input as a hex value without the hash prefix.
	$email = sanitize_email( $email );
	
	// If $email is a valid email, return it; otherwise, return the default.
	return ( ( $email ) ? $email  : '' );
}

function spa_and_salon_sanitize_iframe( $iframe ){
    $allow_tag = array(
                    'iframe'=>array(
                        'src'=>array(),
                        'width'=>array(),
                        'height'=>array()
                    )
                );
    return wp_kses( $iframe, $allow_tag );
}

function spa_and_salon_sanitize_select( $value ){
    
    if ( is_array( $value ) ) {
        foreach ( $value as $key => $subvalue ) {
            $value[ $key ] = esc_attr( $subvalue );
        }
        return $value;
    }
    return esc_attr( $value );

}