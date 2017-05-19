<div id="home-panels" class="row">
  <div class="replace-content">

    <div class="left-container section-container col-xs-12  col-md-10">
      <?php if(!empty($content['left_wrapper'])): ?>
          <?php print $content['left_wrapper']; ?>
      <?php endif; ?>
      <div class="row">
        <?php if(!empty($content['left'])): ?>
          <div class="section left-column col-xs-12 col-md-7">
            <div class="full-width">
              <?php print $content['left']; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if(!empty($content['center'])): ?>
          <div class="section center-column col-xs-12 col-md-5">
            <div class="trigger trigger-right" data-panel-target="#filters"></div>
            <?php print $content['center']; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if(!empty($content['right'])): ?>
    <div id="filters" class="section right-column col-md-2">
      <?php print $content['right']; ?>
    </div>
  <?php endif; ?>
</div>