<?php
/*
Plugin Name: My Basic Plugin
Plugin URI: http://example.com/my-basic-plugin
Description: A comprehensive basic plugin for demonstration.
Version: 1.0
Author: Your Name
Author URI: http://example.com
License: GPL2
*/


add_action('wp_footer', 'footer_content');
function footer_content() {
    echo '<p style="text-align: center;">This is added by My Basic Plugin.</p>';
}

add_filter('the_content', 'modify_content');
function modify_content($content) {
    return $content . '<p>Additional content added by My Basic Plugin.</p>';
}


add_action('wp_enqueue_scripts', 'mbp_enqueue_assets');
function mbp_enqueue_assets() {
    wp_enqueue_style('mbp-style', plugins_url('css/style.css', __FILE__));
    wp_enqueue_script('mbp-script', plugins_url('js/script.js', __FILE__), array('jquery'), null, true);
}

add_action('admin_menu', 'mbp_add_admin_menu');
function mbp_add_admin_menu() {
    add_menu_page('My Basic Plugin Settings', 'My Basic Plugin', 'manage_options', 'mbp-settings', 'mbp_settings_page');
}

function mbp_settings_page() {
    echo '<h1>My Basic Plugin Settings</h1>';
    echo '<p>Settings for My Basic Plugin go here.</p>';
}