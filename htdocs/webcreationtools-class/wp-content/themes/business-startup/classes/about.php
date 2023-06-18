<?php

/**
 * Business Startup About Page
 * @package Business Startup
 *
 */

if (!class_exists('Business_Startup_About_page')):

    class Business_Startup_About_page
    {

        function __construct()
        {

            add_action('admin_menu', array($this, 'business_startup_backend_menu'), 999);

        }

        // Add Backend Menu
        function business_startup_backend_menu()
        {

            add_theme_page(esc_html__('Business Startup', 'business-startup'), esc_html__('Business Startup', 'business-startup'), 'activate_plugins', 'business-startup-about', array($this, 'business_startup_main_page'), 1);

        }

        // Settings Form
        function business_startup_main_page()
        {

            require get_template_directory() . '/classes/about-render.php';

        }

    }

    new Business_Startup_About_page();

endif;