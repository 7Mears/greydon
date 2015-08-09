<?php
/**
* @package greydon
*/
?>

<footer class="site-footer container">

  <div class="footer-card">
    <h3>Best way to support me</h3>
    <p>
      Something something bandcamp subscription.
    </p>
    <button type="button" name="button">Subscribe on bandcamp</button>
  </div><!-- /footer-card -->

  <div class="footer-card">
    <h3>Social media</h3>
    <p>
      <a href="#0"><i class="fa fa-facebook-official"></i></a>
      <a href="#0"><i class="fa fa-twitter"></i></a>
      <a href="#0"><i class="fa fa-google-plus"></i></a>
      <a href="#0"><i class="fa fa-reddit"></i></a>
      <a href="#0"><i class="fa fa-instagram"></i></a>
    </p>
  </div><!-- /footer-card -->

  <!-- /footer cards -->
<div class="clear"></div>

  <div class="site-links">
    <h5>Navigation</h5>
    <?php wp_nav_menu( array( 'theme_location'=>'primary', 'menu_id' => 'primary-menu' ) ); ?>
  </div>

  <div class="site-info">
    Website by <a href="http://www.vireoproductions.com">Vireo</a>
  </div>
  <!-- /site-info -->
</footer>
</div>
<!-- /page -->

<?php wp_footer(); ?>

</body>

</html>
