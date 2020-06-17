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

function add_to_admin_menu() {

    add_menu_page(
        'Custom Plugin', // Page Title
        'Custom Plugin', // Menu Title
        'manage_options', // Who(Admin) can manage this
        'custom-plugin', // URL Slug
        'custom_plugin_function', // What shows in this page(Callback Function)
        'dashicons-welcome-write-blog', // Icon
        6 // Menu Position
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
    echo "New Page for Plugin Created.";
}

function submenu_one() {
    echo "New Submenu One for Plugin Created.";
}