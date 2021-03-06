<?php get_header(); ?>

  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">

            <?php the_title(); ?>


            <?php if( has_post_thumbnail() ): ?>

            <?php 
              
              the_post_thumbnail();
              
              ?>

              <?php endif; ?>

        </header>

        <div class="entry-content">

            <?php the_content(); ?>

        </div>

        </article>

      <?php endwhile; endif : ?>

        <?php comments_template(); ?>

        
    </main>

  </div>

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
