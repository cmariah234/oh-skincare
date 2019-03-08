<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.12
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'kirki_demo', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/**
 * Add a panel.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/panels.html
 */
Kirki::add_panel(
	'kirki_demo_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Kirki Demo Panel', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Contains sections for all kirki controls.', 'spa-and-salon-pro' ),
	)
);

/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
 */
$sections = array(
	'background'      => array( esc_attr__( 'Background', 'spa-and-salon-pro' ), '' ),
	'code'            => array( esc_attr__( 'Code', 'spa-and-salon-pro' ), '' ),
	'checkbox'        => array( esc_attr__( 'Checkbox', 'spa-and-salon-pro' ), '' ),
	'color'           => array( esc_attr__( 'Color', 'spa-and-salon-pro' ), '' ),
	'color-palette'   => array( esc_attr__( 'Color Palette', 'spa-and-salon-pro' ), '' ),
	'custom'          => array( esc_attr__( 'Custom', 'spa-and-salon-pro' ), '' ),
	'dashicons'       => array( esc_attr__( 'Dashicons', 'spa-and-salon-pro' ), '' ),
	'date'            => array( esc_attr__( 'Date', 'spa-and-salon-pro' ), '' ),
	'dimension'       => array( esc_attr__( 'Dimension', 'spa-and-salon-pro' ), '' ),
	'dimensions'      => array( esc_attr__( 'Dimensions', 'spa-and-salon-pro' ), '' ),
	'editor'          => array( esc_attr__( 'Editor', 'spa-and-salon-pro' ), '' ),
	'fontawesome'     => array( esc_attr__( 'Font-Awesome', 'spa-and-salon-pro' ), '' ),
	'generic'         => array( esc_attr__( 'Generic', 'spa-and-salon-pro' ), '' ),
	'image'           => array( esc_attr__( 'Image', 'spa-and-salon-pro' ), '' ),
	'multicheck'      => array( esc_attr__( 'Multicheck', 'spa-and-salon-pro' ), '' ),
	'multicolor'      => array( esc_attr__( 'Multicolor', 'spa-and-salon-pro' ), '' ),
	'number'          => array( esc_attr__( 'Number', 'spa-and-salon-pro' ), '' ),
	'palette'         => array( esc_attr__( 'Palette', 'spa-and-salon-pro' ), '' ),
	'preset'          => array( esc_attr__( 'Preset', 'spa-and-salon-pro' ), '' ),
	'radio'           => array( esc_attr__( 'Radio', 'spa-and-salon-pro' ), esc_attr__( 'A plain Radio control.', 'spa-and-salon-pro' ) ),
	'radio-buttonset' => array( esc_attr__( 'Radio Buttonset', 'spa-and-salon-pro' ), esc_attr__( 'Radio-Buttonset controls are essentially radio controls with some fancy styling to make them look cooler.', 'spa-and-salon-pro' ) ),
	'radio-image'     => array( esc_attr__( 'Radio Image', 'spa-and-salon-pro' ), esc_attr__( 'Radio-Image controls are essentially radio controls with some fancy styles to use images', 'spa-and-salon-pro' ) ),
	'repeater'        => array( esc_attr__( 'Repeater', 'spa-and-salon-pro' ), '' ),
	'select'          => array( esc_attr__( 'Select', 'spa-and-salon-pro' ), '' ),
	'slider'          => array( esc_attr__( 'Slider', 'spa-and-salon-pro' ), '' ),
	'sortable'        => array( esc_attr__( 'Sortable', 'spa-and-salon-pro' ), '' ),
	'switch'          => array( esc_attr__( 'Switch', 'spa-and-salon-pro' ), '' ),
	'toggle'          => array( esc_attr__( 'Toggle', 'spa-and-salon-pro' ), '' ),
	'typography'      => array( esc_attr__( 'Typography', 'spa-and-salon-pro' ), '' ),
);
foreach ( $sections as $section_id => $section ) {
	Kirki::add_section(
		str_replace( '-', '_', $section_id ) . '_section', array(
			'title'       => $section[0],
			'description' => $section[1],
			'panel'       => 'kirki_demo_panel',
		)
	);
}

/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function my_config_kirki_add_field( $args ) {
	Kirki::add_field( 'kirki_demo', $args );
}

