<?php

/**
 * Business Startup Theme Customizer.
 *
 * @package Business Startup
 */

//customizer core option
require get_template_directory().'/inc/customizer/core/customizer-core.php';

//customizer
require get_template_directory().'/inc/customizer/core/default.php';
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_startup_customize_register($wp_customize) {

	// Load custom controls.
	require get_template_directory().'/inc/customizer/core/control.php';

	// Load customize sanitize.
	require get_template_directory().'/inc/customizer/core/sanitize.php';

	$wp_customize->get_setting('blogname')->transport        = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

	/*front page section details*/
	require get_template_directory().'/inc/customizer/banner-section.php';

	/*theme option panel details*/
	require get_template_directory().'/inc/customizer/theme-option.php';
	/*color typo panel details*/
	require get_template_directory() . '/inc/customizer/color-typo.php';


	// Register custom section types.
	$wp_customize->register_section_type( 'Business_Startup_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Business_Startup_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Business Startup Pro', 'business-startup' ),
				'pro_text' => esc_html__( 'Purchase', 'business-startup' ),
				'pro_url'  => 'https://www.themeinwp.com/theme/business-startup-pro/',
				'priority'  => 1,
			)
		)
	);

}

add_action('customize_register', 'business_startup_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function business_startup_customize_preview_js() {

	wp_enqueue_script('business_startup_customizer', get_template_directory_uri().'/js/customizer.js', array('customize-preview'), '20130508', true);

}

add_action('customize_preview_init', 'business_startup_customize_preview_js');

function business_startup_customizer_css() {
	wp_enqueue_script('business_startup_customize_controls', get_template_directory_uri().'/assets/twp/js/customizer-admin.js', array('customize-controls'));
}
add_action('customize_controls_enqueue_scripts', 'business_startup_customizer_css', 0);
