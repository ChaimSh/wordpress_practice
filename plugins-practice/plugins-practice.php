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
    if( !current_user_can('manage_options') ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
        <p><?php esc_html_e( 'Some content.' ); ?></p>
        </div>
      <?php  
}

?>