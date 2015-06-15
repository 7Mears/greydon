<?php
/**
* @package greydon
*/
get_header(); ?>

<div class="container">
  <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <header class="entry-header">
    		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

    	</header><!-- .entry-header -->

    	<div class="entry-content">
    		<?php
    			/* translators: %s: Name of current post */
    			the_excerpt();
    		?>

        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="read-more">Read the post</a>
    	</div><!-- .entry-content -->

    <?php endwhile; ?>

    <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

  </main>
  <!-- #main -->
</div>
<!-- #primary -->

<?php get_footer(); ?>
