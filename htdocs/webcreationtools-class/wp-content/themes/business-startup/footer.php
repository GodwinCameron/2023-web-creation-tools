<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business Startup
 */
?>
</div>


<footer id="colophon" class="site-footer" role="contentinfo">
    <?php $business_startup_footer_widgets_number = business_startup_get_option('number_of_footer_widget');
    if (is_active_sidebar('footer-col-one') || is_active_sidebar('footer-col-two') || is_active_sidebar('footer-col-three') || is_active_sidebar('footer-col-four')) { ?>
        <div class="footer-widget">
            <div class="wrapper">
                <?php
                if (1 == $business_startup_footer_widgets_number) {
                    $col = 'col-full';
                } elseif (2 == $business_startup_footer_widgets_number) {
                    $col = 'col-half';
                } elseif (3 == $business_startup_footer_widgets_number) {
                    $col = 'col-three';
                } elseif (4 == $business_startup_footer_widgets_number) {
                    $col = 'col-quarter';
                } else {
                    $col = 'col-three';
                }
                ?>
                <div class="col-row">
                    <?php if (is_active_sidebar('footer-col-one') && $business_startup_footer_widgets_number > 0): ?>
                        <div class="col col-sm-full <?php echo $col; ?>">
                            <?php dynamic_sidebar('footer-col-one'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-col-two') && $business_startup_footer_widgets_number > 1): ?>
                        <div class="col col-sm-full <?php echo $col; ?>">
                            <?php dynamic_sidebar('footer-col-two'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-col-three') && $business_startup_footer_widgets_number > 2): ?>
                        <div class="col col-sm-full <?php echo $col; ?>">
                            <?php dynamic_sidebar('footer-col-three'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-col-four') && $business_startup_footer_widgets_number > 3): ?>
                        <div class="col col-sm-full <?php echo $col; ?>">
                            <?php dynamic_sidebar('footer-col-four'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="copyright-area">
        <div class="wrapper">
            <div class="col-row">
                <div class="col col-full">
                    <div class="site-info">
                        <h4 class="site-copyright">
                            <?php
                            $business_startup_copyright_text = wp_kses_post(business_startup_get_option('copyright_text'));
                            if (!empty($business_startup_copyright_text)) {
                                echo wp_kses_post(business_startup_get_option('copyright_text'));
                            }
                            ?>
                            <?php if ((business_startup_get_option('enable_copyright_credit')) == 1) { ?>
                                <span class="heart"> </span>
                                <?php printf(esc_html__('Theme: %1$s by %2$s', 'business-startup'), 'Business Startup', '<a href="http://themeinwp.com/" target = "_blank" rel="designer">Themeinwp </a>'); ?>
                            <?php } ?>

                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="scroll-up secondary-bgcolor">
    <i class="ion-ios-arrow-up"></i>
</div>
</div>

</div>
<?php wp_footer(); ?>
</body>
</html>