/**
 * Background Control.
 *
 * @todo Triggers change on load.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'background',
		'settings'    => 'background_setting',
		'label'       => esc_attr__( 'Background Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Background conrols are pretty complex! (but useful if properly used)', 'spa-and-salon-pro' ),
		'section'     => 'background_section',
		'default'     => array(
			'background-color'      => 'rgba(20,20,20,.8)',
			'background-image'      => '',
			'background-repeat'     => 'repeat-all',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
	)
);

/**
 * Code control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/code.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'code',
		'settings'    => 'code_setting',
		'label'       => esc_attr__( 'Code Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description', 'spa-and-salon-pro' ),
		'section'     => 'code_section',
		'default'     => '',
		'choices'     => array(
			'language' => 'css',
			'theme'    => 'monokai',
		),
	)
);

/**
 * Checkbox control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/checkbox.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'checkbox_setting',
		'label'       => esc_attr__( 'Checkbox Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description', 'spa-and-salon-pro' ),
		'section'     => 'checkbox_section',
		'default'     => true,
	)
);

/**
 * Color Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'color_setting_hex',
		'label'       => __( 'Color Control (hex-only)', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'This is a color control - without alpha channel.', 'spa-and-salon-pro' ),
		'section'     => 'color_section',
		'default'     => '#0008DC',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'color_setting_rgba',
		'label'       => __( 'Color Control (with alpha channel)', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'This is a color control - with alpha channel.', 'spa-and-salon-pro' ),
		'section'     => 'color_section',
		'default'     => '#0088CC',
		'choices'     => array(
			'alpha' => true,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'color_setting_hue',
		'label'       => __( 'Color Control - hue only.', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'This is a color control - hue only.', 'spa-and-salon-pro' ),
		'section'     => 'color_section',
		'default'     => 160,
		'mode'        => 'hue',
	)
);

/**
 * DateTime Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'date',
		'settings'    => 'date_setting',
		'label'       => esc_attr__( 'Date Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'This is a date control.', 'spa-and-salon-pro' ),
		'section'     => 'date_section',
		'default'     => '',
	)
);

/**
 * Editor Controls
 */
