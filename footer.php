<?php
/**
* @package greydon
*/
?>

<footer class="site-footer container">

  <div class="footer-card">
    <h3>Get updates</h3>
    <p>
      Subscribe to get notified about events and blog posts.
    </p>
    <script type="text/javascript">
//<![CDATA[
if (typeof newsletter_check !== "function") {
window.newsletter_check = function (f) {
    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
    if (!re.test(f.elements["ne"].value)) {
        alert("The email is not correct");
        return false;
    }
    for (var i=1; i<20; i++) {
    if (f.elements["np" + i] && f.elements["np" + i].value == "") {
        alert("");
        return false;
    }
    }
    if (f.elements["ny"] && !f.elements["ny"].checked) {
        alert("You must accept the privacy statement");
        return false;
    }
    return true;
}
}
//]]>
</script>

    <div class="newsletter newsletter-subscription">
      <form method="post" action="http://localhost/greydon/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
      <!-- email -->
      <input class="newsletter-submit" type="submit" value="Subscribe"/>
      <input class="newsletter-email" type="email" placeholder="Email" name="ne" size="30" required>
      </form>
    </div>
  </div><!-- /footer-card -->

  <div class="footer-card">
    <h3>Best way to support me</h3>
    <p>
      Something something bandcamp subscription.
    </p>
    <button type="button" name="button">Subscribe on bandcamp</button>
  </div><!-- /footer-card -->

  <div class="footer-card">
    <h3>Grand Unified Theory</h3>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    </p>
    <button type="button" name="button">Website</button>
  </div><!-- /footer-card -->

  <div class="footer-card">
    <h3>Social media</h3>
    <p>
      You can find Grey mostly on <a href="#0">instagram</a>, <a href="#0">twitter</a>, <a href="#0">facebook</a>, <a href="#0">reddit</a> and sometimes on <a href="#0">reddit</a>, <a href="#0">reddit</a>.
    </p>
    <button type="button" name="button">Greydon subreddit</button>
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
