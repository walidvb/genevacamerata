<div id="home-panels" class="row">
  <div class="left-container col-xs-12 col-sm-8 col-md-10">
    <div class="row">
      
      <?php if(!empty($content['left'])): ?>
        <div class="section left-column col-xs-12 col-md-7">
          <?php print $content['left']; ?>
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
  <?php if(!empty($content['right'])): ?>
    <div id="filters" class="section right-column col-xs-12 col-sm-4 col-md-2">
      <?php print $content['right']; ?>
    </div>
  <?php endif; ?>
</div>