my_config_kirki_add_field(
	array(
		'type'        => 'editor',
		'settings'    => 'editor_1',
		'label'       => esc_attr__( 'First Editor Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'This is an editor control.', 'spa-and-salon-pro' ),
		'section'     => 'editor_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'editor',
		'settings'    => 'editor_2',
		'label'       => esc_attr__( 'Second Editor Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'This is a 2nd editor control just to check that we do not have issues with multiple instances.', 'spa-and-salon-pro' ),
		'section'     => 'editor_section',
		'default'     => esc_attr__( 'Default Text', 'spa-and-salon-pro' ),
	)
);

/**
 * Color-Palette Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color-palette.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_0',
		'label'       => esc_attr__( 'Color-Palette', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'This is a color-palette control', 'spa-and-salon-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#888888',
		'choices'     => array(
			'colors' => array( '#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff' ),
			'style'  => 'round',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_4',
		'label'       => esc_attr__( 'Color-Palette', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Material Design Colors - all', 'spa-and-salon-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#F44336',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'all' ),
			'size'   => 17,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_1',
		'label'       => esc_attr__( 'Color-Palette', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Material Design Colors - primary', 'spa-and-salon-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#000000',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'primary' ),
			'size'   => 25,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_2',
		'label'       => esc_attr__( 'Color-Palette', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Material Design Colors - red', 'spa-and-salon-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#FF1744',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'red' ),
			'size'   => 16,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_3',
		'label'       => esc_attr__( 'Color-Palette', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Material Design Colors - A100', 'spa-and-salon-pro' ),
		'section'     => 'color_palette_section',
		'default'     => '#FF80AB',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'A100' ),
			'size'   => 60,
			'style'  => 'round',
		),
	)
);

/**
 * Dashicons control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/dashicons.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'dashicons',
		'settings'    => 'dashicons_setting_0',
		'label'       => esc_attr__( 'Dashicons Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Using a custom array of dashicons', 'spa-and-salon-pro' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
		'choices'     => array(
			'menu',
			'admin-site',
			'dashboard',
			'admin-post',
			'admin-media',
			'admin-links',
			'admin-page',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'dashicons',
		'settings'    => 'dashicons_setting_1',
		'label'       => esc_attr__( 'All Dashicons', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Showing all dashicons', 'spa-and-salon-pro' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
	)
);

/**
 * Dimension Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'dimension',
		'settings'    => 'dimension_0',
		'label'       => esc_attr__( 'Dimension Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description Here.', 'spa-and-salon-pro' ),
		'section'     => 'dimension_section',
		'default'     => '10px',
	)
);

/**
 * Dimensions Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'dimensions',
		'settings'    => 'dimensions_0',
		'label'       => esc_attr__( 'Dimension Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description Here.', 'spa-and-salon-pro' ),
		'section'     => 'dimensions_section',
		'default'     => array(
			'width'  => '100px',
			'height' => '100px',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'dimensions',
		'settings'    => 'dimensions_1',
		'label'       => esc_attr__( 'Dimension Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description Here.', 'spa-and-salon-pro' ),
		'section'     => 'dimensions_section',
		'default'     => array(
			'padding-top'    => '1em',
			'padding-bottom' => '10rem',
			'padding-left'   => '1vh',
			'padding-right'  => '10px',
		),
	)
);

/**
 * Font-Awesome Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'fontawesome',
		'settings'    => 'fontawesome_setting',
		'label'       => esc_attr__( 'Font Awesome Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description Here.', 'spa-and-salon-pro' ),
		'section'     => 'fontawesome_section',
		'default'     => 'bath',
	)
);

/**
 * Generic Controls.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'generic_text_setting',
		'label'       => esc_attr__( 'Text Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description', 'spa-and-salon-pro' ),
		'section'     => 'generic_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'textarea',
		'settings'    => 'generic_textarea_setting',
		'label'       => esc_attr__( 'Textarea Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description', 'spa-and-salon-pro' ),
		'section'     => 'generic_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'generic',
		'settings'    => 'generic_custom_setting',
		'label'       => esc_attr__( 'Custom input Control.', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'The "generic" control allows you to add any input type you want. In this case we use type="password" and define custom styles.', 'spa-and-salon-pro' ),
		'section'     => 'generic_section',
		'default'     => '',
		'choices'     => array(
			'element'  => 'input',
			'type'     => 'password',
			'style'    => 'background-color:black;color:red;',
			'data-foo' => 'bar',
		),
	)
);

/**
 * Image Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_url',
		'label'       => esc_attr__( 'Image Control (URL)', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description Here.', 'spa-and-salon-pro' ),
		'section'     => 'image_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_id',
		'label'       => esc_attr__( 'Image Control (ID)', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description Here.', 'spa-and-salon-pro' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => array(
			'save_as' => 'id',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_array',
		'label'       => esc_attr__( 'Image Control (array)', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description Here.', 'spa-and-salon-pro' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => array(
			'save_as' => 'array',
		),
	)
);

/**
 * Multicheck Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'multicheck',
		'settings'    => 'multicheck_setting',
		'label'       => esc_attr__( 'Multickeck Control', 'spa-and-salon-pro' ),
		'section'     => 'multicheck_section',
		'default'     => array( 'option-1', 'option-3', 'option-4' ),
		'priority'    => 10,
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'spa-and-salon-pro' ),
			'option-2' => esc_attr__( 'Option 2', 'spa-and-salon-pro' ),
			'option-3' => esc_attr__( 'Option 3', 'spa-and-salon-pro' ),
			'option-4' => esc_attr__( 'Option 4', 'spa-and-salon-pro' ),
			'option-5' => esc_attr__( 'Option 5', 'spa-and-salon-pro' ),
		),
	)
);

/**
 * Multicolor Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'multicolor',
		'settings'    => 'multicolor_setting',
		'label'       => esc_attr__( 'Label', 'spa-and-salon-pro' ),
		'section'     => 'multicolor_section',
		'priority'    => 10,
		'choices'     => array(
			'link'    => esc_attr__( 'Color', 'spa-and-salon-pro' ),
			'hover'   => esc_attr__( 'Hover', 'spa-and-salon-pro' ),
			'active'  => esc_attr__( 'Active', 'spa-and-salon-pro' ),
		),
		'default'     => array(
			'link'    => '#0088cc',
			'hover'   => '#00aaff',
			'active'  => '#00ffff',
		),
	)
);

/**
 * Number Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'number',
		'settings'    => 'number_setting',
		'label'       => esc_attr__( 'Label', 'spa-and-salon-pro' ),
		'section'     => 'number_section',
		'priority'    => 10,
		'choices'     => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1,
		),
	)
);

/**
 * Palette Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'palette',
		'settings'    => 'palette_setting',
		'label'       => esc_attr__( 'Label', 'spa-and-salon-pro' ),
		'section'     => 'palette_section',
		'default'     => 'blue',
		'choices'     => array(
			'a200'  => Kirki_Helper::get_material_design_colors( 'A200' ),
			'blue'  => Kirki_Helper::get_material_design_colors( 'blue' ),
			'green' => array( '#E8F5E9', '#C8E6C9', '#A5D6A7', '#81C784', '#66BB6A', '#4CAF50', '#43A047', '#388E3C', '#2E7D32', '#1B5E20', '#B9F6CA', '#69F0AE', '#00E676', '#00C853' ),
			'bnw'   => array( '#000000', '#ffffff' ),
		),
	)
);

/**
 * Radio Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'radio',
		'settings'    => 'radio_setting',
		'label'       => esc_attr__( 'Radio Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'The description here.', 'spa-and-salon-pro' ),
		'section'     => 'radio_section',
		'default'     => 'option-3',
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'spa-and-salon-pro' ),
			'option-2' => esc_attr__( 'Option 2', 'spa-and-salon-pro' ),
			'option-3' => esc_attr__( 'Option 3', 'spa-and-salon-pro' ),
			'option-4' => esc_attr__( 'Option 4', 'spa-and-salon-pro' ),
			'option-5' => esc_attr__( 'Option 5', 'spa-and-salon-pro' ),
		),
	)
);

/**
 * Radio-Buttonset Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'radio_buttonset_setting',
		'label'       => esc_attr__( 'Radio-Buttonset Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'The description here.', 'spa-and-salon-pro' ),
		'section'     => 'radio_buttonset_section',
		'default'     => 'option-2',
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'spa-and-salon-pro' ),
			'option-2' => esc_attr__( 'Option 2', 'spa-and-salon-pro' ),
			'option-3' => esc_attr__( 'Option 3', 'spa-and-salon-pro' ),
		),
	)
);

/**
 * Radio-Image Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'radio-image',
		'settings'    => 'radio_image_setting',
		'label'       => esc_attr__( 'Radio-Image Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'The description here.', 'spa-and-salon-pro' ),
		'section'     => 'radio_image_section',
		'default'     => 'travel',
		'choices'     => array(
			'moto'    => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-moto.png',
			'cossack' => 'https://raw.githubusercontent.com/templatemonster/cossack-wapuula/master/cossack-wapuula.png',
			'travel'  => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-travel.png',
		),
	)
);

/**
 * Select Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'select',
		'settings'    => 'select_setting',
		'label'       => esc_attr__( 'Select Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'The description here.', 'spa-and-salon-pro' ),
		'section'     => 'select_section',
		'default'     => 'option-3',
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'spa-and-salon-pro' ),
			'option-2' => esc_attr__( 'Option 2', 'spa-and-salon-pro' ),
			'option-3' => esc_attr__( 'Option 3', 'spa-and-salon-pro' ),
			'option-4' => esc_attr__( 'Option 4', 'spa-and-salon-pro' ),
			'option-5' => esc_attr__( 'Option 5', 'spa-and-salon-pro' ),
		),
	)
);

/**
 * Slider Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'slider',
		'settings'    => 'slider_setting',
		'label'       => esc_attr__( 'Slider Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'The description here.', 'spa-and-salon-pro' ),
		'section'     => 'slider_section',
		'default'     => '10',
		'choices'     => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
			'suffix' => 'px',
		),
	)
);

/**
 * Sortable control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'sortable',
		'settings'    => 'sortable_setting',
		'label'       => __( 'This is a sortable control.', 'spa-and-salon-pro' ),
		'section'     => 'sortable_section',
		'default'     => array( 'option3', 'option1', 'option4' ),
		'choices'     => array(
			'option1' => esc_attr__( 'Option 1', 'spa-and-salon-pro' ),
			'option2' => esc_attr__( 'Option 2', 'spa-and-salon-pro' ),
			'option3' => esc_attr__( 'Option 3', 'spa-and-salon-pro' ),
			'option4' => esc_attr__( 'Option 4', 'spa-and-salon-pro' ),
			'option5' => esc_attr__( 'Option 5', 'spa-and-salon-pro' ),
			'option6' => esc_attr__( 'Option 6', 'spa-and-salon-pro' ),
		),
	)
);

/**
 * Switch control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'switch_setting',
		'label'       => esc_attr__( 'Switch Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description', 'spa-and-salon-pro' ),
		'section'     => 'switch_section',
		'default'     => true,
	)
);

/**
 * Toggle control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'toggle',
		'settings'    => 'toggle_setting',
		'label'       => esc_attr__( 'Toggle Control', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'Description', 'spa-and-salon-pro' ),
		'section'     => 'toggle_section',
		'default'     => true,
	)
);

/**
 * Typography Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'typography_setting_0',
		'label'       => esc_attr__( 'Typography Control Label', 'spa-and-salon-pro' ),
		'description' => esc_attr__( 'The full set of options.', 'spa-and-salon-pro' ),
		'section'     => 'typography_section',
		'default'     => array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '14px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#333333',
			'text-transform' => 'none',
			'text-align'     => 'left',
		),
		'priority'    => 10,
	)
);
