<?php 
/*
Plugin Name: SM Google+ Plugins
Plugin URI: 
Author: Mahabubur Rahman
Author URI: http://mahabub.me/
Description: The Google+ Plugins is a wordpress widget plugin. It lets you easily embed and promote any Google Plus Page or User profile follow button or Badge on your website. Just like on Google Plus, your visitors can follow the Page or user without leaving your site.
Version: 1.0.0
*/

define( 'SM_GOOGLEPLUS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

include_once( SM_GOOGLEPLUS_PLUGIN_PATH . 'includes/sm_google_plus_follow_button.php' );



// Register and load the widget
function sm_google_plus_load_widget() {
	register_widget( 'sm_google_plus_follow_button');
}
add_action( 'widgets_init', 'sm_google_plus_load_widget' );

