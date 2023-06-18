<?php
/**
 * Default theme options.
 *
 * @package Business Startup
 */

if (!function_exists('business_startup_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function business_startup_get_default_theme_options() {

	$defaults = array();
	//banner section
	$defaults['select_banner_page']           		= 1;
	$defaults['show_page_featured_image']           = 0;
	$defaults['number_of_banner_content']         	= 30;
	$defaults['show_page_link_button'] 				= 1;
	$defaults['banner_additional_button_text']      = esc_html__('Read More', 'business-startup');
    $defaults['additional_button_link']    			= '#';

	/*layout*/
	$defaults['enable_side_panel']    = 1;
	$defaults['enable_animation_logo']    = 1;
	$defaults['enable_social_menu_on_side_panel']    = 1;
	$defaults['enable_contact_on_side_panel']    = 1;
	$defaults['select_contact_page']    = 1;
	$defaults['enable_social_menu_on_contact']    = 1;
	$defaults['excerpt_length_contact']    = 40;
	$defaults['contact_form_shortcode']    = '';

	
	$defaults['homepage_layout_version']   = 'dark-scheme';
	$defaults['read_more_button_text']    = esc_html__('Continue Reading', 'business-startup');
	$defaults['global_layout']            = 'right-sidebar';
	$defaults['excerpt_length_global']    = 23;
	$defaults['enable_archive_category']    = 1;
	$defaults['enable_archive_post_date']   = 1;
	$defaults['enable_archive_post_by']     = 1;
	$defaults['enable_author_info_in_single']    = 1;
	$defaults['enable_related_post_in_single']   = 1;

	$defaults['single_post_image_layout'] = 'full';
	$defaults['pagination_type']          = 'infinite_scroll_load';
	$defaults['copyright_text']           = esc_html__('Copyright All rights reserved', 'business-startup');
	$defaults['number_of_footer_widget']  = 3;
	$defaults['breadcrumb_type']          = 'simple';
	$defaults['enable_copyright_credit']  = 1;

	/*preloader*/
	$defaults['enable_preloader']         		= 1;
	$defaults['enable_sitetitle_on_preloader']  = 1;
    $defaults['preloader_additional_text']		= esc_html__( 'Loading', 'business-startup' );

    /*font and color*/
    $defaults['primary_color']					= '#6146d7';
    $defaults['secondary_color']				= '#202020';
    $defaults['tertiary_color']					= '#f95723';
    $defaults['text_size_title_font_big']		= 70;
    $defaults['text_size_title_font_small']		= 16;
    $defaults['primary_font'] 					= 'Poppins:100,300,400,400i,500,500i,700,700i';
    $defaults['secondary_font'] 				= 'Roboto:300,400,500,700';
    $defaults['text_size_p']					= 14;

	// Pass through filter.
	$defaults = apply_filters('business_startup_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;
