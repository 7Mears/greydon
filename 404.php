<?php /** * The template for displaying 404 pages (not found). * * @package eyedea */ get_header(); ?>

<div id="primary" class="content-area container">
  <main id="main" class="site-main" role="main">

    <section class="error-404 not-found">
      <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'eyedea' ); ?></h1>
      </header>
      <!-- .page-header -->

      <div class="page-content">
        <p>
          <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try the search?', 'eyedea' ); ?>
        </p>

        <?php get_search_form(); ?>

        <br />


      </div>
      <!-- .page-content -->
    </section>
    <!-- .error-404 -->

  </main>
  <!-- #main -->
</div>
<!-- #primary -->

<?php get_footer(); ?>
