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

function wphooks_before_footer_message() {
  echo '<p>My custom footer text!</p>'
}
add_action( 'wphooks_before_footer', 'wphooks_before_footer_message', 10 );

function wphooks_make_uppercase($message) {

  $new_message = strtoupper( $message );
  return $new_message;

}
add_filter( 'wphooks_footer_message', 'wphooks_make_uppercase', 15 );


function wp_hooks_cta() {
  if( in_the_loop() ) {
    locate_template( 'template-parts/comment-cta.php', true );
  }
}
add_action('pre_get_comments', 'wp_hooks_cta');

// Register Menu Locations
register_nav_menus( [
  'main-menu' => esc_html__( 'Main Menu', 'wptags' ),
  'footer-menu' => esc_html__( 'Footer Menu', 'wptags' ),
]);


function wptags_title_markup( $title, $id ) {
  if ( is_singular() && in_the_loop() ) {
    $title = '<h1>' . $title . '</h1>';
  } else if ( !is_singular() && in_the_loop() ) {
    $title = '<h2><a href="' . get_permalink($id) . '">' . $title . '</a></h2>';
  }

  return $title;
};
add_filter( 'the_title', 'wptags_title_markup', 10, 2 );


function wptags_content_ads( $content ) {

  if( !in_the_loop() ) {
    return;
  }

  $paragraphs;
  $pattern = "/<p>.*?<\/p>/m";
  $p_count = preg_match_all( $pattern, $content, $paragraphs );
  $paragraphs = $paragraphs[0];

  $ad_p_number = floor( $p_count / 2 );
  if( 0 == $ad_p_number ) $ad_p_number = 1;
  $ad_p = $paragraphs[ $ad_p_number - 1 ];

  $post_ad = '<div class="past_ad"><h2>Post Add</h2></div>';
  $ad_p_w_ad = '<p>' . $ad_p . '</p>' . $post_ad;


  $content_w_ad = str_replace( $ad_p, $ad_p_w_ad, $content );

  return $content_w_ad;
}
add_filter( 'the_content', 'wptags_content_ads', 10 );

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

