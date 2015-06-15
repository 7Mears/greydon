<?php
/**
* @package greydon
*/
get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $blog_background_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

<style>
  .blog-post .entry-header {
    background: url('<?php echo $blog_background_image[0]; ?>') no-repeat center center;
    background-size: cover;
  }
</style>
<?php endif; ?>
  <main id="main" class="site-main blog-post" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      	<header class="entry-header">
          <div class="container">
      		    <?php the_title( sprintf( '<h1 class="entry-title parallax">', esc_url( get_permalink() ) ), '</h1>' ); ?>
          </div><!-- /container -->
      	</header><!-- .entry-header -->

      	<div class="entry-content container">
      		<?php
      			/* translators: %s: Name of current post */
      			the_content( sprintf(
      				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'greydon' ), array( 'span' => array() ) ),
      				the_title( '<span class="screen-reader-text">"', '"</span>', false )
      			) );
      		?>

      		<?php
      			wp_link_pages( array(
      				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'greydon' ),
      				'after'  => '</div>',
      			) );
      		?>


          <?php if ( 'post' == get_post_type() ) : ?>
          <div class="entry-meta">
            <?php greydon_posted_on(); ?>
          </div><!-- .entry-meta -->
          <?php endif; ?>

      	</div><!-- .entry-content -->

      </article><!-- #post-## -->

      <div class="container">

        <?php // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>

    <?php endwhile; // end of the loop. ?>
    </div><!-- /container -->
  </main>
  <!-- #main -->
</div>
<!-- #primary -->

<?php get_footer(); ?>
