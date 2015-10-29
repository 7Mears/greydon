<?php
/**
* @package greydon
*/
?>

<footer class="site-footer container">

  <div class="footer-card">
    <h5>Subscribe</h5>
    <p>
      All the new shows I create, streaming instantly on your mobile device via the free Bandcamp app.
    </p>
    <a href="https://greydonsquare.bandcamp.com/subscribe" target="_BLANK"><button type="button" name="button">Learn more</button></a>
  </div><!-- /footer-card -->

  <div class="footer-card">
    <h5>Networks</h5>
    <p>
      <a href="https://www.facebook.com/greydonsquare" target="_BLANK" ><i class="fa fa-facebook-official"></i></a>
      <a href="https://twitter.com/greydonsquare" target="_BLANK" ><i class="fa fa-twitter"></i></a>
      <!-- <a href="#" target="_BLANK" ><i class="fa fa-google-plus"></i></a> -->
      <a href="https://www.reddit.com/r/greydonsquare" target="_BLANK" ><i class="fa fa-reddit"></i></a>
      <a href="https://instagram.com/greydonsquare" target="_BLANK" ><i class="fa fa-instagram"></i></a>
    </p>
  </div><!-- /footer-card -->

  <!-- /footer cards -->
<div class="clear"></div>

  <div class="site-links">
    <h5>Navigation</h5>
    <?php wp_nav_menu( array( 'theme_location'=>'primary', 'menu_id' => 'primary-menu' ) ); ?>
  </div>

  <div class="site-info">
    <a href="http://wergrandunified.com/" target="_BLANK">Grand Unified Theory</a>
  </div>
  <!-- /site-info -->
</footer>
</div>
<!-- /page -->

<?php wp_footer(); ?>

</body>

</html>
