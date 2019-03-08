<?php

/**
 * Customizer Typography Control
 *
 * Taken from Kirki.
 *
 * @package   theme-slug
 * @copyright Copyright (c) 2016, Nose Graze Ltd.
 * @license   GPL2+
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

class Rara_Typography_Control extends WP_Customize_Control {

	public $tooltip = '';
	public $js_vars = array();
	public $output = array();
	public $option_type = 'theme_mod';
	public $type = 'rara-typography';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		} else {
			$this->json['default'] = $this->setting->default;
		}
		$this->json['js_vars'] = $this->js_vars;
		$this->json['output']  = $this->output;
		$this->json['value']   = $this->value();
		$this->json['choices'] = $this->choices;
		$this->json['link']    = $this->get_link();
		$this->json['tooltip'] = $this->tooltip;
		$this->json['id']      = $this->id;
		$this->json['l10n']    = apply_filters( 'rara-typography-control/il8n/strings', array(
			'on'                 => esc_attr__( 'ON', 'spa-and-salon-pro' ),
			'off'                => esc_attr__( 'OFF', 'spa-and-salon-pro' ),
			'all'                => esc_attr__( 'All', 'spa-and-salon-pro' ),
			'cyrillic'           => esc_attr__( 'Cyrillic', 'spa-and-salon-pro' ),
			'cyrillic-ext'       => esc_attr__( 'Cyrillic Extended', 'spa-and-salon-pro' ),
			'devanagari'         => esc_attr__( 'Devanagari', 'spa-and-salon-pro' ),
			'greek'              => esc_attr__( 'Greek', 'spa-and-salon-pro' ),
			'greek-ext'          => esc_attr__( 'Greek Extended', 'spa-and-salon-pro' ),
			'khmer'              => esc_attr__( 'Khmer', 'spa-and-salon-pro' ),
			'latin'              => esc_attr__( 'Latin', 'spa-and-salon-pro' ),
			'latin-ext'          => esc_attr__( 'Latin Extended', 'spa-and-salon-pro' ),
			'vietnamese'         => esc_attr__( 'Vietnamese', 'spa-and-salon-pro' ),
			'hebrew'             => esc_attr__( 'Hebrew', 'spa-and-salon-pro' ),
			'arabic'             => esc_attr__( 'Arabic', 'spa-and-salon-pro' ),
			'bengali'            => esc_attr__( 'Bengali', 'spa-and-salon-pro' ),
			'gujarati'           => esc_attr__( 'Gujarati', 'spa-and-salon-pro' ),
			'tamil'              => esc_attr__( 'Tamil', 'spa-and-salon-pro' ),
			'telugu'             => esc_attr__( 'Telugu', 'spa-and-salon-pro' ),
			'thai'               => esc_attr__( 'Thai', 'spa-and-salon-pro' ),
			'serif'              => _x( 'Serif', 'font style', 'spa-and-salon-pro' ),
			'sans-serif'         => _x( 'Sans Serif', 'font style', 'spa-and-salon-pro' ),
			'monospace'          => _x( 'Monospace', 'font style', 'spa-and-salon-pro' ),
			'font-family'        => esc_attr__( 'Font Family', 'spa-and-salon-pro' ),
			'font-size'          => esc_attr__( 'Font Size', 'spa-and-salon-pro' ),
			'font-weight'        => esc_attr__( 'Font Weight', 'spa-and-salon-pro' ),
			'line-height'        => esc_attr__( 'Line Height', 'spa-and-salon-pro' ),
			'font-style'         => esc_attr__( 'Font Style', 'spa-and-salon-pro' ),
			'letter-spacing'     => esc_attr__( 'Letter Spacing', 'spa-and-salon-pro' ),
			'text-align'         => esc_attr__( 'Text Align', 'spa-and-salon-pro' ),
			'text-transform'     => esc_attr__( 'Text Transform', 'spa-and-salon-pro' ),
			'none'               => esc_attr__( 'None', 'spa-and-salon-pro' ),
			'uppercase'          => esc_attr__( 'Uppercase', 'spa-and-salon-pro' ),
			'lowercase'          => esc_attr__( 'Lowercase', 'spa-and-salon-pro' ),
			'top'                => esc_attr__( 'Top', 'spa-and-salon-pro' ),
			'bottom'             => esc_attr__( 'Bottom', 'spa-and-salon-pro' ),
			'left'               => esc_attr__( 'Left', 'spa-and-salon-pro' ),
			'right'              => esc_attr__( 'Right', 'spa-and-salon-pro' ),
			'center'             => esc_attr__( 'Center', 'spa-and-salon-pro' ),
			'justify'            => esc_attr__( 'Justify', 'spa-and-salon-pro' ),
			'color'              => esc_attr__( 'Color', 'spa-and-salon-pro' ),
			'select-font-family' => esc_attr__( 'Select a font-family', 'spa-and-salon-pro' ),
			'variant'            => esc_attr__( 'Variant', 'spa-and-salon-pro' ),
			'style'              => esc_attr__( 'Style', 'spa-and-salon-pro' ),
			'size'               => esc_attr__( 'Size', 'spa-and-salon-pro' ),
			'height'             => esc_attr__( 'Height', 'spa-and-salon-pro' ),
			'spacing'            => esc_attr__( 'Spacing', 'spa-and-salon-pro' ),
			'ultra-light'        => esc_attr__( 'Ultra-Light 100', 'spa-and-salon-pro' ),
			'ultra-light-italic' => esc_attr__( 'Ultra-Light 100 Italic', 'spa-and-salon-pro' ),
			'light'              => esc_attr__( 'Light 200', 'spa-and-salon-pro' ),
			'light-italic'       => esc_attr__( 'Light 200 Italic', 'spa-and-salon-pro' ),
			'book'               => esc_attr__( 'Book 300', 'spa-and-salon-pro' ),
			'book-italic'        => esc_attr__( 'Book 300 Italic', 'spa-and-salon-pro' ),
			'regular'            => esc_attr__( 'Normal 400', 'spa-and-salon-pro' ),
			'italic'             => esc_attr__( 'Normal 400 Italic', 'spa-and-salon-pro' ),
			'medium'             => esc_attr__( 'Medium 500', 'spa-and-salon-pro' ),
			'medium-italic'      => esc_attr__( 'Medium 500 Italic', 'spa-and-salon-pro' ),
			'semi-bold'          => esc_attr__( 'Semi-Bold 600', 'spa-and-salon-pro' ),
			'semi-bold-italic'   => esc_attr__( 'Semi-Bold 600 Italic', 'spa-and-salon-pro' ),
			'bold'               => esc_attr__( 'Bold 700', 'spa-and-salon-pro' ),
			'bold-italic'        => esc_attr__( 'Bold 700 Italic', 'spa-and-salon-pro' ),
			'extra-bold'         => esc_attr__( 'Extra-Bold 800', 'spa-and-salon-pro' ),
			'extra-bold-italic'  => esc_attr__( 'Extra-Bold 800 Italic', 'spa-and-salon-pro' ),
			'ultra-bold'         => esc_attr__( 'Ultra-Bold 900', 'spa-and-salon-pro' ),
			'ultra-bold-italic'  => esc_attr__( 'Ultra-Bold 900 Italic', 'spa-and-salon-pro' ),
			'invalid-value'      => esc_attr__( 'Invalid Value', 'spa-and-salon-pro' ),
		) );

		$defaults = array( 'font-family'=> false );

		$this->json['default'] = wp_parse_args( $this->json['default'], $defaults );
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_style( 'rara-typography-css', get_template_directory_uri() . '/inc/custom-controls/typography/typography.css', null );
        /*
		 * JavaScript
		 */
        wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-tooltip' );
		wp_enqueue_script( 'jquery-stepper-min-js' );
		
		// Selectize
		wp_enqueue_script( 'selectize', get_template_directory_uri() . '/inc/custom-controls/select/selectize.js', array( 'jquery' ), false, true );

		// Typography
		wp_enqueue_script( 'rara-typography-control', get_template_directory_uri() . '/inc/custom-controls/typography/typography.js', array(
			'jquery',
			'selectize'
		), false, true );

		$google_fonts   = Rara_Fonts::get_google_fonts();
		$standard_fonts = Rara_Fonts::get_standard_fonts();
		$all_variants   = Rara_Fonts::get_all_variants();

		$standard_fonts_final = array();
		foreach ( $standard_fonts as $key => $value ) {
			$standard_fonts_final[] = array(
				'family'      => $value['stack'],
				'label'       => $value['label'],
				'is_standard' => true,
				'variants'    => array(
					array(
						'id'    => 'regular',
						'label' => $all_variants['regular'],
					),
					array(
						'id'    => 'italic',
						'label' => $all_variants['italic'],
					),
					array(
						'id'    => '700',
						'label' => $all_variants['700'],
					),
					array(
						'id'    => '700italic',
						'label' => $all_variants['700italic'],
					),
				),
			);
		}

		$google_fonts_final = array();

		if ( is_array( $google_fonts ) ) {
			foreach ( $google_fonts as $family => $args ) {
				$label    = ( isset( $args['label'] ) ) ? $args['label'] : $family;
				$variants = ( isset( $args['variants'] ) ) ? $args['variants'] : array( 'regular', '700' );

				$available_variants = array();
				foreach ( $variants as $variant ) {
					if ( array_key_exists( $variant, $all_variants ) ) {
						$available_variants[] = array( 'id' => $variant, 'label' => $all_variants[ $variant ] );
					}
				}

				$google_fonts_final[] = array(
					'family'   => $family,
					'label'    => $label,
					'variants' => $available_variants
				);
			}
		}

		$final = array_merge( $standard_fonts_final, $google_fonts_final );
		wp_localize_script( 'rara-typography-control', 'RaraAllFonts', $final );
	}

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
	 *
	 * Supports basic input types `text`, `checkbox`, `textarea`, `radio`, `select` and `dropdown-pages`.
	 * Additional input types such as `email`, `url`, `number`, `hidden` and `date` are supported implicitly.
	 *
	 * Control content can alternately be rendered in JS. See {@see WP_Customize_Control::print_template()}.
	 *
	 * @access public
	 * @return void
	 */
	public function render_content() {

		// intentionally empty
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * I put this in a separate file because PhpStorm didn't like it and it fucked with my formatting.
	 *
	 * @see    WP_Customize_Control::print_template()
	 *
	 * @access protected
	 * @return void
	 */
	protected function content_template() { ?>
		<# if ( data.tooltip ) { #>
            <a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
        <# } #>
        
        <label class="customizer-text">
            <# if ( data.label ) { #>
                <span class="customize-control-title">{{{ data.label }}}</span>
            <# } #>
            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>
        </label>
        
        <div class="wrapper">
            <# if ( data.default['font-family'] ) { #>
                <# if ( '' == data.value['font-family'] ) { data.value['font-family'] = data.default['font-family']; } #>
                <# if ( data.choices['fonts'] ) { data.fonts = data.choices['fonts']; } #>
                <div class="font-family">
                    <h5>{{ data.l10n['font-family'] }}</h5>
                    <select id="rara-typography-font-family-{{{ data.id }}}" placeholder="{{ data.l10n['select-font-family'] }}"></select>
                </div>
                <div class="variant rara-variant-wrapper">
                    <h5>{{ data.l10n['style'] }}</h5>
                    <select class="variant" id="rara-typography-variant-{{{ data.id }}}"></select>
                </div>
            <# } #>   
            
        </div>
        <?php
	}

}