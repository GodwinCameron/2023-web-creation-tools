<?php
if ( !class_exists('Business_Startup_Dashboard_Notice') ):

    class Business_Startup_Dashboard_Notice
    {
        function __construct()
        {	
            global $pagenow;

        	if( $this->business_startup_show_hide_notice() ){

	            if( is_multisite() ){

                  add_action( 'network_admin_notices',array( $this,'business_startup_admin_notice' ) );

                } else {

                  add_action( 'admin_notices',array( $this,'business_startup_admin_notice' ) );
                }
	        }
	        add_action( 'wp_ajax_business_startup_notice_dismiss', array( $this, 'business_startup_notice_dismiss' ) );
			add_action( 'switch_theme', array( $this, 'business_startup_notice_clear_cache' ) );
        
            if( isset( $_GET['page'] ) && $_GET['page'] == 'business-startup-about' ){

                add_action('in_admin_header', array( $this,'business_startup_hide_all_admin_notice' ),1000 );

            }
        }

        public function business_startup_hide_all_admin_notice(){

            remove_all_actions('admin_notices');
            remove_all_actions('all_admin_notices');

        }
        
        public static function business_startup_show_hide_notice( $status = false ){

            if( $status ){

                if( (class_exists( 'Booster_Extension_Class' ) ) || get_option('business_startup_admin_notice') ){

                    return false;

                }else{

                    return true;

                }

            }

            // Check If current Page 
            if ( isset( $_GET['page'] ) && $_GET['page'] == 'business-startup-about'  ) {
                return false;
            }

        	// Hide if dismiss notice
        	if( get_option('business_startup_admin_notice') ){
				return false;
			}
        	// Hide if all plugin active
        	if ( class_exists( 'Booster_Extension_Class' ) && class_exists( 'Demo_Import_Kit_Class' ) && class_exists( 'Themeinwp_Import_Companion' ) ) {
				return false;
			}
			// Hide On TGMPA pages
			if ( ! empty( $_GET['tgmpa-nonce'] ) ) {
				return false;
			}
			// Hide if user can't access
        	if ( current_user_can( 'manage_options' ) ) {
				return true;
			}
			
        }

        // Define Global Value
        public static function business_startup_admin_notice(){

            ?>
           <div class="updated notice is-dismissible twp-business-startup-notice">

                <h3><?php esc_html_e('Quick Setup','business-startup'); ?></h3>

                <p><strong><?php esc_html_e('Business Startup is now installed and ready to use. Are you looking for a better experience to set up your site?','business-startup'); ?></strong></p>

                <small><?php esc_html_e("We've prepared a unique onboarding process through our",'business-startup'); ?> <a href="<?php echo esc_url( admin_url().'themes.php?page='.get_template().'-about') ?>"><?php esc_html_e('Getting started','business-startup'); ?></a> <?php esc_html_e("page. It helps you get started and configure your upcoming website with ease. Let's make it shine!",'business-startup'); ?></small>

                <p>
                    <a target="_blank" class="button button-primary button-primary-upgrade" href="<?php echo esc_url( 'https://www.themeinwp.com/theme/business-startup-pro/' ); ?>">
                        <span class="dashicons dashicons-thumbs-up"></span>
                        <span><?php esc_html_e('Upgrade to Pro','business-startup'); ?></span>
                    </a>

                    <a class="button button-primary twp-install-active" href="javascript:void(0)">
                        <span class="dashicons dashicons-admin-plugins"></span>
                        <span><?php esc_html_e('Install and activate recommended plugins','business-startup'); ?></span>
                    </a>

                    <span class="quick-loader-wrapper"><span class="quick-loader"></span></span>

                    <a target="_blank" class="button button-primary" href="<?php echo esc_url( 'https://demo.themeinwp.com/business-startup/' ); ?>">
                        <span class="dashicons dashicons-welcome-view-site"></span>
                        <span><?php esc_html_e('View Demo','business-startup'); ?></span>
                    </a>

                    <a target="_blank" class="button button-primary" href="<?php echo esc_url('https://wordpress.org/support/theme/business-startup/reviews/?filter=5'); ?>">
                        <span class="dashicons dashicons-star-filled"></span>
                        <span class="dashicons dashicons-star-filled"></span>
                        <span class="dashicons dashicons-star-filled"></span>
                        <span class="dashicons dashicons-star-filled"></span>
                        <span class="dashicons dashicons-star-filled"></span>
                        <span><?php esc_html_e('Leave a review', 'business-startup'); ?></span>
                    </a>

                    <a class="btn-dismiss twp-custom-setup" href="javascript:void(0)"><?php esc_html_e('Dismiss this notice.','business-startup'); ?></a>

                </p>

            </div>

        <?php
        }

        public function business_startup_notice_dismiss(){

        	if ( isset( $_POST[ '_wpnonce' ] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ '_wpnonce' ] ) ), 'business_startup_ajax_nonce' ) ) {

	        	update_option('business_startup_admin_notice','hide');

	        }

            die();

        }

        public function business_startup_notice_clear_cache(){

        	update_option('business_startup_admin_notice','');

        }

    }
    new Business_Startup_Dashboard_Notice();
endif;