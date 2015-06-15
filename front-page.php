<?php
/**
* @package greydon
*/
get_header(); ?>
<section id="home-hero" class="home-hero">
  <div class="hero-bg parallax"></div>
  <div class="container">

    <div class="hero-content">
      <div class="section-left">
        <p class="section-title">Now available</p>
        <a href="#0">Bandcamp</a><br />
        <a href="#0">iTunes</a><br />
        <a href="#0">Google Play</a><br />
        <a href="#0">Amazon</a><br />
      </div>

      <div class="section-right">
        <h2 class="hero-title">Omniverse:<br /> Type 3:<br /> Aum niverse</h2>
      </div>
    </div>


    <div class="news-content">
      <div class="section-left">
        <p class="section-title">Blog</p>
      </div>

      <?php query_posts('posts_per_page=3') ?>
      <?php while (have_posts()) : the_post(); ?>

      <div class="section-right">
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><h3 class="blog-post--title"><?php the_title(); ?></h3></a>
        <p>
          <?php the_excerpt(); ?>
        </p>
          <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="read-more"><i class="fa fa-angle-double-right"></i> read the post</a>

      </div>
    <?php endwhile; ?>

    </div>

</div>
</section>
<?php get_footer(); ?>
