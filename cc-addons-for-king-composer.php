<?php
/*
Plugin Name: CC Addons For King Composer
Plugin URI: http://customwpthemes.net/wordpress-plugins
Description: Fully Customise Unique Icon Box and Carousel Addons for King Composer. 
Author: Mahammad Jan-E-Alam
Author URI: http://janealam.com/
Version: 1.1
*/
if ( ! defined( 'ABSPATH' ) ) exit;

if(!function_exists('is_plugin_active')){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

 function cc_admin_style() {
     wp_enqueue_style('cc_king_admin_css', plugin_dir_url( __FILE__ ) . 'assets/css/admin.css' );    
 }
 add_action( 'admin_enqueue_scripts', 'cc_admin_style' );

function cc_king_front_styles() {
    wp_enqueue_style('cc_king_styles', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
    wp_enqueue_style('cc_king_horizon_min_styles', plugin_dir_url( __FILE__ ) . 'assets/css/style.min.css' );
    wp_enqueue_style('cc_king_horizon_styles', plugin_dir_url( __FILE__ ) . 'assets/css/horizon.min.css' );
    wp_enqueue_script("jquery");
    wp_enqueue_script('cc_carousel_horizon_swiper', plugins_url('assets/js/horizon-swiper.js', __FILE__), array('jquery'), '', true); 
    wp_enqueue_script('cc_carousel_main_horizon_swiper', plugins_url('assets/js/main.js', __FILE__), array('jquery'), '', true);  
    wp_enqueue_script('jssor-slider',plugins_url('assets/js/jssor.slider.min.js', __FILE__), array('jquery'), '', true);  
   
    
}
add_action( 'wp_enqueue_scripts', 'cc_king_front_styles' );


if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
    require_once ('inc/shortcodes.php');

}

function cc_king_composer_require() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
        add_action( 'admin_notices', 'cc_king_composer_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

}
add_action( 'admin_init', 'cc_king_composer_require' );

function cc_king_composer_notice(){
    ?><div class="error"><p>Error! you need to install or activate the <a href="https://wordpress.org/plugins/kingcomposer/">King Composer</a> plugin to run this plugin.</p></div><?php
}
?>