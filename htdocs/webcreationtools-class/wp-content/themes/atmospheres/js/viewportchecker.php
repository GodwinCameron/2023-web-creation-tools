<?php if( ! defined( 'ABSPATH' ) ) exit;
	
	function atmosphere_animation_classes () { ?>
	<script>
		
		jQuery("body").ready(function() {
			
			
			jQuery('.lt-left').addClass("hidden").viewportChecker({
				classToAdd: 'animated fadeInLeft',
				offset: 0  
			}); 
			
			jQuery('.lt-right').addClass("hidden").viewportChecker({
				classToAdd: 'animated fadeInRight',
				offset: 0  
			}); 	
		});
		
		<?php if ( get_theme_mod('atmosphere_animation_content','zoomIn')) { ?>
			jQuery("body").ready(function() {
				jQuery('article').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo esc_html( get_theme_mod('atmosphere_animation_content','zoomIn') ); ?>', // Class to add to the elements when they are visible
					offset: 0  
				}); 
			});  
		<?php } ?>
		
		<?php if ( get_theme_mod('atmosphere_animation_gallery')) { ?>
			jQuery("body").ready(function() {
				jQuery('#seos-gallery a, .album a').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo esc_html( get_theme_mod('atmosphere_animation_gallery') ); ?>', // Class to add to the elements when they are visible
					offset: 0  
				}); 
			});  
		<?php } ?>	
		
		<?php if ( get_theme_mod('atmosphere_animation_about')) { ?>
			
			jQuery("body").ready(function() {
				jQuery('.about-us-container, .about_us-card').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo esc_html( get_theme_mod('atmosphere_animation_about') ); ?>', // Class to add to the elements when they are visible
					offset: 0  
				}); 
			});  
		<?php } ?>
		
		<?php if ( get_theme_mod('atmosphere_animation_popular')) { ?>
			jQuery("body").ready(function() {
				jQuery('.top-popular').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo esc_html( get_theme_mod('atmosphere_animation_popular') ); ?>', // Class to add to the elements when they are visible
					offset: 0  
				}); 
			});  
		<?php } ?>	
		<?php if ( get_theme_mod('atmosphere_animation_sidebar')) { ?>
			jQuery("body").ready(function() {
				jQuery('aside section').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo esc_html( get_theme_mod('atmosphere_animation_sidebar') ); ?>', // Class to add to the elements when they are visible
					offset: 0  
				}); 
			});  
		<?php } ?>
		
		
		
		<?php if ( get_theme_mod('atmosphere_animation_footer')) { ?>
			jQuery("body").ready(function() {
				jQuery('.footer-widgets').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo esc_html( get_theme_mod('atmosphere_animation_footer') ); ?>', // Class to add to the elements when they are visible
					offset: 0  
				}); 
			});  
		<?php } ?>
		
	</script>
	<?php } 
	
	add_action('wp_footer', 'atmosphere_animation_classes');				   
	
	
