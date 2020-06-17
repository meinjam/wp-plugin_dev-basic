<?php
/*
Plugin Name: First Plugin
Plugin URI: https://meinjam.tk/
Description: My First WP Plugin.
Version: 0.1.0
Author: Injamamul Haque
Author URI: https://meinjam.tk/
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

define( "PLUGIN_DIR_PATH", plugin_dir_path( __FILE__ ) );
define( "PLUGIN_URL", plugins_url() );

function add_to_admin_menu() {

    add_menu_page(
        'Custom Plugin', // Page Title
        'Custom Plugin', // Menu Title
        'manage_options', // Who(Admin) can manage this
        'custom-plugin', // URL Slug
        'custom_plugin_function', // What shows in this page(Callback Function)
        'dashicons-welcome-write-blog', // Icon
        6// Menu Position
    );

    add_submenu_page(
        'custom-plugin', // Parent URL Slug
        'Add New', // Submenu Page Title
        'Add New', // Submenu Menu Title
        'manage_options', // Who(Admin) can manage this
        'custom-plugin', // Submenu URL Slug
        'custom_plugin_function', // What shows in this page(Callback Function)
    );

    add_submenu_page(
        'custom-plugin', // Parent URL Slug
        'All Pages', // Submenu Page Title
        'All Pages', // Submenu Menu Title
        'manage_options', // Who(Admin) can manage this
        'add-new', // Submenu URL Slug
        'submenu_one', // What shows in this page(Callback Function)
    );
}

add_action( 'admin_menu', 'add_to_admin_menu' );

function custom_plugin_function() {
    include_once PLUGIN_DIR_PATH . '/views/add-new.php';
}

function submenu_one() {
    include_once PLUGIN_DIR_PATH . '/views/all-page.php';
}

// Assets -------------------------------------------------------------
function plugin_assets() {
    wp_enqueue_style( 'style', PLUGIN_URL . '/new-plugin/assets/css/style.css', '', 1.0 );
    wp_enqueue_script( 'script', PLUGIN_URL . '/new-plugin/assets/js/app.js', '', 1.0, true );
}

add_action( 'admin_enqueue_scripts', 'plugin_assets' );