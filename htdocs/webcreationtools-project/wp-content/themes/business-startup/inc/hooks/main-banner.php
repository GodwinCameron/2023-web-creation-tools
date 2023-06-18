<?php
if (!function_exists('business_startup_banner_section')) :
    /**
     * Tab callback Details
     *
     * @since business_startup 1.0.0
     *
     */
    function business_startup_banner_section()
    {
        $business_startup_banner_button_enable = business_startup_get_option('show_page_link_button');
        $business_startup_banner_button_text = business_startup_get_option('banner_additional_button_text');
        $business_startup_banner_button_url = business_startup_get_option('additional_button_link');
        $business_startup_banner_excerpt_number = absint(business_startup_get_option('number_of_banner_content'));
        $business_startup_banner_page = array();
        $business_startup_banner_page[] = esc_attr(business_startup_get_option('select_banner_page')); ?>

        <?php if (!empty($business_startup_banner_page)) {
            $business_startup_banner_page_args = array(
                'post_type' => 'page',
                'post__in' => $business_startup_banner_page,
                'orderby' => 'post__in'
            );
        }
        if (!empty($business_startup_banner_page_args)) {
            $business_startup_banner_page_query = new WP_Query($business_startup_banner_page_args);
            while ($business_startup_banner_page_query->have_posts()): $business_startup_banner_page_query->the_post();
                if (has_excerpt()) {
                    $business_startup_banner_main_content = get_the_excerpt();
                } else {
                    $business_startup_banner_main_content = business_startup_words_count($business_startup_banner_excerpt_number , get_the_content());
                }
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                $url = $thumb['0'];
                ?>
                <div class="custom-header">
                    <div class="custom-header-media">
                        <?php the_custom_header_markup(); ?>
                    </div>
                    <div class="custom-header-content">
                        <div class="custom-header-details">
                            <h2 class="entry-title entry-title-large">
                                <?php the_title(); ?>
                            </h2>
                            <div class="custom-header-excerpt hidden-mobile">
                                <?php echo esc_html($business_startup_banner_main_content); ?>
                            </div>
                            <div class="cta-btns-group">
                                <?php if (!empty($business_startup_banner_button_text)) { ?>
                                    <a href="<?php echo esc_url($business_startup_banner_button_url ); ?>" class="btn btn-primary"><?php echo esc_html($business_startup_banner_button_text); ?></a>
                                <?php } ?>
                                <?php if ($business_startup_banner_button_enable == 1) { ?>
                                    <a href="<?php the_permalink();?>" class="btn btn-primary"><?php _e( 'View More', 'business-startup' ); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_postdata();
        } ?>
        <?php
    }
endif;
add_action('business_startup_action_banner_section', 'business_startup_banner_section', 10);