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
<div class="container" id="wrapper">
  <?php if (($page['main_menu'])): ?>
    <div id="main-menu-top" class="full-width main-menu">
      <button class="hamburger hamburger--squeeze" type="button" data-panel-target=".region-sidepanel-left">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img class="logo visible-xs" src="/sites/all/themes/light_skeleton/resources/logo-small.png" alt="<?php print t('Home'); ?>" />
        <img class="logo hidden-xs" src="/sites/all/themes/light_skeleton/resources/logo.png" alt="<?php print t('Home'); ?>" />
      </a>

      <nav id="navigation-2" class="navbar">
        <?php print render($page['main_menu']); ?>
      </nav>
    </div>
  <?php endif; ?>



  <!-- Content
  ================================================== -->
  <div id="content" class="row">

    <?php if ($page['highlighted']): ?>
      <div id="highlighted">
        <?php print render($page['highlighted']); ?>
      </div>
    <?php endif; ?>

    <!-- 960 Container -->

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

  
  <div class="debug-helpers" onclick="javascript:this.remove()">
    <div class="size">
      <div class="visible-xs">XS</div>
      <div class="visible-sm">SM</div>
      <div class="visible-md">MD</div>
      <div class="visible-lg">LG</div>
    </div>
  </div>


  <!-- Footer Bottom / Start  -->
  <!-- Footer Bottom / End -->
