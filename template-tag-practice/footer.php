
  </div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">

  <?php do_action( 'wphooks_before_footer' ); ?>

    <?php 
        $args = [
            'theme_location' => 'footer-menu',
            'container'      => 'nav',
            'container_id'   => 'footer-menu',
            'depth'          => 1,
            'fallback_cb'    => false
        ];

        wp_nav_menu( $args );    
    
    ?>



  <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wphierarchy' ) ); ?>">
    <?php printf( esc_html__( 'Proudly powered by %s', 'wphierarchy' ), 'WordPress' ); ?>
  </a>

  <?php
      $footer_message = '&copy;' . date( 'Y' ) . ' ' . get_bloginfo( 'name' );
  ?>

  <p><?php echo apply_filters( 'wphooks_footer_message', $footer_message );
   ?></p>

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
