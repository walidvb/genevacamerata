<?php

?>

<nav id="secondary_menu" class="sidepanel side-left">
  <?php print render($page['sidepanel_left']) ?>
</nav>

<?php if($page['sidepanel_right']): ?>
  <div id="filters" class="sidepanel side-right">
    <div data-panel-target=".region-sidepanel-right" class="trigger trigger-right"></div>
    <?php print render($page['sidepanel_right']) ?>
  </div>
<?php endif; ?>
<!-- Wrapper / Start -->
<div id="wrapper">
  <?php if (($page['main_menu'])): ?>
    <div class="main-menu">
      <button class="hamburger hamburger--arrow" type="button" data-panel-target=".region-sidepanel-left">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img class="logo" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>

      <nav id="navigation" class="navbar replaceme">
        <?php print render($page['main_menu']); ?>
      </nav>
    </div>
  <?php endif; ?>



  <!-- Content
  ================================================== -->
  <div id="content">

    <?php if ($page['highlighted']): ?>
      <div class="">
        <div id="highlighted">
          <?php print render($page['highlighted']); ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- 960 Container -->
    <div class="<?php print $containner_class; ?>">

      <!-- Page Content -->
      <div class="<?php print $content_class; ?>">
        <section class="page-content">
          <?php print $messages; ?>


          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          <?php print render($title_suffix); ?>
          <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
        </section>
      </div>
      <!-- Page Content / End -->

      <div class="clearfix"></div>

    </div>
    <!-- 960 Container / End -->

  </div>
  <!-- Content / End -->

</div>
<!-- Wrapper / End -->


<!-- Footer
  ================================================== -->

  <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?>
    <!-- Footer / Start -->
    <footer id="footer">
      <!-- 960 Container -->
      <div class="container">

        <?php if ($page['footer_first']): ?>
          <div class="four columns left">
            <?php print render($page['footer_first']); ?>
          </div>
        <?php endif; ?>

        <?php if ($page['footer_second']): ?>
          <div class="four columns">
            <?php print render($page['footer_second']); ?>
          </div>
        <?php endif; ?>

        <?php if ($page['footer_third']): ?>
          <div class="four columns right">
            <?php print render($page['footer_third']); ?>
          </div>
        <?php endif; ?>

      </div>
      <!-- 960 Container / End -->

    </footer>
    <!-- Footer / End -->
  <?php endif; ?>


  <!-- Footer Bottom / Start  -->
  <footer id="footer-bottom">

    <!-- 960 Container -->
    <div class="container">
      <div class="sixteen columns">
        <?php print render($page['footer']); ?>
      </div>
    </div>
    <!-- 960 Container / End -->

  </footer>
  <!-- Footer Bottom / End -->
