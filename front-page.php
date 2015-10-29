<?php
/**
* @package greydon
*/
get_header(); ?>
<section id="home-hero" class="home-hero">
  <div class="container">
    <div class="hero-content">
        <h2 class="hero-title">Omniverse : Type 3 : Aum niverse</h2>
        <p>Coming soon</p>
    </div><!-- /hero-content -->
  </div><!-- /container -->
</section><!-- /home-hero -->

<section id="home-news" class="home-news">
  <div class="container">
    <?php query_posts('posts_per_page=3') ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="section-left">
      <p class="section-title">Blog</p>
    </div>

    <div class="section-right">
      <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><h3 class="blog-post--title"><?php the_title(); ?></h3></a>
      <p><?php the_excerpt(); ?></p>
      <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="read-more"><i class="fa fa-angle-double-right"></i> read the post</a>
    </div>
    <?php endwhile; ?>
  </div><!-- /container -->
</section><!-- /home-news -->

<?php get_footer(); ?>
