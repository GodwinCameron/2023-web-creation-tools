<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_startup_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'business-startup'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'business-startup'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title center-widget-title">',
        'after_title' => '</h5>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Home Page Widget Area', 'business-startup'),
        'id' => 'sidebar-home',
        'description' => esc_html__('Add widgets here which will apear on your home page.', 'business-startup'),
        'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    $business_startup_footer_widgets_number = business_startup_get_option('number_of_footer_widget');

    if ($business_startup_footer_widgets_number > 0) {
        register_sidebar(array(
            'name' => esc_html__('Footer Column One', 'business-startup'),
            'id' => 'footer-col-one',
            'description' => esc_html__('Displays items on footer section.', 'business-startup'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
        ));
        if ($business_startup_footer_widgets_number > 1) {
            register_sidebar(array(
                'name' => esc_html__('Footer Column Two', 'business-startup'),
                'id' => 'footer-col-two',
                'description' => esc_html__('Displays items on footer section.', 'business-startup'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title">',
                'after_title' => '</h5>',
            ));
        }
        if ($business_startup_footer_widgets_number > 2) {
            register_sidebar(array(
                'name' => esc_html__('Footer Column Three', 'business-startup'),
                'id' => 'footer-col-three',
                'description' => esc_html__('Displays items on footer section.', 'business-startup'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title">',
                'after_title' => '</h5>',
            ));
        }
        if ($business_startup_footer_widgets_number > 3) {
            register_sidebar(array(
                'name' => esc_html__('Footer Column Four', 'business-startup'),
                'id' => 'footer-col-four',
                'description' => esc_html__('Displays items on footer section.', 'business-startup'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title">',
                'after_title' => '</h5>',
            ));
        }
    }
}

add_action('widgets_init', 'business_startup_widgets_init');
