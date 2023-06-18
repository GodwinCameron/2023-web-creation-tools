<?php
/**
 * Theme widgets.
 *
 * @package Business Startup
 */

// Load widget base.
require_once get_template_directory() . '/inc/widgets/widget-base-class.php';

if (!function_exists('business_startup_load_widgets')) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function business_startup_load_widgets()
    {
        // Business_Startup_Service_widget.
        register_widget('Business_Startup_Service_widget');

        // Business_Startup_Intro_widget.
        register_widget('Business_Startup_Intro_widget');

        // Business_Startup_Call_To_Action_widget.
        register_widget('Business_Startup_Call_To_Action_widget');

        // Business_Startup_Testimonial.
        register_widget('Business_Startup_Testimonial');

        // Business_Startup_Blog_Widget widget.
        register_widget('Business_Startup_Blog_Widget');

        // Business_Startup_Client_Widget widget.
        register_widget('Business_Startup_Client_Widget');

        // Recent Post widget.
        register_widget('Business_Startup_sidebar_widget');

        // Auther widget.
        register_widget('Business_Startup_Author_Post_widget');

        // Social widget.
        register_widget('Business_Startup_Social_widget');

        // Business_startup_Portfolio.
        register_widget('Business_startup_Portfolio');

        // Business_startup_Contact.
        register_widget('Business_startup_Contact');

    }
endif;
add_action('widgets_init', 'business_startup_load_widgets');


