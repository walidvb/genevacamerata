<div id="home-panels" class="row">
  <div class="replace-content">
    <?php if(!empty($content['left'])): ?>
      <div class="section left-column col-xs-12 col-sm-2 col-md-2">
          <?php print $content['left']; ?>
      </div>
    <?php endif; ?>
    <?php if(!empty($content['center'])): ?>
      <div class="section center-column col-xs-12 col-sm-6 col-md-8">
        <div class="trigger trigger-right" data-panel-target="#filters"></div>
        <?php print $content['center']; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php if(!empty($content['right'])): ?>
    <div id="filters" class="section right-column col-xs-12 col-sm-4 col-md-2">
      <?php print $content['right']; ?>
    </div>
  <?php endif; ?>
</div>