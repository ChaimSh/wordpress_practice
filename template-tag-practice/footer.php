
  </div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">

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

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