/*Business_Startup_Service_widget widget*/
if (!class_exists('Business_Startup_Service_widget')) :

    /**
     * Business Startup Widget
     *
     * @since 1.0.0
     */
    class Business_Startup_Service_widget extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_service_widget',
                'description' => __('Displays post form selected pages as service page', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'business-startup'),
                    'type'  => 'text',
                    'class' => 'widefat',
                ),
                'image_url' => array(
                    'label' => esc_html__('Section Featured Image:', 'business-startup'),
                    'type' => 'image',
                ),
                'image_side' => array(
                    'label'   => __( 'Move Image to Right', 'business-startup' ),
                    'type'    => 'checkbox',
                    'default' => true,
                ),
                'excerpt_length' => array(
                    'label' => __('Excerpt Length:', 'business-startup'),
                    'description' => __('Number of words', 'business-startup'),
                    'type' => 'number',
                    'css' => 'max-width:60px;',
                    'default' => 20,
                    'min' => 0,
                    'max' => 200,
                ),
                'enable_featured_image' => array(
                    'label'   => __( 'Switch to Feature Image', 'business-startup' ),
                    'description' => __('Font Icon will be replaced by featured image of particular pages', 'business-startup'),
                    'type'    => 'checkbox',
                    'default' => false,
                ),
                'service_page_1' => array(
                    'label'            => __( 'Select Page 1:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'service_icon_1' => array(
                    'label' => __('Service Icon 1:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
                'service_page_2' => array(
                    'label'            => __( 'Select Page 2:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'service_icon_2' => array(
                    'label' => __('Service Icon 2:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
                'service_page_3' => array(
                    'label'            => __( 'Select Page 3:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'service_icon_3' => array(
                    'label' => __('Service Icon 3:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
                'service_page_4' => array(
                    'label'            => __( 'Select Page 4:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'service_icon_4' => array(
                    'label' => __('Service Icon 4:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
            );

            parent::__construct('business-startup-service-layout', __('BS :- Service Widget', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];
            ?>

            <div class="widget-block widget-feature widget-bg widget-bg-2">
                <?php $bs_service_class = "col-full";?>
                
                <?php if ( true === $params['image_side'] ) {
                    $bs_image_side = 'align-wrapper-rtl';
                }
                else {
                    $bs_image_side = 'align-wrapper-ltr';
                } ?>
                <div class="align-wrapper <?php echo esc_attr($bs_image_side); ?>">
                    <?php if (!empty($params['image_url'])) { ?>
                        <div class="col col-four col-sm-full" data-mh="feature-group">
                            <div data-mh="feature-group" class="feature-featured data-bg" data-background="<?php echo esc_url($params['image_url']); ?>" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0"></div>
                        </div>
                    <?php } ?>
                    <div class="col col-six col-sm-full" data-mh="feature-group">
                        <div class="col-row">
                            <?php if (!empty($params['title'])) { ?>
                                <div class="feature-grid-title">
                                    <div class="col col-full">
                                        <h2 class="widget-title widget-title-medium widget-title-1 widget-title-2">
                                            <?php echo esc_html( $params['title'] ); ?>
                                        </h2>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="feature-grid">
                                <?php
                                // ID validation.
                                $service_page_ids = '';
                                for ($i=1; $i <= 4 ; $i++) {
                                    if ( absint( $params['service_page_'.$i] ) > 0 ) {
                                        $service_page_ids = absint( $params['service_page_'.$i] );
                                    }
                                    if ( absint( $service_page_ids ) > 0 ) {
                                        $qargs = array(
                                            'p'             => absint( $service_page_ids ),
                                            'post_type'     => 'any',
                                            'no_found_rows' => true,
                                        );

                                        $the_query = new WP_Query( $qargs );
                                        if ( $the_query->have_posts() ) {
                                            while ( $the_query->have_posts() ) {
                                                $the_query->the_post();
                                                ?>
                                                <div class="col col-half">
                                                    <div class="feature-block">
                                                        <?php if ( true === $params['enable_featured_image'] ) { ?>
                                                            <?php if (has_post_thumbnail()) {
                                                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                                                                $url   = $thumb['0']; ?>
                                                                <div class="feature-icon">
                                                                    <img src="<?php echo esc_url($url);?>">
                                                                </div>
                                                            <?php } ?>
                                                        <?php }
                                                        else { ?>
                                                            <div class="feature-icon">
                                                                <i class="twp-design-icon <?php echo esc_attr($params['service_icon_'.$i]); ?>"></i>
                                                            </div>
                                                        <?php } ?>

                                                        <div class="feature-details">
                                                            <h3 class="block-title">
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </h3>
                                                            <p>
                                                                <?php if (absint($params['excerpt_length']) > 0) : ?>
                                                                    <?php
                                                                    $excerpt = business_startup_words_count(absint($params['excerpt_length']), get_the_content());
                                                                    echo wp_kses_post($excerpt);
                                                                    ?>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            $service_page_ids = '';
                                            wp_reset_postdata();
                                        }
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;

/*Business_Startup_Intro_widget widget*/
if (!class_exists('Business_Startup_Intro_widget')) :

    /**
     * Business Startup Widget
     *
     * @since 1.0.0
     */
    class Business_Startup_Intro_widget extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_intro_widget',
                'description' => __('Displays post form selected pages as intro page', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'business-startup'),
                    'type'  => 'text',
                    'class' => 'widefat',
                ),
                'image_url' => array(
                    'label' => esc_html__('Section Background Image:', 'business-startup'),
                    'type' => 'image',
                ),
                'excerpt_length' => array(
                    'label' => __('Excerpt Length:', 'business-startup'),
                    'description' => __('Number of words', 'business-startup'),
                    'type' => 'number',
                    'css' => 'max-width:60px;',
                    'default' => 20,
                    'min' => 0,
                    'max' => 200,
                ),
                'enable_featured_image' => array(
                    'label'   => __( 'Switch to Feature Image', 'business-startup' ),
                    'description' => __('Font Icon will be replaced by featured image of particular pages', 'business-startup'),
                    'type'    => 'checkbox',
                    'default' => false,
                ),
                'intro_page_1' => array(
                    'label'            => __( 'Select Page 1:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'intro_icon_1' => array(
                    'label' => __('Intro Icon 1:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
                'intro_page_2' => array(
                    'label'            => __( 'Select Page 2:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'intro_icon_2' => array(
                    'label' => __('Intro Icon 2:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
                'intro_page_3' => array(
                    'label'            => __( 'Select Page 3:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'intro_icon_3' => array(
                    'label' => __('Intro Icon 3:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
                'intro_page_4' => array(
                    'label'            => __( 'Select Page 4:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'intro_icon_4' => array(
                    'label' => __('Intro Icon 4:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
                'intro_page_5' => array(
                    'label'            => __( 'Select Page 5:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'intro_icon_5' => array(
                    'label' => __('Intro Icon 5:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
                'intro_page_6' => array(
                    'label'            => __( 'Select Page 6:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'intro_icon_6' => array(
                    'label' => __('Intro Icon 6:', 'business-startup'),
                    'description' => __('please get icon form https://ionicons.com/v2/cheatsheet.html', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => 'ion-images',
                ),
            );

            parent::__construct('business-startup-intro-layout', __('BS :- Intro Widget', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];
            ?>


            <div class="widget-block widget-intro widget-data-bg data-bg" data-background="<?php echo esc_url($params['image_url']); ?>" data-stellar-background-ratio="0.5">
                <div class="widget-content">
                    <div class="wrapper">
                        <div class="col-row">
                            <div class="col col-full">
                                <h2 class="entry-title widget-title widget-title-medium">
                                    <?php echo esc_html( $params['title'] ); ?>
                                </h2>
                                <div class="divider v-divider"></div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper">
                        <div class="col-row">

                            <?php
                            // ID validation.
                            $intro_page_ids = '';
                            for ($i=1; $i <= 6 ; $i++) {
                                if ( absint( $params['intro_page_'.$i] ) > 0 ) {
                                    $intro_page_ids = absint( $params['intro_page_'.$i] );
                                }
                                if ( absint( $intro_page_ids ) > 0 ) {
                                    $qargs = array(
                                        'p'             => absint( $intro_page_ids ),
                                        'post_type'     => 'any',
                                        'no_found_rows' => true,
                                    );

                                    $the_query = new WP_Query( $qargs );
                                    if ( $the_query->have_posts() ) {
                                        while ( $the_query->have_posts() ) {
                                            $the_query->the_post();
                                            ?>

                                            <div class="col col-three col-sm-full">
                                                <div class="feature-block">
                                                    <?php if ( true === $params['enable_featured_image'] ) { ?>
                                                        <?php if (has_post_thumbnail()) {
                                                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                                                            $url   = $thumb['0']; ?>
                                                            <div class="feature-icon">
                                                                <img src="<?php echo esc_url($url);?>">
                                                            </div>
                                                        <?php } ?>
                                                    <?php }
                                                    else { ?>
                                                        <div class="feature-icon">
                                                            <i class="twp-design-icon <?php echo esc_attr($params['intro_icon_'.$i]); ?>"></i>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="feature-details">
                                                        <h3 class="block-title">
                                                            <?php the_title(); ?>
                                                        </h3>
                                                        <p>
                                                            <?php if (absint($params['excerpt_length']) > 0) : ?>
                                                                <?php
                                                                $excerpt = business_startup_words_count(absint($params['excerpt_length']), get_the_content());
                                                                echo wp_kses_post($excerpt);
                                                                ?>
                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                            }
                                            $intro_page_ids = '';
                                            wp_reset_postdata();
                                        }
                                    }
                                } ?>

                        </div>
                    </div>
                </div>
            </div>

            <?php echo $args['after_widget'];
        }
    }
endif;


/*Business_Startup_Testimonial widget*/
if (!class_exists('Business_Startup_Testimonial')) :

    /**
     * Business Startup Widget
     *
     * @since 1.0.0
     */
    class Business_Startup_Testimonial extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_testimonial_widget',
                'description' => __('Displays page as testimonial form selected pages', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'business-startup'),
                    'default' => __('Testimonial', 'business-startup'),
                    'type'  => 'text',
                    'class' => 'widefat',
                ),
                'excerpt_length' => array(
                    'label' => __('Excerpt Length:', 'business-startup'),
                    'description' => __('Number of words', 'business-startup'),
                    'type' => 'number',
                    'css' => 'max-width:60px;',
                    'default' => 30,
                    'min' => 0,
                    'max' => 200,
                ),
                'testimonial_page_1' => array(
                    'label'            => __( 'Select Page 1:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'testimonial_page_2' => array(
                    'label'            => __( 'Select Page 2:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'testimonial_page_3' => array(
                    'label'            => __( 'Select Page 3:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'testimonial_page_4' => array(
                    'label'            => __( 'Select Page 4:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'testimonial_page_5' => array(
                    'label'            => __( 'Select Page 5:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
                'testimonial_page_6' => array(
                    'label'            => __( 'Select Page 6:', 'business-startup' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'business-startup' ),
                ),
            );

            parent::__construct('business-startup-testimonial-widget', __("BS :- Testimonial Widget", 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];
            ?>
            <div class="widget-block widget-testmonial widget-bg widget-bg-1">
                <div class="marquee-heading">
                    <div class="marquee">
                        <?php echo esc_html($params['title']) ?><span><?php echo esc_html($params['title']) ?></span><?php echo esc_html($params['title']) ?>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="col-row">
                        <div class="col col-full">
                            <div class="testmonial-slider">
                                <?php
                                // ID validation.
                                $testimonial_page_ids = '';
                                for ($i=1; $i <= 6 ; $i++) {
                                    if ( absint( $params['testimonial_page_'.$i] ) > 0 ) {
                                        $testimonial_page_ids = absint( $params['testimonial_page_'.$i] );
                                    }
                                    if ( absint( $testimonial_page_ids ) > 0 ) {
                                        $qargs = array(
                                            'p'             => absint( $testimonial_page_ids ),
                                            'post_type'     => 'any',
                                            'no_found_rows' => true,
                                        );

                                        $the_query = new WP_Query( $qargs );
                                        if ( $the_query->have_posts() ) {
                                            while ( $the_query->have_posts() ) {
                                                $the_query->the_post(); ?>
                                                <div class="testmonial-item">
                                                    <div class="testimonial-block">
                                                        <div class="inner-box">
                                                            <div class="text">
                                                                <?php if (absint($params['excerpt_length']) > 0) : ?>
                                                                    <?php
                                                                    $excerpt = business_startup_words_count(absint($params['excerpt_length']), get_the_content());
                                                                    echo wp_kses_post(wpautop($excerpt));
                                                                    ?>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="info">
                                                                <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                                                                <?php if (has_post_thumbnail()) {
                                                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
                                                                    $url   = $thumb['0']; ?>
                                                                    <div class="info-avatar">
                                                                        <img src="<?php echo esc_url($url);?>">
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php 
                                        }
                                        $testimonial_page_ids = '';
                                        wp_reset_postdata();
                                    }
                                }
                            } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;


/*Business_Startup_Call_To_Action_widget widget*/
if (!class_exists('Business_Startup_Call_To_Action_widget')) :

    /**
     * Business Startup Widget
     *
     * @since 1.0.0
     */
    class Business_Startup_Call_To_Action_widget extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_call_to_action_widget',
                'description' => __('Displays call-to-action section on the basis of information listed here', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'image_urls' => array(
                    'label' => __('Background Image:', 'business-startup'),
                    'type'  => 'image',
                ),
                'button_text' => array(
                    'label' => __('Button Text:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'button_url' => array(
                    'label' => __('Button URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
            );

            parent::__construct('business-startup-call-to-action-widget', __('BS :- Call To Action Widget', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];
            if (! empty( $params['image_urls'] )) {
                $image_url = esc_url( $params['image_urls'] );
            } else{
                $image_url = '';
            }
            ?>

            <div class="widget-block widget-cta widget-data-bg data-bg" data-background="<?php echo esc_url( $params['image_urls'] ) ?>" data-stellar-background-ratio="0.5">
                <div class="wrapper">
                    <div class="col-row">
                        <div class="col col-seven">
                            <div class="cta-wrapper">
                                <?php if ( ! empty( $params['title'] ) ) { ?>
                                    <h2 class="widget-title widget-title-medium widget-title-1 widget-title-2">
                                        <?php echo $params['title']; ?>
                                    </h2>
                                <?php } ?>
                            </div>
                            <div class="cta-wrapper">
                                <?php if (( ! empty( $params['button_url'] ) ) || ( ! empty( $params['button_text'] ) )) { ?>
                                    <div class="cta-btns-group">
                                        <a href="<?php echo esc_url($params['button_url']); ?>" class="btn btn-primary"><?php echo esc_html($params['button_text'] );?></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="col-row">
                        <div class="col col-three">

                        </div>
                    </div>
                </div>
            </div>

            <?php echo $args['after_widget'];
        }
    }
endif;


/*Business_Startup_Blog_Widget widget*/
if (!class_exists('Business_Startup_Blog_Widget')) :

    /**
     * Business Startup Widget
     *
     * @since 1.0.0
     */
    class Business_Startup_Blog_Widget extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_blog_widgets',
                'description' => __('Displays post form selected category As Blog Post', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'short_description' => array(
                    'label' => __('Short Description:', 'business-startup'),
                    'type'  => 'text',
                    'class' => 'widget-content widefat'
                ),
                'post_category' => array(
                    'label' => __('Select Category:', 'business-startup'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => __('All Categories', 'business-startup'),
                ),
                'post_number' => array(
                    'label' => __('Number of Posts:', 'business-startup'),
                    'type' => 'number',
                    'default' => 3,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 12,
                ),
                'excerpt_length' => array(
                    'label' => __('Excerpt Length:', 'business-startup'),
                    'description' => __('Number of words', 'business-startup'),
                    'type' => 'number',
                    'css' => 'max-width:60px;',
                    'default' => 20,
                    'min' => 0,
                    'max' => 200,
                ),
            );

            parent::__construct('business-startup-blog-layout', __('BS :- Blog Widget', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            $qargs = array(
                'posts_per_page' => esc_attr($params['post_number']),
                'no_found_rows' => true,
            );
            if (absint($params['post_category']) > 0) {
                $qargs['category'] = absint($params['post_category']);
            }
            global $post;
            $all_posts = get_posts($qargs);
            ?>
            <?php  if (!empty($params['short_description'])) { 
                $marquee_class = 'marquee-heading-behind';
            } else {
                $marquee_class = 'marquee-heading-nul';
            } ?>
            <?php if (!empty($all_posts)) : ?>
            <div class="widget-block widget-blog">
                <div class="marquee-heading <?php echo esc_html($marquee_class); ?>">
                    <div class="marquee"><?php echo esc_html($params['title']) ?><span><?php echo esc_html($params['title']) ?></span><?php echo esc_html($params['title']) ?></div>
                </div>
                <?php  if (!empty($params['short_description'])) { ?>
                <div class="wrapper">
                    <div class="col-row">
                        <div class="col col-full">
                            <h2 class="entry-title widget-title">
                               <?php echo esc_html($params['short_description']) ?>
                            </h2>
                            <div class="divider v-divider"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
                <div class="wrapper-fluid">
                    <?php foreach ($all_posts as $key => $post) : ?>
                        <?php setup_postdata($post); ?>
                            <div class="col col-three col-sm-full">
                               <div class="blog-wrapper">
                                <?php if (has_post_thumbnail()) {
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                    $url   = $thumb['0']; ?>
                                   <div class="blog-image bg-image">
                                        <img src="<?php echo esc_url($url);?>">
                                   </div>
                                    <?php } ?>
                                   <div class="blog-image-overlay"></div>
                                   <div class="blog-details">
                                        <header class="article-header">
                                           <div class="entry-meta">
                                                <span class="post-category">
                                                    <?php business_startup_entry_category(); ?>
                                                </span>
                                           </div>

                                           <h2 class="entry-title entry-title-medium">
                                               <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
                                           </h2>

                                            <div class="entry-meta">
                                               <span class="posted-on">
                                                   <?php business_startup_posted_date_only(); ?>
                                               </span>
                                               <span class="author"> 
                                                <?php business_startup_posted_by(); ?>
                                               </span>                                            
                                            </div><!-- .entry-meta -->
                                       </header>
                                   </div>
                               </div>
                            </div>
                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>
            <?php echo $args['after_widget'];
        }
    }
endif;


/*Business_Startup_Client_Widget widget*/
if (!class_exists('Business_Startup_Client_Widget')) :

    /**
     * Business Startup Widget
     *
     * @since 1.0.0
     */
    class Business_Startup_Client_Widget extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_client_widgets',
                'description' => __('Displays post form selected category As Client Post', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category' => array(
                    'label' => __('Select Category For Client:', 'business-startup'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => __('All Categories', 'business-startup'),
                ),
                'short_description' => array(
                    'label' => __('Short Description:', 'business-startup'),
                    'type'  => 'text',
                    'class' => 'widget-content widefat'
                ),
                'post_number' => array(
                    'label' => __('Number of Clients:', 'business-startup'),
                    'type' => 'number',
                    'default' => 6,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 12,
                ),
            );

            parent::__construct('business-startup-client-layout', __('BS :- Client Widget', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            $qargs = array(
                'posts_per_page' => esc_attr($params['post_number']),
                'no_found_rows' => true,
            );
            if (absint($params['post_category']) > 0) {
                $qargs['category'] = absint($params['post_category']);
            }
            global $post;
            $all_posts = get_posts($qargs);
            ?>
            <?php if (!empty($all_posts)) : ?>
            <?php  if (!empty($params['short_description'])) { 
                $marquee_class = 'marquee-heading-behind';
            } else {
                $marquee_class = 'marquee-heading-nul';
            } ?>
            <div class="widget-block widget-clients">
                 <div class="wrapper">
                    <div class="col-row">
                        <div class="col col-full">
                            <div class="marquee-heading <?php echo esc_attr($marquee_class); ?>">
                                <div class="marquee"><?php echo esc_html($params['title']) ?><span><?php echo esc_html($params['title']) ?></span><?php echo esc_html($params['title']) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  if (!empty($params['short_description'])) { ?>
                    <div class="wrapper">
                        <div class="col-row">
                            <div class="col col-full">
                                <h2 class="entry-title widget-title">
                                    <?php echo esc_html($params['short_description']) ?>
                                </h2>
                                <div class="divider v-divider"></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="wrapper">
                    <div class="col-row">
                        <?php foreach ($all_posts as $key => $post) : ?>
                            <?php setup_postdata($post); ?>
                            <div class="col col-6-6">
                                <div class="clients-logo">
                                    <?php if (has_post_thumbnail()) {
                                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                                        $url   = $thumb['0']; ?>
                                       <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url($url);?>">
                                       </a>
                                        <?php } ?>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>
            <?php echo $args['after_widget'];
        }
    }
endif;

/*Panel widget*/
if (!class_exists('Business_Startup_sidebar_widget')) :

    /**
     * Popular widget Class.
     *
     * @since 1.0.0
     */
    class Business_Startup_sidebar_widget extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_popular_post_widget',
                'description' => esc_html__('Displays post form selected category specific for popular post in sidebars.', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category' => array(
                    'label' => esc_html__('Select Category:', 'business-startup'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'business-startup'),
                ),
                'post_number' => array(
                    'label' => esc_html__('Number of Posts:', 'business-startup'),
                    'type' => 'number',
                    'default' => 4,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 10,
                ),
            );

            parent::__construct('business-startup-popular-sidebar-layout', esc_html__('BS :- Recent Post', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            if (!empty($params['title'])) {
                echo $args['before_title'] . esc_html( $params['title'] ) . $args['after_title'];
            }

            $qargs = array(
                'posts_per_page' => esc_attr($params['post_number']),
                'no_found_rows' => true,
            );
            if (absint($params['post_category']) > 0) {
                $qargs['category'] = absint($params['post_category']);
            }
            $all_posts = get_posts($qargs);
            ?>
            <?php global $post;
            $count = 1;
            ?>
            <?php if (!empty($all_posts)) : ?>
            <div class="twp-recent-widget">
                <ul class="recent-widget-list">
                    <?php foreach ($all_posts as $key => $post) : ?>
                        <?php setup_postdata($post); ?>
                        <li>
                            <article class="article-list">
                                <div class="article-image">
                                    <?php if (has_post_thumbnail()) {
                                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'business-startup-related-post');
                                        $url = $thumb['0']; ?>
                                        <a href="<?php the_permalink(); ?>" class="bg-image bg-image-1">
                                            <img src="<?php echo esc_url($url); ?>" alt="<?php the_title_attribute(); ?>">
                                        </a>
                                    <?php } ?>
                                    <div class="trend-item">
                                        <span class="number"> <?php echo $count; ?></span>
                                    </div>
                                </div>
                                <div class="article-body">
                                    <div class="entry-meta">
                                        <span class="posted-on">
                                            <?php echo esc_attr(get_post_time('j M Y')); ?>
                                        </span>
                                    </div>
                                    <h4 class="entry-title entry-title-small primary-font">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                </div>
                            </article>
                        </li>
                        <?php
                        $count++;
                    endforeach; ?>
                </ul>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>
            <?php echo $args['after_widget'];
        }
    }
endif;

/*author widget*/
if (!class_exists('Business_Startup_Author_Post_widget')) :

    /**
     * Author widget Class.
     *
     * @since 1.0.0
     */
    class Business_Startup_Author_Post_widget extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_author_widget',
                'description' => esc_html__('Displays authors details in post.', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'author-name' => array(
                    'label' => esc_html__('Name:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'description' => array(
                    'label' => esc_html__('Description:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widget-content widefat'
                ),
                'image_url' => array(
                    'label' => esc_html__('Author Image:', 'business-startup'),
                    'type' => 'image',
                ),
                'url-fb' => array(
                    'label' => esc_html__('Facebook URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-tw' => array(
                    'label' => esc_html__('Twitter URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-gp' => array(
                    'label' => esc_html__('Googleplus URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-ins' => array(
                    'label' => esc_html__('Instagram URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-pin' => array(
                    'label' => esc_html__('Pinterest URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
            );

            parent::__construct('business-startup-author-layout', esc_html__('BS :- Author Widget', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            if (!empty($params['title'])) {
                echo $args['before_title'] . esc_html( $params['title'] ) . $args['after_title'];
            } ?>

            <!--cut from here-->
            <div class="author-info">
                <div class="author-image">
                    <?php if (!empty($params['image_url'])) { ?>
                        <div class="profile-image bg-image" >
                            <img src="<?php echo esc_url($params['image_url']); ?>">
                        </div>
                    <?php } ?>
                </div> <!-- /#author-image -->
                <div class="author-social">
                    <?php if (!empty($params['url-fb'])) { ?>
                            <a href="<?php echo esc_url($params['url-fb']); ?>" target="_blank">
                                <i class="social-icon ion-social-facebook"></i>
                            </a>
                    <?php } ?>
                    <?php if (!empty($params['url-tw'])) { ?>
                            <a href="<?php echo esc_url($params['url-tw']); ?>" target="_blank">
                                <i class="social-icon ion-social-twitter"></i>
                            </a>
                    <?php } ?>
                    <?php if (!empty($params['url-gp'])) { ?>
                            <a href="<?php echo esc_url($params['url-gp']); ?>" target="_blank">
                                <i class="social-icon ion-social-googleplus"></i>
                            </a>
                    <?php } ?>
                    <?php if (!empty($params['url-ins'])) { ?>
                            <a href="<?php echo esc_url($params['url-ins']); ?>" target="_blank">
                                <i class="social-icon ion-social-instagram"></i>
                            </a>
                    <?php } ?>
                    <?php if (!empty($params['url-pin'])) { ?>
                            <a href="<?php echo esc_url($params['url-pin']); ?>" target="_blank">
                                <i class="social-icon ion-social-pinterest"></i>
                            </a>
                    <?php } ?>
                </div><!-- /#author-social -->
                <div class="author-details">
                    <?php if (!empty($params['author-name'])) { ?>
                        <h3 class="author-name primary-font"><?php echo esc_html($params['author-name']); ?></h3>
                    <?php } ?>
                    <?php if (!empty($params['description'])) { ?>
                        <p><?php echo wp_kses_post($params['description']); ?></p>
                    <?php } ?>
                </div> <!-- /#author-details -->
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;

/*Social widget*/
if (!class_exists('Business_Startup_Social_widget')) :

    /**
     * Social widget Class.
     *
     * @since 1.0.0
     */
    class Business_Startup_Social_widget extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_social_widget',
                'description' => esc_html__('Displays Social share.', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'url-fb' => array(
                    'label' => esc_html__('Facebook URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-tw' => array(
                    'label' => esc_html__('Twitter URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-gp' => array(
                    'label' => esc_html__('Googleplus URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-lt' => array(
                    'label' => esc_html__('Linkedin URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-ig' => array(
                    'label' => esc_html__('Instagram URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-pt' => array(
                    'label' => esc_html__('Pinterest URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-rt' => array(
                    'label' => esc_html__('Reddit URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-sk' => array(
                    'label' => esc_html__('Skype URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-sc' => array(
                    'label' => esc_html__('Snapchat URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-tr' => array(
                    'label' => esc_html__('Tumblr URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-th' => array(
                    'label' => esc_html__('Twitch URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-yt' => array(
                    'label' => esc_html__('Youtube URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-vo' => array(
                    'label' => esc_html__('Vimeo URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-wa' => array(
                    'label' => esc_html__('Whatsapp URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-wp' => array(
                    'label' => esc_html__('WordPress URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-gh' => array(
                    'label' => esc_html__('Github URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-fs' => array(
                    'label' => esc_html__('FourSquare URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'url-db' => array(
                    'label' => esc_html__('Dribbble URL:', 'business-startup'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
            );

            parent::__construct('business-startup-social-layout', esc_html__('BS :- Social Widget', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            if (!empty($params['title'])) {
                echo $args['before_title'] . esc_html( $params['title'] ) . $args['after_title'];
            } ?>

            <div class="twp-social-widget">
                <ul class="social-widget-wrapper">
                    <?php if (!empty($params['url-fb'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-fb']); ?>" target="_blank">
                                <i class="social-icon ion-social-facebook"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-tw'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-tw']); ?>" target="_blank">
                                <i class="social-icon ion-social-twitter"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-gp'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-gp']); ?>" target="_blank">
                                <i class="social-icon ion-social-googleplus"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-lt'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-lt']); ?>" target="_blank">
                                <i class="social-icon ion-social-linkedin"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-ig'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-ig']); ?>" target="_blank">
                                <i class="social-icon ion-social-instagram"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-pt'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-pt']); ?>" target="_blank">
                                <i class="social-icon ion-social-pinterest"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-rt'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-rt']); ?>" target="_blank">
                                <i class="social-icon ion-social-reddit"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-sk'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-sk']); ?>" target="_blank">
                                <i class="social-icon ion-social-skype"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-sc'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-sc']); ?>" target="_blank">
                                <i class="social-icon ion-social-snapchat"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-tr'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-tr']); ?>" target="_blank">
                                <i class="social-icon ion-social-tumblr"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-th'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-th']); ?>" target="_blank">
                                <i class="social-icon ion-social-twitch"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-yt'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-yt']); ?>" target="_blank">
                                <i class="social-icon ion-social-youtube"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-vo'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-vo']); ?>" target="_blank">
                                <i class="social-icon ion-social-vimeo"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-wa'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-wa']); ?>" target="_blank">
                                <i class="social-icon ion-social-whatsapp"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-wp'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-wp']); ?>" target="_blank">
                                <i class="social-icon ion-social-wordpress"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-gh'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-gh']); ?>" target="_blank">
                                <i class="social-icon ion-social-github"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-fs'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-fs']); ?>" target="_blank">
                                <i class="social-icon ion-social-foursquare"></i>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($params['url-db'])) { ?>
                        <li>
                            <a href="<?php echo esc_url($params['url-db']); ?>" target="_blank">
                                <i class="social-icon ion-social-dribbble"></i>
                            </a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;

/*Business_startup_Portfolio widget*/
if (!class_exists('Business_startup_Portfolio')) :

    /**
     * Business_Startup Widget
     *
     * @since 1.0.0
     */
    class Business_startup_Portfolio extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_portfolio_widgets',
                'description' => __('Displays post form selected category As Project', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'description' => array(
                    'label' => esc_html__('Description:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widget-content widefat'
                ),
                'post_category_1' => array(
                    'label' => __('Select Category 1:', 'business-startup'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => __('All Categories', 'business-startup'),
                ),
                'post_category_2' => array(
                    'label' => __('Select Category 2:', 'business-startup'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => __('All Categories', 'business-startup'),
                ),
                'post_category_3' => array(
                    'label' => __('Select Category 3:', 'business-startup'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => __('All Categories', 'business-startup'),
                ),
                'post_category_4' => array(
                    'label' => __('Select Category 4:', 'business-startup'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => __('All Categories', 'business-startup'),
                ),
                'post_category_5' => array(
                    'label' => __('Select Category 5:', 'business-startup'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => __('All Categories', 'business-startup'),
                ),
                'post_category_6' => array(
                    'label' => __('Select Category 6:', 'business-startup'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => __('All Categories', 'business-startup'),
                ),
                'post_number' => array(
                    'label' => __('Number of Posts from each:', 'business-startup'),
                    'type' => 'number',
                    'default' => 9,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 12,
                ),
            );

            parent::__construct('business-startup-portfolio-layout', __('BS :- Portfolio Widget', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            global $post;
            ?>
            <?php  if (!empty($params['description'])) { 
                $marquee_class = 'marquee-heading-behind';
            } else {
                $marquee_class = 'marquee-heading-nul';
            } ?>
            <div class="widget-block widget-portfolio">
                <div class="wrapper">
                    <div class="col-row">
                        <div class="col col-full">
                            <div class="marquee-heading <?php echo esc_attr($marquee_class); ?>">
                                <div class="marquee"><?php if (!empty($params['title'])) { echo esc_html($params['title']);}?><span><?php if (!empty($params['title'])) { echo esc_html($params['title']);}?></span><?php if (!empty($params['title'])) { echo esc_html($params['title']);}?></div>
                            </div>
                            
                            <?php if (!empty($params['description'])) { ?>
                                <h2 class="entry-title widget-title">
                                    <?php echo wp_kses_post($params['description']); ?>
                                </h2>
                                <div class="divider v-divider"></div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <?php $business_startup_portfolio_category_list_array = array();
                for ($i = 1; $i <= 6; $i++) {
                    $business_startup_portfolio_category_list = $params['post_category_' . $i];
                    if (!empty($business_startup_portfolio_category_list)) {
                        $business_startup_portfolio_category_list_array[] = absint($business_startup_portfolio_category_list);
                    }
                }
                $business_startup_portfolio_args = array();
                $business_startup_portfolio_no = $params['post_number'];
                if( !empty( $business_startup_portfolio_category_list_array) ){
                    $business_startup_portfolio_args = array(
                        'post_type' => 'post',
                        'cat' => $business_startup_portfolio_category_list_array,
                        'ignore_sticky_posts' => true,
                        'posts_per_page' => $business_startup_portfolio_no,
                    );
                } ?>
                <div class="twp-portfolio portfolio-masonry">
                    <div class="wrapper">
                        <div class="col-row">
                            <div class="col col-full">
                                <ul class="filter-group">
                                    <li><span class="filter" data-filter="*"> <?php esc_html_e('show all','business-startup') ?></span></li>
                                    <?php for ($j=0; $j < count($business_startup_portfolio_category_list_array) ; $j++) {
                                        $business_startup_category = get_cat_name( $business_startup_portfolio_category_list_array[$j]);
                                        $business_startup_category_id = get_cat_id($business_startup_category);
                                        if (!empty($business_startup_category)) { ?>
                                            <li><span class="filter" data-filter=".<?php echo esc_attr('cat-'.$business_startup_category_id)?>"><?php echo esc_html( $business_startup_category, 'business-startup' )?></span></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>

                            <div class="col col-full">
                                <div id="portfolio-grid" class="masonry">
                                    <?php
                                    $business_startup_portfolio_post_query = new WP_Query($business_startup_portfolio_args);
                                    if ($business_startup_portfolio_post_query->have_posts()) :
                                        while ($business_startup_portfolio_post_query->have_posts()) : $business_startup_portfolio_post_query->the_post();
                                            $business_startup_cat_id = array();
                                            if(has_post_thumbnail()){
                                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                                $url = $thumb['0'];
                                            }
                                            else{
                                                $url ='';
                                            }
                                            $business_startup_categories = get_the_category();
                                            foreach ($business_startup_categories as $business_startup_cat) {
                                                $business_startup_cat_id[] = $business_startup_cat->term_id;
                                            }
                                            $cat_ids = implode(' cat-',$business_startup_cat_id);
                                            $business_startup_single_cat_name = get_cat_name( $cat_ids);
                                            ?>
                                                <div class="portfolio-masonry-entry masonry-item cat-<?php echo esc_attr($cat_ids); ?>">
                                                    <div class="portfolio-wrapper">
                                                        <a href="<?php the_permalink(); ?>" class="img-hover">
                                                            <img src="<?php echo esc_url($url); ?>" alt="">
                                                            <div class="hover-caption">
                                                                <header class="article-header">
                                                                    <div class="entry-meta">
                                                                        <span class="post-category">
                                                                            <?php echo esc_html($business_startup_single_cat_name); ?>
                                                                        </span>
                                                                    </div>
                                                                    <h2 class="entry-title entry-title-small"><?php the_title(); ?></h2>
                                                                </header>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                        <?php
                                        endwhile;
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div> <!-- END #portfolio-grid -->
                        </div><!-- END .portfolio-masonry -->
                    </div>
                </div>
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;




/*Business_startup_Contact widget*/
if (!class_exists('Business_startup_Contact')) :

    /**
     * TBusiness_Startup Widget
     *
     * @since 1.0.0
     */
    class Business_startup_Contact extends Business_Startup_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'business_startup_Contact_widgets',
                'description' => __('Displays post form selected category As Project', 'business-startup'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'business-startup'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'description' => array(
                    'label' => __('Description:', 'business-startup'),
                    'type' => 'textarea',
                    'class' => 'widefat',
                ),

                'contact_form_shortcode' => array(
                    'label'            => __( 'Contact Form Shortcodes:', 'business-startup' ),
                    'type'             => 'text',
                    'class'            => 'widefat',
                ),
                'google_map_shortcode' => array(
                    'label'            => __( 'Google Map Shortcodes:', 'business-startup' ),
                    'description'      => __('Leave this field empty if you do not want to use mag feature','business-startup'),
                    'type'             => 'text',
                    'class'            => 'widefat',
                ),
            );

            parent::__construct('business_startup-contact-layout', __('BS :- Contact Widget', 'business-startup'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance){
            $params = $this->get_params($instance);

            echo $args['before_widget']; ?>
                <div class="widget-block widget-contact widget-bg-2">
                    <div class="wrapper">
                        <div class="col-row">
                            <div class="col col-full">
                                <div class="marquee-heading marquee-heading-behind">
                                    <div class="marquee"><?php if (!empty($params['title'])) { echo esc_html($params['title']);}?><span><?php if (!empty($params['title'])) { echo esc_html($params['title']);}?></span><?php if (!empty($params['title'])) { echo esc_html($params['title']);}?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (!empty($params['description'])) { ?>
                    <div class="wrapper">
                        <div class="col-row">
                            <div class="col col-full">
                                <h2 class="entry-title widget-title">
                                    <?php echo wp_kses_post($params['description']); ?>
                                </h2>
                                <div class="divider v-divider"></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ( ! empty( $params['contact_form_shortcode'] ) ) {?>
                        <div class="wrapper-fluid">
                            <div class="col-row">
                                <div class="col col-full">
                                    <div class="contact-form-wrapper">
                                        <?php
                                        
                                            echo do_shortcode(wp_kses_post($params['contact_form_shortcode']));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- Google Map -->
                <?php if ( ! empty( $params['google_map_shortcode'] ) ) { ?>
                    <div class="widget-block map-widget">
                        <div class="google-map">
                            <div id="map" class="map">
                                <?php
                                echo do_shortcode(wp_kses_post($params['google_map_shortcode']));
                                ?>
                            </div>
                            <div class="map-container">
                                <div class="map-toggle">
                                    <div class="map-toggle-icon">
                                        <i class="icon ion-ios-location"></i>
                                    </div>
                                    <div class="map-toggle-info font-alt">
                                        <div class="map-toggle-open">
                                            <?php _e('Open the map', 'business-startup'); ?> <i class="icon twp-icon ion-ios-arrow-down"></i>
                                        </div>
                                        <div class="map-toggle-close">
                                            <?php _e('Close the map', 'business-startup'); ?> <i class="icon twp-icon ion-ios-arrow-up"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End Google Map -->
                <?php echo $args['after_widget'];
            }
    }
endif;
