<?php
/*
  Plugin Name: Universh Shortcodes
  Plugin URI: http://gndev.info/Universh/
  Version: 1.0
  Author: WoodTheme
  Author URI: http://themeforest.net/user/woodtheme
  Description: Supercharge your WordPress theme with mega pack of shortcodes
  Text Domain: Universh
  Domain Path: /languages
  License: GPL
 */

// Define plugin constants
define( 'WT_PLUGIN_FILE', __FILE__ );
define( 'WT_PLUGIN_VERSION', '1.0' );
define( 'WT_ENABLE_CACHE', true );

// Includes
require_once 'inc/vendor/sunrise.php';
require_once 'inc/core/admin-views.php';
require_once 'inc/core/requirements.php';
require_once 'inc/core/load.php';
require_once 'inc/core/assets.php';
require_once 'inc/core/shortcodes.php';
require_once 'inc/core/tools.php';
require_once 'inc/core/data.php';
require_once 'inc/core/generator-views.php';
require_once 'inc/core/generator.php';
require_once 'inc/core/widget.php';
//require_once 'inc/core/vote.php';
require_once 'inc/core/counters.php';
require_once 'inc/pricing/pricing-post-type.php';
require_once 'inc/news/post-type.php';
require_once 'inc/gallery/post-type.php';
require_once 'inc/teacher/post-type.php';

function gallery_rewrite_flush() {
    universh_gallery_post_type();
	universh_teachers_post_type();
	universh_pricing_post_type();
	universh_news_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'gallery_rewrite_flush' );

function universh_new_contactmethods( $universh_contactmethods ) {
	// Add Twitter
	$universh_contactmethods['twitter'] = esc_html__('Twitter', 'universh');
	//add Facebook
	$universh_contactmethods['facebook'] = esc_html__('Facebook', 'universh');
	//add LinkedIn
	$universh_contactmethods['linkedin'] = esc_html__('LinkedIn', 'universh');
	//add GooglePlus
	$universh_contactmethods['googleplus'] = esc_html__('GooglePlus', 'universh');
	 
	return $universh_contactmethods;
}
add_filter('user_contactmethods','universh_new_contactmethods',10,1);
