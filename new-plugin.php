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
    wp_localize_script( 'script', 'ajaxUrl', admin_url( 'admin-ajax.php' ) );
}

add_action( 'admin_enqueue_scripts', 'plugin_assets' );

/*
Database -------------------------------------------
 */

// Create Table
function custom_plugin_table_create() {

    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $sql = "
            CREATE TABLE `ih_custom_table` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) NOT NULL,
                `email` varchar(255) NOT NULL,
                `address` varchar(255) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
            ";
    dbDelta( $sql );
}

register_activation_hook( __FILE__, 'custom_plugin_table_create' );

// Delete table
function custom_plugin_table_delete() {

    global $wpdb;
    $wpdb->query( "DROP table IF Exists ih_custom_table" );
}

register_deactivation_hook( __FILE__, 'custom_plugin_table_delete' );

function custom_plugin_table_delete_uninstall() {

    global $wpdb;
    $wpdb->query( "DROP table IF Exists ih_custom_table" );
}

register_uninstall_hook( __FILE__, 'custom_plugin_table_delete_uninstall' );

/*
Create New Page when active this plugin -------------------------------------------
 */
function custom_plugin_create_page() {

    $page = array();
    $page['post_type'] = 'page';
    $page['post_title'] = 'Custom Plugin Page';
    $page['post_content'] = 'custom plugin page';
    $page['post_status'] = 'publish';
    $page['post_slug'] = 'custom-plugin-page';

    wp_insert_post( $page );
}

register_activation_hook( __FILE__, 'custom_plugin_create_page' );