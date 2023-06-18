<?php

if (!function_exists('business_startup_add_breadcrumb')) :

    /**
     * Add breadcrumb.
     *
     * @since 1.0.0
     */
    function business_startup_add_breadcrumb()
    {

        // Bail if Breadcrumb disabled.
        $breadcrumb_type = business_startup_get_option('breadcrumb_type');
        if ('disabled' === $breadcrumb_type) {
            return;
        }
        // Bail if Home Page.
        if (is_front_page() || is_home()) {
            return;
        }
        // Render breadcrumb.
        switch ($breadcrumb_type) {
            case 'simple':
                echo "<div class='breadcrumb-bgcolor'>";
                business_startup_simple_breadcrumb();
                echo "</div>";
                break;

            case 'advanced':
                if (function_exists('bcn_display')) {
                    bcn_display();
                }
                break;

            default:
                break;
        }
        return;

    }

endif;

add_action('business_startup_action_breadcrumb', 'business_startup_add_breadcrumb', 10);
