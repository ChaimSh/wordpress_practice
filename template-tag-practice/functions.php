<?php

// Add Theme Support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' [ 'post', 'page' ] );
add_theme_support( 'post_formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-logo' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'starter-content' );

// Load in our CSS
function wphierarchy_enqueue_styles() {

  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', [], time(), 'all' );

}
add_action( 'wp_enqueue_scripts', 'wphierarchy_enqueue_styles' );

function wphooks_before_footer_messaafe() {
  echo '<p>My custom footer text!</p>'
}
add_action( 'wphooks_before_footer', 'wphooks_before_footer_message', 10 );


// Register Menu Locations
register_nav_menus( [
  'main-menu' => esc_html__( 'Main Menu', 'wptags' ),
  'footer-menu' => esc_html__( 'Footer Menu', 'wptags' ),
]);


// Setup Widget Areas
function wphierarchy_widgets_init() {
  register_sidebar([
    'name'          => esc_html__( 'Main Sidebar', 'wphierarchy' ),
    'id'            => 'main-sidebar',
    'description'   => esc_html__( 'Add widgets for main sidebar here', 'wphierarchy' ),
    'before_widget' => '<section class="widget">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ]); 
  register_sidebar([
    'name'          => esc_html__( 'Page Sidebar', 'wphierarchy' ),
    'id'            => 'page-sidebar',
    'description'   => esc_html__( 'Add widgets for page sidebar here', 'wphierarchy' ),
    'before_widget' => '<section class="widget">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ]);  
  register_sidebar([
    'name'          => esc_html__( 'Front Page Widgets', 'wphierarchy' ),
    'id'            => 'front-page',
    'description'   => esc_html__( 'Add widgets for front page here', 'wphierarchy' ),
    'before_widget' => '<section class="widget">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ]);  
}
add_action( 'widgets_init', 'wphierarchy_widgets_init' );

