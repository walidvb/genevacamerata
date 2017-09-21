<div id="home-panels" class="row">
  <div class="replace-content no-container">
    <div class="left-container section-container col-xs-12 col-sm-12 col-md-10">
      <div class="row">
        <?php if(!empty($content['left'])): ?>
          <div class="section left-column col-xs-12 col-sm-12 col-md-4 col-lg-2">
              <?php print $content['left']; ?>
          </div>
        <?php endif; ?>
        <?php if(!empty($content['center'])): ?>
          <div class="section center-column col-xs-12 col-sm-12 col-md-8 col-lg-10">
            <div class="trigger trigger-right" data-panel-target="#filters"></div>
            <?php print $content['center']; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if(!empty($content['right'])): ?>
    <div id="filters" class="section right-column col-xs-12 col-sm-4 col-md-2 yes">
      <div class="trigger trigger-right trigger-close" data-panel-target="#filters"></div>
      <?php print $content['right']; ?>
    </div>
  <?php endif; ?>
</div>