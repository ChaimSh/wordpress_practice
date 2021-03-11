<?php
/*
Plugin Name: Plugins Practice Settings
Author: Chaim Shcherbina
Text Domain: wpplugin
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

function wpplugin_settings_page()
{
    add_menu_page(
        'Plugin Name',
        'Plugin Menu',
        'manage_options',
        'wpplugin',
        'wpplugin_settings_page_markup',
        'dashicons-wordpress-alt',
        100
    );
   
}
add_action( 'admin_menu', 'wpplugin_settings_page' );

function wpplugin_settings_page_markup()
{
    
}