<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business Startup
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
<?php if (business_startup_get_option('enable_side_panel') == 1) { 
    $business_side_panel = 'side-panel-enable';
} else {
    $business_side_panel = 'side-panel-disable';
} ?>

<?php if (business_startup_get_option('homepage_layout_version') == 'light-scheme') {
    $business_startup_homepage_version = 'light-scheme';
} elseif (business_startup_get_option('homepage_layout_version') == 'dark-scheme') {
    $business_startup_homepage_version = 'dark-scheme';
}?>

<div id="page" class="site site-bg <?php echo esc_attr($business_startup_homepage_version); ?> <?php echo esc_attr($business_side_panel); ?>">

    <?php if ((business_startup_get_option('enable_preloader')) == 1) { ?>
        <div class="preloader">
            <div class="loader">
                <?php if ((business_startup_get_option('enable_sitetitle_on_preloader')) == 1) { ?>
                    <span class="loader-text loader-text-1" data-text="<?php bloginfo('name'); ?>"> <?php bloginfo('name'); ?></span>
                <?php }
                $business_startup_pre_additional_text = business_startup_get_option('preloader_additional_text');
                if ((!empty($business_startup_pre_additional_text))) { ?>
                    <span class="loader-text loader-text-2"
                          data-text="<?php echo esc_html(business_startup_get_option('preloader_additional_text')); ?>"><?php echo esc_html(business_startup_get_option('preloader_additional_text')); ?></span>
                <?php } ?>
            </div>
        </div>
    <?php } ?>


    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'business-startup'); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div id="nav-affix" class="top-header header--fixed">
            <div class="wrapper-fluid">
                <div class="site-branding primary-bgcolor">
                    <?php if ((business_startup_get_option('enable_animation_logo')) == 1) {
                        $business_logo_animation = 'enable-animation';
                    } else {
                        $business_logo_animation = 'disable-animation';
                    } ?>
                    <?php if (has_custom_logo()) { ?>
                        <div class="brand-image alt-bg <?php echo esc_attr($business_logo_animation) ?>">
                            <?php business_startup_the_custom_logo(); ?>
                        </div>
                    <?php } ?>
                    <div class="brand-details">
                        <?php
                        if (is_front_page() && is_home()) : ?>
                            <span class="site-title primary-font">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </span>
                        <?php else : ?>
                            <span class="site-title primary-font">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </span>
                        <?php
                        endif;
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) : ?>
                            <span class="site-description">
                                <?php echo esc_html($description); ?>
                            </span>
                        <?php
                        endif; ?>
                    </div>
                </div>

                <a href="javascript:void(0)" class="icon-search alt-bg">
                    <i class="ion-ios-search-strong"></i>
                </a>

                <nav class="main-navigation" role="navigation">
                    <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                    <a href="javascript:void(0)" class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                         <span class="screen-reader-text">
                            <?php esc_html_e('Primary Menu', 'business-startup'); ?>
                        </span>
                        <i class="ham"></i>
                    </a>

                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => 'div',
                        'container_class' => 'menu'
                    )); ?>
                    <a href="javascript:void(0)" class="skip-link-menu-end"></a>
                </nav>
            </div>
        </div>
        <?php if(is_front_page()){ ?>
            <?php do_action('business_startup_action_banner_section'); ?>
        <?php } ?>
    </header>

    <?php if (business_startup_get_option('enable_side_panel') == 1) { ?>
        <div class="side-panel">
        <?php if (business_startup_get_option('enable_social_menu_on_side_panel') == 1) { ?>
            <div class="panel-object social-icons">
                <?php
                wp_nav_menu(
                    array('theme_location' => 'social',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'menu_id' => 'social-menu',
                        'fallback_cb' => false,
                        'menu_class' => false
                    )); ?>
            </div>
        <?php } ?>
        <?php if (business_startup_get_option('enable_contact_on_side_panel') == 1) { ?>
            <div class="panel-object icon-contact alt-bg">
                <div id="contact-reveal">
                    <i class="ion-email"></i>
                </div>
            </div>
        <?php } ?>
        </div>
    <?php } ?>

    <div class="popup-search">
        <div class="table-align">
            <a href="javascript:void(0)" class="skip-link-search-start"></a>
            <div class="table-align-cell v-align-middle">
                <?php get_search_form(); ?>
            </div>
        </div>
        <a href="javascript:void(0)" class="close-popup-1"></a>
        <a href="javascript:void(0)" class="skip-link-search-end"></a>
    </div>

    <div class="popup-contact">
        <div class="table-align">
            <div class="table-align-cell v-align-middle">
                <div class="wrapper">
                    <div class="col-row">
                        <div class="col col-half hidden-mobile">
                            <div class="popup-contact-details">
                                <?php
                                $business_startup_contact_page = array();
                                $business_startup_contact_page[] = absint(business_startup_get_option('select_contact_page'));
                                if (!empty($business_startup_contact_page)) {
                                    $business_startup_contact_page_args = array(
                                        'post_type' => 'page',
                                        'post__in' => $business_startup_contact_page,
                                        'orderby' => 'post__in'
                                    );
                                }
                                if (!empty($business_startup_contact_page_args)) {
                                $business_startup_contact_page_query = new WP_Query($business_startup_contact_page_args);
                                while ($business_startup_contact_page_query->have_posts()):
                                $business_startup_contact_page_query->the_post();
                                $business_startup_contact_excerpt_number = absint(business_startup_get_option('excerpt_length_contact'));
                                ?>
                                    <?php the_title(); ?>
                                    <?php if (has_excerpt()) {
                                       the_excerpt();
                                    }else{
                                        $business_startup_slider_content = business_startup_words_count($business_startup_contact_excerpt_number, get_the_content());
                                        echo esc_html($business_startup_slider_content);
                                    } ?>

                                    <?php if (business_startup_get_option('enable_social_menu_on_contact') == 1) { ?>
                                        <div class="social-icons popup-social-icons">
                                            <?php
                                            wp_nav_menu(
                                                array('theme_location' => 'social',
                                                    'link_before' => '<span>',
                                                    'link_after' => '</span>',
                                                    'menu_id' => 'social-menu',
                                                    'fallback_cb' => false,
                                                    'menu_class' => false
                                                )); ?>
                                        </div>
                                    <?php } ?>

                                <?php endwhile;
                                wp_reset_postdata();
                                } ?>
                            </div>
                        </div>
                        <div class="col col-half">
                            <div id="contact-form">
                                <?php
                                $business_startup_contact_form_code = wp_kses_post(business_startup_get_option('contact_form_shortcode'));
                                if (!empty($business_startup_contact_form_code)) {
                                    echo do_shortcode($business_startup_contact_form_code);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="close-popup-2"></div>
    </div>


    <!--    Searchbar Ends-->
    <div class="site-content-bg">
        <div id="content" class="site-content">